<?php

namespace Platron\PhpSdkPayout\clients;

use Inacho\CreditCard;
use Platron\PhpSdkPayout\SdkException;
use Platron\PhpSdkPayout\services\BaseServiceRequest;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class PostClient implements iClient {
    
    const HTTP_CODE_OK = 200;
    
    /** @var string */
    protected $login;
    
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger = null) {
        $this->logger = $logger;
    }
    
    /**
     * @inheritdoc
     */
    public function sendRequest(BaseServiceRequest $service) {
        $requestParameters = $service->getParameters();
        $requestUrl = $service->getRequestUrlPath();
        
        $curl = curl_init(BaseServiceRequest::REQUEST_URL . $service->getRequestUrlPath());
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestParameters, JSON_UNESCAPED_UNICODE));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
		$response = curl_exec($curl);
        
        if($this->logger){
            $maskedParameters = $this->maskParameters($requestParameters);
            $this->logger->log(LogLevel::INFO, 'Requested url '.$requestUrl.' params '. json_encode($maskedParameters, JSON_UNESCAPED_UNICODE));
            $this->logger->log(LogLevel::INFO, 'Response '.$response);
        }
		
		if(curl_errno($curl)){
			throw new SdkException(curl_error($curl), curl_errno($curl));
		}
        
        if(curl_getinfo($curl, CURLINFO_HTTP_CODE) != self::HTTP_CODE_OK){
            throw new SdkException('Wrong HTTP code '.curl_getinfo($curl, CURLINFO_HTTP_CODE), curl_getinfo($curl, CURLINFO_HTTP_CODE));
        }

        if(!json_decode($response)){
            throw new SdkException('Not json in response');
        }

		return json_decode($response)->response;
    }

    /**
     * @param array $parameters
     * @return array
     */
    private function maskParameters(array $parameters){
        foreach($parameters as $name => $value){
            $validCardResult = CreditCard::validCreditCard($value);
            if($validCardResult['valid']){
                $parameters[$name] = substr($value, 0, 6).str_repeat('*', strlen($value) - 10).substr($value, -4);
            }
        }

        return $parameters;
    }
}

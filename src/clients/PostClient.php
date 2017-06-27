<?php

namespace Platron\PhpSdkPayout\clients;

use Platron\PhpSdkPayout\SdkException;
use Platron\PhpSdkPayout\services\BaseServiceRequest;
use Psr\Log\LoggerInterface;

class PostClient implements iClient {
    
    const 
        LOG_LEVEL = 0,
        HTTP_CODE_OK = 400;
    
    /** @var string */
    protected $login;
    
    /**
     * @param string $login
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
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestParameters));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
		$response = curl_exec($curl);
        
        if($this->logger){
            $this->logger->log(self::LOG_LEVEL, 'Requested url '.$requestUrl.' params '. json_encode($requestParameters));
            $this->logger->log(self::LOG_LEVEL, 'Response '.$response);
        }
		
		if(curl_errno($curl)){
			throw new SdkException(curl_error($curl), curl_errno($curl));
		}
        
        if(curl_getinfo($curl, CURLINFO_HTTP_CODE) != self::HTTP_CODE_OK){
            throw new SdkException('Wrong HTTP code '.curl_getinfo($curl, CURLINFO_HTTP_CODE), curl_getinfo($curl, CURLINFO_HTTP_CODE));
        }
        
		return json_decode($response)->response;
    }
}

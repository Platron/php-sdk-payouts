<?php

namespace Platron\PhpSdkPayout\services;

abstract class BaseServiceRequest {
    
    const REQUEST_URL = 'https://api.platron.pro/v1.0';
    
    /** @var string */
    protected $login;
    /** @var string */
    protected $secretKey;
    
    /**
	 * Получить часть url для запроса
	 * @return string
	 */
	abstract public function getRequestUrlPath();
    
    public function __construct($login, $secretKey) {
        $this->login = $login;
        $this->secretKey = $secretKey;
    }
    
    /**
	 * Получить параметры, сгенерированные командой
	 * @return array
	 */
	public function getParameters() {
		$filledvars = array();
		foreach (get_object_vars($this) as $name => $value) {
			if ($value && !in_array($name, ['login','secretKey'])) {
				$filledvars[$name] = (string)$value;
			}
		}
        
        $filledvars['Login'] = $this->login;       
        $filledvars['Signature'] = base64_encode(hash('sha256', $this->getRequestUrlPath() . json_encode($filledvars) . $this->secretKey));     
        
		return $filledvars;
	}
}

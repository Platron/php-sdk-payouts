<?php

namespace Platron\Atol\services;

use stdClass;

abstract class BaseServiceResponse {
    
    /** @var int */
    protected $ErrorCode;
    
    /** @var string */
    protected $ErrorMessage;
    
    public function __construct(stdClass $response) {
        foreach (get_object_vars($this) as $name => $value) {
			if (!empty($response->$name)) {
				$this->$name = $response->$name;
			}
		}
    }
    
    /**
     * Проверка на ошибки в ответе
     * @param array $response
     * @return boolean
     */
    public function isValid(){
        if(!empty($this->ErrorCode)){
            return false;
        }
        else {
            return true;
        }
    }
    
    /**
     * Получить код ошибки из ответа
     * @return int
     */
    public function getErrorCode(){
        return $this->ErrorCode;
    }
    
    /**
     * Получить описание ошибки из ответа
     * @return string
     */
    public function getErrorDescription(){
        return $this->ErrorMessage;
    }
}

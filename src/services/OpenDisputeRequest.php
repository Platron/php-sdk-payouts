<?php

namespace Platron\PhpSdkPayout\services;

class OpenDisputeRequest extends BaseServiceRequest {
    
    /** @var string Идентификатор транзакции на стороне клиента */
    public $ClientTransactionId;
    
    public function getRequestUrlPath() {
        return '/transaction/open_dispute';
    }

}

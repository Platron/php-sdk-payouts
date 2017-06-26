<?php

namespace Platron\PhpSdkPayout\services;

class TransactionStatusRequest extends BaseServiceRequest {
    
    /** @var string Идентификатор транзакции на стороне клиента */
    public $ClientTransactionId;
    
    /**
     * @inherotdoc
     */
    public function getRequestUrlPath() {
        return '/transaction/status';
    }

}

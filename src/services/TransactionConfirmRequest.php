<?php

namespace Platron\PhpSdkPayout\services;

class TransactionConfirmRequest extends BaseServiceRequest {
    
    /** @var string Идентификатор транзакции на стороне клиента */
    public $ClientTransactionId;
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/transaction/confirm';
    }

}

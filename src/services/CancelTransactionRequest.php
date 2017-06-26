<?php

namespace Platron\PhpSdkPayout\services;

class CancelTransactionRequest extends BaseServiceRequest {
    
    /** @var string Идентификатор транзакции на стороне клиента */
    public $ClientTransactionId;
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/transaction/cancel';
    }

}

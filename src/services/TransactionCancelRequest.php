<?php

namespace Platron\PhpSdkPayout\services;

class TransactionCancelRequest extends BaseServiceRequest {
    
    /** @var string Идентификатор транзакции на стороне клиента */
    public $ClientTransactionId;
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/transaction/cancel';
    }

}

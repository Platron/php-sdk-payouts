<?php

namespace Platron\PhpSdkPayout\services;

class TransactionStatusResponse extends BaseServiceResponse {
    
    const 
        STATUS_REQUEST = '10',
        STATUS_PENDING = '20',
        STATUS_EXECUTING = '30',
        STATUS_SUCCESS = '40',
        STATUS_FAILURE_CHECK = '50',
        STATUS_FAILURE = '60',
        STATUS_ESCROW = '70',
        STATUS_ESCROW_CONFIRM = '80',
        STATUS_DISPUTE = '90',
        STATUS_CANCELED = '100';
    
    public $TypeTransactionStatus;
}

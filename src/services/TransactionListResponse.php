<?php

namespace Platron\PhpSdkPayout\services;

use Platron\PhpSdkPayout\data_objects\TransactionDataObject;

class TransactionListResponse extends BaseServiceResponse {
    /** @var TransactionDataObject[] Список транзакций */
    public $TransactionList;
}

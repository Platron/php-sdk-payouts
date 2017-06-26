<?php

namespace Platron\PhpSdkPayout\services;

use Platron\PhpSdkPayout\data_objects\AccountDataObject;

class AccountListResponse extends BaseServiceResponse {
    /** @var AccountDataObject[] Список аккаунтов в системе Platron.pro */
    public $AccountList;
}

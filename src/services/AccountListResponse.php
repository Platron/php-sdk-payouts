<?php

namespace Platron\PhpSdkPayout\services;

class AccountListResponse extends BaseServiceResponse {
    /** @var int Идентификатор счета в системе Platron.pro */
    public $Id;
    /** @var float Баланс на счете */
    public $Balance;
    /** @var string Валюта транзакции */
    public $Currency;
}

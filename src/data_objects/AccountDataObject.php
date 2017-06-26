<?php

namespace Platron\PhpSdkPayout\data_objects;

class AccountDataObject extends \stdClass {
    /** @var int Идентификатор счета в системе Platron.pro */
    public $Id;
    /** @var float Баланс на счете */
    public $Balance;
    /** @var string Валюта транзакции */
    public $Currency;
}

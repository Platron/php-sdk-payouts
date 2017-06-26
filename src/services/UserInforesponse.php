<?php

namespace Platron\PhpSdkPayout\services;

class UserInforesponse extends BaseServiceResponse {
    /** @var int Идентификатор получателя платежа в системе Platron.pro */
    public $Id;
    /** @var string Дата регистрации */
    public $RegistrationDate;
    /** @var string Дата последней транзакции */
    public $LastTransactionDate;
    /** @var int Количество транзакций */
    public $TransactionNumber;
}

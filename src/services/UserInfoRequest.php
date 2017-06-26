<?php

namespace Platron\PhpSdkPayout\services;

class UserInfoRequest {
    const 
        FIND_BY_CARD = '10',
        FIND_BY_MOBILE = '20',
        FIND_BY_WM_PURSE = '30',
        FIND_BY_BANK_ACCOUNT = '40',
        FIND_BY_YANDEX_PURSE = '50',
        FIND_BY_QIWI_PURSE = '60';
    
    /** @var int Отвечает по какому полю искать получателя в системе. Берется из констант */
    public $UserInfoIdentity;
    /** @var string Непосредственно отвечает за идентфикатор пользователя, который соответствует UserInfoIdentity */
    public $UserId;
}

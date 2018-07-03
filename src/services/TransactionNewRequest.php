<?php

namespace Platron\PhpSdkPayout\services;

class TransactionNewRequest extends BaseServiceRequest {
    
    const 
        PAYMENT_TYPE_CARD = 10,
        PAYMENT_TYPE_PHONE = 20,
        PAYMENT_TYPE_WEBMONEY = 30,
        PAYMENT_TYPE_BANK_ACCOUNT = 40,
        PAYMENT_TYPE_YANDEXMONEY = 50,
        PAYMENT_TYPE_QIWI = 60;
    
    /** @var string Идентификатор транзакции на стороне клиента */
    public $ClientTransactionId;
    /** @var string Идентификатор счета в системе Platron.pro */
    public $AccountId;
    /** @var float Сумма транзакции */
    public $Amount;
    /** @var float Комиссия */
    public $Fee;
    /** @var string Валюта транзакции */
    public $Currency = 'RUB';
    /** @var string Имя получателя платежа */
    public $Name;
    /** @var string Фамилия получателя платежа */
    public $Surname;
    /** @var string Отчество получателя платежа */
    public $MiddleName;
    /** @var string Паспортные данные получателя платежа */
    public $Passport;
    /** @var string Адрес получателя платежа */
    public $Address;
    /** @var string Email получателя платежа */
    public $Email;
    /** @var int Номер телефона получателя платежа */
    public $Phone;
    /** @var int ИНН(или его аналог) получателя платежа */
    public $TaxId;
    /** @var string БИК банка получателя платежа */
    public $Bik;
    /** @var int Номер банковского счета получателя платежа */
    public $BankAccount;
    /** @var boolean Признак ESCROW-транзакции */
    public $Escrow;
    /** @var int Период ESCROW-транзакции в минутах. Если будет задано поле Escrow, и будет не задано данное поле, то будет возвращена ошибка */
    public $EscrowPeriod;
    /** @var string Крайний срок подтверждения транзакции. Если будет задано поле Escrow, и будет не задано данное поле, то будет возвращена ошибка */
    public $EscrowDeadline;
    /** @var string Тип платежного метода */
    public $TypePaymentMethod;
    /** @var string Номер счета. Это может быть номер мобильного телефона, номер карты, банковский счет и тд в зависимости от платежного метода. */
    public $AccountNumber;
	/** @var string Месяц срока действия карты */
    public $CardExpiryMonth;
	/** @var string Год срока действия карты */
    public $CardExpiryYear;
    /** @var boolean Признак что необходимо оплатить налог */
    public $IncludeTax;
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/transaction/new';
    }

}

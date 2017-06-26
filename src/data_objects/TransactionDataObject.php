<?php

namespace Platron\PhpSdkPayout\data_objects;

class TransactionDataObject extends stdClass {
    /** var int Номер счета получаетля платежа, это может быть кошелек, банковский счет, номер телефона и т.д */
    public $UserId;
    /** var string Тип платежа */
    public $TypePaymentMethod;
    /** var float Сумма транзакции */
    public $Amount;
    /** var float Сумма комиссии, которая была удержана сервисом */
    public $Commission;
    /** var string Валюта транзакции */
    public $Currency;
    /** var string Тип налоговой ставки */
    public $TypePersonalTaxType;
    /** var string 	Статус транзакции */
    public $TypeTransactionStatus;
    /** var string Дата и время последнего изменения статуса транзакции */
    public $DateTime;
}

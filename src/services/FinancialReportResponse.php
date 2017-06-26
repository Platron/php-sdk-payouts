<?php

namespace Platron\PhpSdkPayout\services;

class FinancialReportResponse extends BaseServiceResponse {
    /** @var int Идентификатор счета в системе platron.pro */
    public $AccountId;
    /** @var float Баланс на начало периода */
    public $BeginBalance;
    /** @var float Сумма комиссии, которая была удержана сервисом за период */
    public $Commission;
    /** @var int Исполнено заявок (списано) за период */
    public $CompletedTransactions;
    /** @var float Баланс на конец периода */
    public $EndBalance;
    /** @var string Начальная дата периода */
    public $StartDate;
    /** @var string Конечная дата периода */
    public $EndDate;
    /** @var float Принято средств */
    public $FundsReceived;
    /** @var float Возврат средств за период */
    public $Refunds;
    /** @var float Принятые заявки за период */
    public $TotalRequestsNumber;
    /** @var string Валюта транзакции */
    public $Currency;
}

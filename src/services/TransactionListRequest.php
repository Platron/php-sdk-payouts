<?php

namespace Platron\PhpSdkPayout\services;

class TransactionListRequest extends BaseServiceRequest {
    
    /** @var int Идентификатор счета в системе platron.pro */
    public $AccountId;
    /** @var string Начальная дата периода */
    public $StartDate;
    /** @var string Конечная дата периода */
    public $EndDate;
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/report/transaction_list';
    }

}

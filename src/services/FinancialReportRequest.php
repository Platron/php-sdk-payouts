<?php

namespace Platron\PhpSdkPayout\services;

class FinancialReportRequest extends BaseServiceRequest {
    
    /** @var int Идентификатор счета в системе Platron.pro */
    public $AccountId;
    /** @var string Начальная дата периода */
    public $StartDate;
    /** @var string Конечная дата периода */
    public $EndDate;
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/report/financial';
    }

}

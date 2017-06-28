<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\FinancialReportRequest;
use Platron\PhpSdkPayout\services\FinancialReportResponse;
use Platron\PhpSdkPayout\services\AccountListRequest;
use Platron\PhpSdkPayout\services\AccountListResponse;

class FinancialReportTest extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $requestAccountList = new AccountListRequest($this->login, $this->secretKey);
        $responseAccountList = new AccountListResponse($client->sendRequest($requestAccountList));
        
        $requestFinancial = new FinancialReportRequest($this->login, $this->secretKey);
        $requestFinancial->AccountId = $responseAccountList->AccountList[0]->Id;
        $requestFinancial->StartDate = '09.11.2016 01:00:00';
        $requestFinancial->EndDate = '09.11.2016 02:00:00';
        $responseFinancial = new FinancialReportResponse($client->sendRequest($requestFinancial));
        
        $this->assertTrue($responseFinancial->isValid());
    }
}

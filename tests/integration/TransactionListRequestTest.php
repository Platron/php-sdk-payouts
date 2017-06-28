<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\TransactionListRequest;
use Platron\PhpSdkPayout\services\TransactionListResponse;
use Platron\PhpSdkPayout\services\AccountListRequest;
use Platron\PhpSdkPayout\services\AccountListResponse;

class TransactionListRequestTest extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $requestAccountList = new AccountListRequest($this->login, $this->secretKey);
        $responseAccountList = new AccountListResponse($client->sendRequest($requestAccountList));
        
        $requestTransactionList = new TransactionListRequest($this->login, $this->secretKey);
        $requestTransactionList->AccountId = $responseAccountList->AccountList[0]->Id;
        $requestTransactionList->StartDate = '09.11.2016 01:00:00';
        $requestTransactionList->EndDate = '09.11.2016 02:00:00';
        $responseTransactionList = new TransactionListResponse($client->sendRequest($requestTransactionList));

        $this->assertTrue($responseTransactionList->isValid());
    }
}

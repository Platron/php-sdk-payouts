<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\TransactionNewRequest;
use Platron\PhpSdkPayout\services\TransactionNewResponse;
use Platron\PhpSdkPayout\services\AccountListRequest;
use Platron\PhpSdkPayout\services\AccountListResponse;

class TransactionNewTest extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $requestAccountList = new AccountListRequest($this->login, $this->secretKey);
        $responseAccountList = new AccountListResponse($client->sendRequest($requestAccountList));
        
        $requestTransactionNew = new TransactionNewRequest($this->login, $this->secretKey);
        $requestTransactionNew->ClientTransactionId = time();
        $requestTransactionNew->TypePaymentMethod = TransactionNewRequest::PAYMENT_TYPE_WEBMONEY;
        $requestTransactionNew->AccountId = $responseAccountList->AccountList[0]->Id;
        $requestTransactionNew->AccountNumber = 'R195152888589';
        $requestTransactionNew->Amount = '0.01';
        $requestTransactionNew->Currency = 'RUB';
		$requestTransactionNew->Name = 'Тестовое имя';
		$requestTransactionNew->Surname = 'Тестовая фамилия';
		$requestTransactionNew->MiddleName = 'Тестовое отчество';
        $responseTransactionNew = new TransactionNewResponse($client->sendRequest($requestTransactionNew));

        $this->assertTrue($responseTransactionNew->isValid());
    }
}

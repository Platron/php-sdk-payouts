<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\TransactionNewRequest;
use Platron\PhpSdkPayout\services\TransactionNewResponse;
use Platron\PhpSdkPayout\services\AccountListRequest;
use Platron\PhpSdkPayout\services\AccountListResponse;
use Platron\PhpSdkPayout\services\TransactionCancelRequest;
use Platron\PhpSdkPayout\services\TransactionCancelResponse;

class TransactionCancelTest extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $requestAccountList = new AccountListRequest($this->login, $this->secretKey);
        $responseAccountList = new AccountListResponse($client->sendRequest($requestAccountList));
        
        $transactionId = time();
        $requestTransactionNew = new TransactionNewRequest($this->login, $this->secretKey);
        $requestTransactionNew->ClientTransactionId = $transactionId;
        $requestTransactionNew->TypePaymentMethod = TransactionNewRequest::PAYMENT_TYPE_WEBMONEY;
        $requestTransactionNew->AccountId = $responseAccountList->AccountList[0]->Id;
        $requestTransactionNew->AccountNumber = 'R195152888589';
        $requestTransactionNew->Amount = '0.01';
        $requestTransactionNew->Currency = 'RUB';
        $responseTransactionNew = new TransactionNewResponse($client->sendRequest($requestTransactionNew));
      
        $this->assertTrue($responseTransactionNew->isValid());
        
        $requestCancel = new TransactionCancelRequest($this->login, $this->secretKey);
        $requestCancel->ClientTransactionId = $transactionId;
        $responseCancel = new TransactionCancelResponse($client->sendRequest($requestCancel));
        
        $this->assertTrue($responseCancel->isValid());
    }
}

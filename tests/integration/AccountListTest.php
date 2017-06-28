<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\AccountListRequest;
use Platron\PhpSdkPayout\services\AccountListResponse;

class AccountListTest extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $request = new AccountListRequest($this->login, $this->secretKey);
        $response = new AccountListResponse($client->sendRequest($request));

        $this->assertTrue($response->isValid());
    }
}

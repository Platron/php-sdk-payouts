<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\TestSignRequest;
use Platron\PhpSdkPayout\services\TestSignResponse;

class TestSignCheck extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $request = new TestSignRequest($this->login, $this->secretKey);
        $response = new TestSignResponse($client->sendRequest($request));
        
        $this->assertTrue($response->isValid());
    }
}

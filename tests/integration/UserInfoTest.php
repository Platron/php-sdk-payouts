<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\clients\PostClient;
use Platron\PhpSdkPayout\services\UserInfoRequest;
use Platron\PhpSdkPayout\services\UserInforesponse;

class UserInfoTest extends IntegrationTestBase {
    public function testRequest(){
        $client = new PostClient();
        $request = new UserInfoRequest($this->login, $this->secretKey);
        $request->UserInfoIdentity = UserInfoRequest::FIND_BY_MOBILE;
        $request->UserId = '79268752663';
        $response = new UserInforesponse($client->sendRequest($request));
        
        $this->assertTrue($response->isValid());
    }
}

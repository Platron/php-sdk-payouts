<?php

namespace Platron\PhpSdkPayout\services;

class TestSignRequest extends BaseServiceRequest{
    
    public function getRequestUrlPath() {
        return '/test/check_sign';
    }

}

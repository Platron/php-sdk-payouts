<?php

namespace Platron\PhpSdkPayout\services;

class AccountListRequest extends BaseServiceRequest {
    
    /**
     * @inheritdoc
     */
    public function getRequestUrlPath() {
        return '/account/list';
    }

}

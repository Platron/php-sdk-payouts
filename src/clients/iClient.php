<?php

namespace Platron\PhpSdkPayout\clients;

use Platron\PhpSdkPayout\services\BaseServiceRequest;

interface iClient {
    
    /**
     * Послать запрос
     * @param \Platron\Atol\BaseService $service
     */
    public function sendRequest(BaseServiceRequest $service);
}

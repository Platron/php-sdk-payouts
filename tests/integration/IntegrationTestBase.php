<?php

namespace Platron\PhpSdkPayout\tests\integration;

abstract class IntegrationTestBase extends \PHPUnit_Framework_TestCase {
	/** @var string */
	protected $login;
	/** @var string */
	protected $secretKey;
	/** @var string */
    protected $webmoneyWalletToGetPayout;
    
	public function setUp()
    {
		$this->login = MerchantSettings::LOGIN;
		$this->secretKey = MerchantSettings::SECRET_KEY;
	}
}

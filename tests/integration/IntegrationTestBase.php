<?php

namespace Platron\PhpSdkPayout\tests\integration;

use Platron\PhpSdkPayout\tests\integration\MerchantSettings;

abstract class IntegrationTestBase extends \PHPUnit_Framework_TestCase {
	/** @var string */
	protected $login;
	/** @var string */
	protected $secretKey;
	
	public function setUp()
    {
		$this->login = MerchantSettings::LOGIN;
		$this->secretKey = MerchantSettings::SECRET_KEY;
	}
}

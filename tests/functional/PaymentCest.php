<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class PaymentCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function Payment(FunctionalTester $I)
    {   

		$I->amOnPage('/payments');
		$I->seeCurrentUrlEquals('/payments');
		$I->seeResponseCodeIs(200);

	}
}
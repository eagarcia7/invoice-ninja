<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class PaymenCreateCept
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CreatePayment(FunctionalTester $I)
    {   
		$I->amOnPage('/payments/create');
		$I->seeCurrentUrlEquals('/payments/create');
		$I->seeResponseCodeIs(200);

		$I->see('Client');
		$I->click('.dropdown-toggle');
		$I->click('.client-select .dropdown-menu li:first');
	}
}
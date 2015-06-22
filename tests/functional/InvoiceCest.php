<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class InvoiceCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CheckFaq(FunctionalTester $I)
    {   

		$I->amOnPage('/invoices');
		$I->seeCurrentUrlEquals('/invoices');
		$I->seeResponseCodeIs(200);
	}
}
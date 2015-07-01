<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class InvoiceCreateCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function createInvoice(FunctionalTester $I)
    {   

		$I->amOnPage('/invoices');
		$I->seeResponseCodeIs(200);
		$I->click('New Invoice');

		$I->amOnPage('/invoices/create');
		$I->seeCurrentUrlEquals('/invoices/create');
		$I->seeResponseCodeIs(200);

		$I->see('Client');
		$I->see(['name' => 'client']);
	}
}
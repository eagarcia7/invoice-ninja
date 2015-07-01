<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ContactCest
{
    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CheckContactPage(FunctionalTester $I)
    {   

		$I->amOnPage('/contact');
		$I->seeResponseCodeIs(200);
		$I->amOnUrl('https://www.invoiceninja.com/contact');
	}
}
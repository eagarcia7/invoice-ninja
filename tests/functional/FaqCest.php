<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class FaqCept
{
    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CheckFaq(FunctionalTester $I)
    {   

		$I->amOnPage('/faq');
		$I->seeResponseCodeIs(200);
		$I->amOnUrl('https://www.invoiceninja.com/how-it-works');
	}
}
<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class FeauturesCept
{
    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CheckFeatures(FunctionalTester $I)
    {   

		$I->amOnPage('/features');
		$I->seeResponseCodeIs(200);
		$I->amOnUrl('https://www.invoiceninja.com/features');

	}
}
<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class LicenseCest
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

		$I->amOnPage('/license');
		$I->seeCurrentUrlEquals('/license');
		$I->seeResponseCodeIs(200);

	}
}
<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TermsCest
{
    public function _before(FunctionalTester $I)
    {
    	//$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TermsPage(FunctionalTester $I)
    {   
		$I->amOnPage('/terms');
		$I->seeCurrentUrlEquals('/terms');
		$I->see('Terms of Service & Conditions of Use');
		$I->seeResponseCodeIs(200);

	}
}
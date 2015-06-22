<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TokenManagementCest
{
    public function _before(FunctionalTester $I)
    {
    	// $I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TestTokenManagementEditPage(FunctionalTester $I)
    {
		$I->amOnPage('/company/advanced_settings/user_management');
		$I->seeCurrentUrlEquals('/company/advanced_settings/user_management');
		$I->seeResponseCodeIs(200);

	}
}
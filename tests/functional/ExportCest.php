<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ExportCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CheckDashboard(FunctionalTester $I)
    {   

		$I->amOnPage('/company/import_export');
		$I->seeCurrentUrlEquals('/company/import_export');
		$I->seeResponseCodeIs(200);

		$I->see('Export Client Data');
		$I->click('Download');
	}
}
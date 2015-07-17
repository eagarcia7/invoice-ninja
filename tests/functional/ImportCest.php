<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ImportCest
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

		$I->amOnPage('/company/import_export');
		$I->seeCurrentUrlEquals('/company/import_export');
		$I->seeResponseCodeIs(200);

		$I->attachFile('#file', 'export_data.csv');

		$I->click('Upload');

		//redirect to import map
		$I->seeCurrentUrlEquals('/company/import_map');

		$I->see('Use first row as headers');

		$I->checkOption('header_checkbox');

		$I->click('Import');

        $I->seeCurrentUrlEquals('/clients');
	}
}
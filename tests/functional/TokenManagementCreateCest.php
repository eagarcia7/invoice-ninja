<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TokenManagementCreateCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TestTokenManagementCreatePage(FunctionalTester $I)
    {   

    	$faker = Faker\Factory::create();

		$I->amOnPage('/company/advanced_settings/token_management');
		$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');
		$I->seeResponseCodeIs(200);

		$I->click('Add Token');
		$I->seeCurrentUrlEquals('/tokens/create');

		$I->see('Add Token');
		$I->fillField(['name' => 'name'],$faker->word);
		$I->click('Save');

		$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');

	}
}
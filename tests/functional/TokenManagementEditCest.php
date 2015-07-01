<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TokenManagementEditCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TestTokenManagementEditPage(FunctionalTester $I)
    {
    	$faker = Faker\Factory::create();	
    	$fixtures = New fixtures;   
		$token = $fixtures->getToken(null,true);

		$tokenId = $token->id;

		$I->amOnPage('/tokens/'.$tokenId.'/edit');
		$I->seeCurrentUrlEquals('/tokens/'.$tokenId.'/edit');
		$I->seeResponseCodeIs(200);

		$I->see('Edit Token');
		$I->fillField(['name' => 'name'],$faker->word);
		$I->click('Save');

		$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');

	}
}
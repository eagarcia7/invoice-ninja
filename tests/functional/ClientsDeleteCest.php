<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ClientsDeleteCest
{
    public function _before(FunctionalTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function DeleteClient(FunctionalTester $I)
    {   

		$faker = Faker\Factory::create();
		$fixtures = New fixtures;
     	
		$I->amOnPage('/clients');
		$I->seeCurrentUrlEquals('/clients');
		$I->click('.dropdown-toggle');
		$I->click('Delete client');

	}
}
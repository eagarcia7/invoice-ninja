<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TaskCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TaskPage(FunctionalTester $I)
    {
		$faker = Faker\Factory::create();
		$fixtures = New fixtures;

		$I->amOnPage('/tasks');
		$I->seeCurrentUrlEquals('/tasks');
		$I->seeResponseCodeIs(200);

		$I->click('New Task');
		$I->amOnPage('/tasks/create');
		$I->seeCurrentUrlEquals('/tasks/create');

		$client = $fixtures->getRandomClient();
		$clientId = $client->id;

		$I->see('Description');
		// $I->seeElement(['name' => 'description']);
		//$I->fillField('description','wew');

		$I->click('Start');

	}
}
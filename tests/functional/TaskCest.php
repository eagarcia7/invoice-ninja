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
		$I->amOnPage('/tasks');
		$I->seeCurrentUrlEquals('/tasks');
		$I->seeResponseCodeIs(200);

	}
}
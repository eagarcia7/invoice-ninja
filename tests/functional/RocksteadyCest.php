<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class RocksteadyCest
{
    public function _before(FunctionalTester $I)
    {
    	//$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function RocksteadyPage(FunctionalTester $I)
    {   
		$I->amOnPage('/rocksteady');
		$I->seeResponseCodeIs(200);
		$I->amOnUrl('https://www.invoiceninja.com/');

	}
}
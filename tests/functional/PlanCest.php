<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class PlanCept
{
    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function CheckPlan(FunctionalTester $I)
    {   
		$I->amOnPage('/plans');
		$I->seeResponseCodeIs(200);
		$I->amOnUrl('https://www.invoiceninja.com/pricing');
	}
}
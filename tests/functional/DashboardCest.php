<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class DashboardCest
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
		$I->amOnPage('/dashboard');
		$I->seeCurrentUrlEquals('/dashboard');
		$I->see('Notifications');
		$I->see('Invoices Past Due');
	}
}
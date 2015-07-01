<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class QuotesCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function QuotesPage(FunctionalTester $I)
    {   


		$I->amOnPage('/quotes');
		$I->seeCurrentUrlEquals('/quotes');

		$I->seeResponseCodeIs(200);

	}
}
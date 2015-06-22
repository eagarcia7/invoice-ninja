<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ProductCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function ProductList(FunctionalTester $I)
    {   
		$I->amOnPage('/company/products');
		$I->seeCurrentUrlEquals('/company/products');
		$I->seeResponseCodeIs(200);
	}
}
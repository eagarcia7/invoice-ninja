<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TestimonialsCest
{
    public function _before(FunctionalTester $I)
    {
    	//$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TestimonialPage(FunctionalTester $I)
    {   
		$I->amOnPage('/testimonials');
		//$I->seeCurrentUrlEquals('https://www.invoiceninja.com/');
		$I->seeResponseCodeIs(200);
	}
}
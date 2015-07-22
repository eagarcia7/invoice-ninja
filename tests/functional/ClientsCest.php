<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ClientsCest
{
    public function _before(FunctionalTester $I)
    {
        //$I->logout();

        $I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function ShowClientList(FunctionalTester $I)
    {
		$I->amOnPage('/clients');
		$I->seeCurrentUrlEquals('/clients');
		$I->seeResponseCodeIs(200); 

    }
}
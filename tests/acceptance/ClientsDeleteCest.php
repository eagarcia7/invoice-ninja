<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class ClientsDeleteCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function deleteClient(AcceptanceTester $I)
    {   
        $I->amOnPage('/clients');
        $I->seeCurrentUrlEquals('/clients');

        $I->click('.close');

        $I->click('.dropdown-toggle');

        $I->executeJS('return $(".btn-group").attr("style","visibility: visible")');

        $I->click('Delete client'); 

    }
}
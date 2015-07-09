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

        //$I->click('.dropdown-toggle');

       // $I->executeJS('return $(".dataTables_wrapper .btn-group").attr("style","visibility:visible")');

        $I->executeJS('return $(".btn-group.tr-action").attr("style","visibility:visible").addClass("open")');

        $I->see('Select');

        //$I->click('Select');

        $I->see('Delete client');

        $I->click('.tr-action.open .dropdown-menu li:last-child > a'); 

        $I->wait(5);
        $I->seeInPopup('Are you sure?');

       // $I->acceptPopup();

    }
}
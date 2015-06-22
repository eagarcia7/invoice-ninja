<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class CreditsCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function CreditPage(AcceptanceTester $I)
    {   

        $fixtures = New fixtures;
        $faker = Faker\Factory::create();

        $I->amOnPage('/credits');

    }
}
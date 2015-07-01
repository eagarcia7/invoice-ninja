<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class CreditCreateCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function CreateCreditTest(AcceptanceTester $I)
    {   

        $fixtures = New fixtures;
        $faker = Faker\Factory::create();

        $I->amOnPage('/credits/create');
        $I->seeCurrentUrlEquals('/credits/create');

        $client = $fixtures->getRandomClient();
        $clientId = $client->id;

       // $I->click('.dropdown-toggle');

        $I->executeJS('return $(".dropdown-menu").attr("style","display:block")');

        //$I->click('.dropdown-menu li');

       // $I->executeJS('return $("#amount).attr("style","display:block")');

        $I->fillField('#amount',$faker->randomFloat(2,1,100));

        $I->fillField('#private_notes',$faker->realText);

        $I->click('#credit_date');

        //$I->click('.datepicker-days td.day');

        $I->executeJS('return $("input[name=client]").attr("type","text")');

        $I->submitForm('.warn-on-exit', 
            array('amount' => $faker->randomFloat(2,1,100),
                  'private_notes' => $faker->realText,
                  'credit_date' => $faker->date($format = 'M j, Y'),
                  'client' => $clientId ));
    }
}
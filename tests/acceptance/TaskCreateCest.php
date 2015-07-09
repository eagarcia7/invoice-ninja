<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class TaskCreateCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function createTask(AcceptanceTester $I)
    {   

        $fixtures = New fixtures;

        $faker = Faker\Factory::create();

        $I->amOnPage('/tasks/create');

        $I->executeJS('return $("#client").attr("style","display:block")');

        $client =  $fixtures-> getRandomClient();

        $I->selectOption("#client",$client->id);

        $I->executeJS('return $("#description").attr("style","display:block")');

        $I->fillField('#description', $faker->realText);

        $I->submitForm('#start-button', array(
            '#client' => $client->id ,
            '#description' => $faker->realText,
        ));
        //redirect to edit
        $I->click('Save');

    }
}
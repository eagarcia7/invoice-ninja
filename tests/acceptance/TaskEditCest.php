<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class TaskEditCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function EditTask(AcceptanceTester $I)
    {   

        $fixtures = New fixtures;

        $faker = Faker\Factory::create();

        $task = $fixtures->getRandomTask();

        $taskId = $task->id; 

        //dd($taskId);

        $I->see('Tasks');

        $I->see('Edit');
        
        $I->amOnPage('/tasks/'.$taskId.'/edit');

        $I->executeJS('return $("#client").attr("style","display:block")');

        $client =  $fixtures->getRandomClient();

        $I->selectOption("#client",$client->id);

        $I->executeJS('return $("#description").attr("style","display:block")');

        $I->fillField('#description', $faker->realText);

        $I->submitForm('#save-button', array(
            '#client' => $client->id ,
            '#description' => $faker->realText,
        ));

    }
}
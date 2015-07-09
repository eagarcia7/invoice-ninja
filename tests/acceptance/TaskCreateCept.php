<?php
require 'fixtures.php';
$faker = Faker\Factory::create();
$fixtures = New fixtures;

$I = new AcceptanceTester($scenario);
$I->wantTo('create a Task');

$I->checkIfLogin($I);

$I->amOnPage('/tasks/create');

$I->executeJS('return $("#client").attr("style","display:block")');

$client = $fixtures->getRandomClient();

$I->selectOption("#client",$client->id);

$I->executeJS('return $("#description").attr("style","display:block")');

$I->fillField('#description', $faker->realText);

$I->submitForm('#start-button', array(
	'#client' => $client->id ,
	 '#description' => $faker->realText,
	 ));
//redirect to edit
$I->click('Save');
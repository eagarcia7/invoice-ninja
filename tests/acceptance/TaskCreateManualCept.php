<?php
require 'fixtures.php';
$faker = Faker\Factory::create();
$fixtures = New fixtures;

$I = new AcceptanceTester($scenario);
$I->wantTo('create a Task');

$I->checkIfLogin($I);

$I->amOnPage('/tasks/create');

$I->click('.close');

$I->executeJS('return $("#client").attr("style","display:block")');

$client = $fixtures->getRandomClient();

$I->selectOption("#client",$client->id);

$I->executeJS('return $("#description").attr("style","display:block")');

// $I->fillField('#description', $faker->realText);

$I->click('#task_type3');

$I->executeJS('return $("#datetime-details").attr("style","display:block")');

// $I->fillField('#duration_hours',rand(0,100));
// $I->fillField('#duration_minutes',rand(0,100));
// $I->fillField('#duration_seconds',rand(0,100));

$I->submitForm('#start-button', array(
	'#client' => $client->id ,
	 '#description' => $faker->realText,
	 '#duration_hours' => rand(0,100),
	 '#duration_minutes' => rand(0,100),
	 '#duration_seconds' => rand(0,100)
));


$I->click('Save');
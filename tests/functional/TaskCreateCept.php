<?php
require 'fixtures.php';
$faker = Faker\Factory::create();
$fixtures = New fixtures;

$I = new FunctionalTester($scenario);
$I->wantTo('check task page');

$I->checkIfLogin($I);

$I->amOnPage('/tasks');
$I->seeCurrentUrlEquals('/tasks');
$I->seeResponseCodeIs(200);

$I->click('New Task');
$I->amOnPage('/tasks/create');
$I->seeCurrentUrlEquals('/tasks/create');

$client = $fixtures->getRandomClient();
$clientId = $client->id;

$I->see('Description');
// $I->seeElement(['name' => 'description']);
//$I->fillField('description','wew');

$I->click('Start');
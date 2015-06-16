<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();

$I = new FunctionalTester($scenario);
$I->wantTo('To test Clients Add/Edit/Delete');

$I->checkIfLogin($I);

$I->amOnPage('/clients');
$I->seeCurrentUrlEquals('/clients');

//$I->click('.dropdown-toggle');

//$I->click('Delete client');
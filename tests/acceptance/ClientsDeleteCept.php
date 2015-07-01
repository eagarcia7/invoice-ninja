<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();

$I = new AcceptanceTester($scenario);

$I->wantTo('To test Clients Add/Edit/Delete');

$I->checkIfLogin($I);

$I->amOnPage('/clients');

$I->seeCurrentUrlEquals('/clients');

$I->click('.close');

$I->click('.dropdown-toggle');

$I->executeJS('return $(".btn-group").attr("style","visibility: visible")');

$I->click('Delete client');
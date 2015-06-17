<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check Product');

$I->checkIfLogin($I);

$I->amOnPage('/clients');
$I->seeCurrentUrlEquals('/clients');

$I->click('Create Product');

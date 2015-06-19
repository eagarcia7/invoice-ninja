<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check Product');

$I->checkIfLogin($I);

$I->amOnPage('/company/products');
$I->seeCurrentUrlEquals('/company/products');
$I->seeResponseCodeIs(200);

//$I->click('Create Product');
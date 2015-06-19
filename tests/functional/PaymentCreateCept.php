<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('create a payment');

$I->checkIfLogin($I);

$I->amOnPage('/payments/create');
$I->seeCurrentUrlEquals('/payments/create');
$I->seeResponseCodeIs(200);

$I->see('Client');
$I->click('.dropdown-toggle');
$I->click('.client-select .dropdown-menu li:first');
//$I->fillField(['name' => 'client'],'test');
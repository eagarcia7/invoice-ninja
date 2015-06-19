<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('check Invoice page');

$I->checkIfLogin($I);

$I->amOnPage('/invoices');
$I->seeCurrentUrlEquals('/invoices');
$I->seeResponseCodeIs(200);
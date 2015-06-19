<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('check Payment page');

$I->checkIfLogin($I);

$I->amOnPage('/payments');
$I->seeCurrentUrlEquals('/payments');
$I->seeResponseCodeIs(200);
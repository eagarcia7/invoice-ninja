<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('check task page');

$I->checkIfLogin($I);

$I->amOnPage('/tasks');
$I->seeCurrentUrlEquals('/tasks');
$I->seeResponseCodeIs(200);
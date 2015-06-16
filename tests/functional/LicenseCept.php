<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check Terms Page');
$I->checkIfLogin($I);

$I->amOnPage('/license');
$I->seeCurrentUrlEquals('/license');
$I->seeResponseCodeIs(200);

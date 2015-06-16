<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check Terms Page');
$I->checkIfLogin($I);

$I->amOnPage('/terms');
$I->seeCurrentUrlEquals('/terms');
$I->see('Terms of Service & Conditions of Use');
$I->seeResponseCodeIs(200);

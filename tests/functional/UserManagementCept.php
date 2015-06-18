<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('to users lists');

$I->checkIfLogin($I);

$I->amOnPage('/company/advanced_settings/user_management');
$I->seeCurrentUrlEquals('/company/advanced_settings/user_management');
$I->seeResponseCodeIs(200);
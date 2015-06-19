<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('to users lists');

$I->checkIfLogin($I);

$I->amOnPage('/company/advanced_settings/token_management');
$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');
$I->seeResponseCodeIs(200);
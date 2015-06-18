<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('to test export client');

$I->checkIfLogin($I);

$I->amOnPage('/company/import_export');
$I->seeCurrentUrlEquals('/company/import_export');
$I->seeResponseCodeIs(200);

$I->see('Export Client Data');
$I->click('Download');
//redirect to import map
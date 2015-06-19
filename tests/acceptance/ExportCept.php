<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('to test export client');

$I->checkIfLogin($I);

$I->amOnPage('/company/import_export');
$I->seeCurrentUrlEquals('/company/import_export');

$I->click('Download');
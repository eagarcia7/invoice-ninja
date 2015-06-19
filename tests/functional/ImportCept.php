<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('to test import client');

$I->checkIfLogin($I);

$I->amOnPage('/company/import_export');
$I->seeCurrentUrlEquals('/company/import_export');
$I->seeResponseCodeIs(200);

$I->attachFile('#file', 'export_data.csv');

$I->click('Upload');

//redirect to import map
$I->seeCurrentUrlEquals('/company/import_map');

$I->see('Use first row as headers');

$I->checkOption('header_checkbox');

$I->click('Import');
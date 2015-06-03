<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check if all pages are working');

$I->amOnPage('/');
//$I->seeResponseCodeIs(200);


$I->amOnPage('/dashboard');
$I->see('Dashboard','li');
//$I->seeResponseCodeIs(200);


$I->amOnPage('/clients');
$I->see('Clients','li');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/clients/create');
$I->see('Clients');
$I->see('Create');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/tasks');
$I->see('Tasks','li');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/tasks/create');
$I->see('Tasks','li');
$I->see('Create');
//$I->seeResponseCodeIs(200);
//$I->fillField("//input[@type='textarea']", 'description');

$I->amOnPage('/invoices');
$I->see('Invoices','li');
//$I->click('New Invoice');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/invoices/create');
$I->see('Invoices','li');
$I->see('Create');
//$I->seeResponseCodeIs(200);
//$I->click('New Invoice');

$I->amOnPage('/quotes');
$I->see('Quotes','li');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/invoices/create');
$I->see('Invoices','li');
$I->see('Create');
//$I->seeResponseCodeIs(200);


$I->amOnPage('/payments');
$I->see('Payments','li');
//$I->seeResponseCodeIs(200);


//$I->click('Enter Payment');
$I->amOnPage('/payments/create');
$I->see('Payments','li');
$I->see('Create');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/credits');
$I->see('Credits','li');
//$I->click('Enter Credit');
//$I->seeResponseCodeIs(200);


$I->amOnPage('/credits/create');
$I->see('Credits','li');
$I->see('Create');
//$I->seeResponseCodeIs(200);


$I->amOnPage('/company/details');
$I->see('Details');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/gateways/create');
//$I->see('Add Gateway');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/products');
//$I->see('Product Settings');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/import_export');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/invoice_settings');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/invoice_design');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/email_templates');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/charts_and_reports');
//$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/user_management');
//$I->seeResponseCodeIs(200);
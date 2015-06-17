<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('Check if all pages are working');

$I->checkIfLogin($I);
$I->seeResponseCodeIs(200);

$I->amOnPage('/dashboard/');
$I->seeResponseCodeIs(200);
// $I->assertTrue(Auth::check());

$I->amOnPage('/clients');
$I->see('Clients','li');
$I->seeResponseCodeIs(200);

$I->amOnPage('/clients/create');
$I->see('Clients');
$I->see('Create');
$I->seeResponseCodeIs(200);

$I->amOnPage('/tasks');
$I->see('Tasks','li');
$I->seeResponseCodeIs(200);

$I->amOnPage('/tasks/create');
$I->see('Tasks','li');
$I->see('Create');
$I->seeResponseCodeIs(200);
//$I->fillField("//input[@type='textarea']", 'description');

$I->amOnPage('/terms');
$I->see('Terms of Service & Conditions of Use');
$I->seeResponseCodeIs(200);

$I->amOnPage('/license');
$I->seeResponseCodeIs(200);

$I->amOnPage('/invoices');
$I->see('Invoices','li');
$I->click('New Invoice');
$I->seeResponseCodeIs(200);

$I->amOnPage('/invoices/create');
$I->see('Invoices','li');
$I->see('Create');

$I->seeResponseCodeIs(200);
$I->click('New Invoice');

$I->amOnPage('/quotes');
$I->see('Quotes','li');
$I->seeResponseCodeIs(200);

$I->amOnPage('/invoices/create');
$I->see('Invoices','li');
$I->see('Create');
$I->seeResponseCodeIs(200);


$I->amOnPage('/payments');
$I->see('Payments','li');
$I->seeResponseCodeIs(200);
$I->click('Enter Payment');


$I->amOnPage('/payments/create');
$I->see('Payments','li');
$I->see('Create');
$I->seeResponseCodeIs(200);

$I->amOnPage('/credits');
$I->see('Credits','li');
$I->click('Enter Credit');
$I->seeResponseCodeIs(200);


$I->amOnPage('/credits/create');
$I->see('Credits','li');
$I->see('Create');
$I->seeResponseCodeIs(200);


$I->amOnPage('/company/details');
$I->see('Details');
$I->seeResponseCodeIs(200);

$I->amOnPage('/gateways/create');
$I->see('Add Gateway');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/products');
$I->see('Product Settings');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/import_export');
$I->see('Import Client Data');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/invoice_settings');
$I->see('Invoice Fields');
$I->see('Invoice Number');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/invoice_design');
$I->see('Invoice Design');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/email_templates');
$I->see('Invoice Email');
$I->see('Quote Email');
$I->see('Payment Email');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/charts_and_reports');
$I->see('Data Visualizations');
$I->seeResponseCodeIs(200);

$I->amOnPage('/company/advanced_settings/user_management');
$I->see('Api Tokens');
$I->seeResponseCodeIs(200);

//try to logout
$I->click('#myAccountButton');
$I->see('Log Out');
$I->click('Log Out');
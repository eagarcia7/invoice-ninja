<?php
require 'fixtures.php';
$faker = Faker\Factory::create(); 
$I = new FunctionalTester($scenario);
$I->wantTo('Update invoice settings');

$I->checkIfLogin($I);

$I->amOnPage('/company/advanced_settings/invoice_settings');
$I->seeCurrentUrlEquals('/company/advanced_settings/invoice_settings');
$I->seeResponseCodeIs(200);

//invoice fields
$I->see('Invoice Fields');
$I->fillField(['name' => 'custom_invoice_label1'],$faker->word);
$I->fillField(['name' => 'custom_invoice_label2'],$faker->word);

//clients fields
$I->see('Client Fields');
$I->fillField(['name' => 'custom_client_label1'],$faker->word);
$I->fillField(['name' => 'custom_client_label2'],$faker->word);

//company fields
$I->see('Company Fields');
$I->fillField(['name' => 'custom_label1'],$faker->word);
$I->fillField(['name' => 'custom_value1'],$faker->word);

$I->fillField(['name' => 'custom_label2'],$faker->word);
$I->fillField(['name' => 'custom_value2'],$faker->word);

//Invoice Number
$I->fillField(['name' => 'invoice_number_prefix'],$faker->randomDigit);
$I->fillField(['name' => 'invoice_number_counter'],$faker->randomDigit);

//Quote Number
$I->fillField(['name' => 'quote_number_prefix'],$faker->randomDigit);
$I->checkOption('share_counter');
$I->checkOption('pdf_email_attachment');
$I->checkOption('utf8_invoices');

$I->click('Save');
<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('To test Clients Add/Edit/Delete');

$I->checkIfLogin($I);

$I->amOnPage('/clients');
$I->seeCurrentUrlEquals('/clients');

//Organization
$I->click('New Client');
$I->see('name');
$I->fillField(['name' => 'name'],'name');
$I->see('ID Number');
$I->fillField(['name' => 'id_number'],rand(0,10000));
$I->see('VAT Number');
$I->fillField(['name' => 'vat_number'], rand(0,10000));
$I->see('Website');
$I->fillField(['name' => 'website'], 'https://www.invoiceninja.com/');
$I->see('Phone');
$I->fillField(['name' => 'work_phone'], '1234-567');

//Address
$I->see('Street');
$I->fillField(['name' => 'address1'],'address1');
$I->see('Apt/Suite');
$I->fillField(['name' => 'address2'],'address2');
$I->see('City');
$I->fillField(['name' => 'city'], 'city');
$I->see('State/Province');
$I->fillField(['name' => 'state'], 'state');
$I->see('Postal Code');
$I->fillField(['name' => 'postal_code'], '4000');
$I->see('Country');
$I->selectOption("form select[name='country_id']", 840);

//Contacts
$I->see('First Name');
$I->fillField(['name' => 'first_name'],'first_name');
$I->see('Last Name');
$I->fillField(['name' => 'last_name'],'last_name');
$I->see('Email');
$I->fillField(['name' => 'email'],'email@email.com');
$I->see('Phone');
$I->fillField(['name' => 'phone'],'1234-123');

//additional info
$I->see('Currency');
$I->selectOption("form select[name='currency_id']", 12);

$I->see('Payment Terms');
$I->selectOption("form select[name='payment_terms']", 7);

$I->see('Size');
$I->selectOption("form select[name='size_id']", 11);

$I->see('Industry');
$I->selectOption("form select[name='industry_id']", 32);

$I->see('Private Notes');
$I->fillField(['name' => 'private_notes'],'rand');

$I->click('Save');
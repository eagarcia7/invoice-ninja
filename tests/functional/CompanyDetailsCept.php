<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();
$fixtures = New fixtures;

$I = new FunctionalTester($scenario);
$I->wantTo('Check CompanyDetails Page');

$I->checkIfLogin($I);

$I->amOnPage('/company/details');
$I->seeResponseCodeIs(200);

//Details
$I->see('Name');
$I->fillField(['name' => 'name'],$faker->word);

$I->see('ID Number');
$I->fillField(['name' => 'id_number'],$faker->randomNumber);

$I->see('VAT Number');
$I->fillField(['name' => 'vat_number'],$faker->randomNumber);

$I->see('Email');
$I->fillField(['name' => 'work_email'],$faker->email);

$I->see('Phone');
$I->fillField(['name' => 'work_phone'],$faker->phoneNumber);

$I->see('Phone');
$I->fillField(['name' => 'work_phone'],$faker->phoneNumber);

$I->see('Logo');
$I->attachFile(['name' => 'logo'], 'logo.jpg');

$I->see('Size');
$sizes = $fixtures->getSizes();
$random = array_rand($sizes);
$I->selectOption("form select[name='size_id']", $random);

$I->see('Industry');
$industry = $fixtures->getIndustry();
$random = array_rand($industry);
$I->selectOption("form select[name='industry_id']", $random);


//Address
$I->see('Street');
$I->fillField(['name' => 'address1'],$faker->streetName);

$I->see('Apt/Suite');
$I->fillField(['name' => 'address2'],$faker->secondaryAddress);

$I->see('City');
$I->fillField(['name' => 'city'],$faker->city);

$I->see('State/Province');
$I->fillField(['name' => 'state'],$faker->state);

$I->see('Postal Code');
$I->fillField(['name' => 'postal_code'],$faker->postcode);

//country is hidden
//$I->fillField(['name' => 'country_id'],8);

//users
$I->see('First Name');
$I->fillField(['name' => 'first_name'],$faker->city);

$I->see('Last Name');
$I->fillField(['name' => 'last_name'],$faker->city);

$I->see('Email');
$I->fillField(['name' => 'email'],$faker->email);

$I->see('Phone');
$I->fillField(['name' => 'phone'],$faker->phoneNumber);


//country
$I->see('Language');
$language = $fixtures->getLanguage();
$random = array_rand($language);
$I->selectOption("form select[name='language_id']", $random);

$I->see('Currency');
$currency = $fixtures->getCurrency();
$random = array_rand($currency);
$I->selectOption("form select[name='currency_id']", $random);

$I->see('Timezone');
$timezone = $fixtures->getCurrency();
$random = array_rand($timezone);
$I->selectOption("form select[name='timezone_id']", $random);

$I->see('Date format');
$dateFormat = $fixtures->getDateFormat();
$random = array_rand($dateFormat);
$I->selectOption("form select[name='date_format_id']", $random);

$I->see('Date/Time Format');
$dateTimeFormat = $fixtures->getDatetimeFormat();
$random = array_rand($dateTimeFormat);
$I->selectOption("form select[name='datetime_format_id']", $random);

$I->click('Save');
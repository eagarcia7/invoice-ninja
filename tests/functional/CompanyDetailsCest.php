<?php
require_once __DIR__ . '/../helpers/Helper.php';
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class CompanyDetailsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function UpdateCompanyDetails(FunctionalTester $I)
    {   

		$faker = Faker\Factory::create();
		$fixtures = New fixtures;

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

        /*
		$I->see('Size');
		$sizes = $fixtures->getSizes();
		$random = array_rand($sizes);
		$I->selectOption("form select[name='size_id']", $random);
        */
        $I->see('Size');
        $I->selectOption("form select[name='size_id']", Helper::getRandom('Size'));

        /*
        $I->see('Industry');
		$industry = $fixtures->getIndustry();
		$random = array_rand($industry);
		$I->selectOption("form select[name='industry_id']", $random);
         */

        $I->see('Industry');
        $I->selectOption("form select[name='industry_id']", Helper::getRandom('Industry'));

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
		//$I->fillField(['name' => 'email'],$faker->email);         // ¡¡ Don't Touch!!

		$I->see('Phone');
		$I->fillField(['name' => 'phone'],$faker->phoneNumber);


		//country
		$I->see('Language');
        /*
		$language = $fixtures->getLanguage();
		$random = array_rand($language);
		$I->selectOption("form select[name='language_id']", $random);
        */
        //$I->selectOption("form select[name='language_id']", Helper::getRandom('Language'));   // ¡¡ Don't Touch!!

		$I->see('Currency');
        /*
		$currency = $fixtures->getCurrency();
		$random = array_rand($currency);
		$I->selectOption("form select[name='currency_id']", $random);
        */
        $I->selectOption("form select[name='currency_id']", Helper::getRandom('Currency'));

		$I->see('Timezone');
        /*
		$timezone = $fixtures->getCurrency();
		$random = array_rand($timezone);
		$I->selectOption("form select[name='timezone_id']", $random);
        */
        $I->selectOption("form select[name='timezone_id']", Helper::getRandom('Timezone'));

		$I->see('Date format');
        /*
		$dateFormat = $fixtures->getDateFormat();
		$random = array_rand($dateFormat);
		$I->selectOption("form select[name='date_format_id']", $random);
        */
        $I->selectOption("form select[name='date_format_id']", Helper::getRandom('DateFormat'));

		$I->see('Date/Time Format');
        /*
		$dateTimeFormat = $fixtures->getDatetimeFormat();
		$random = array_rand($dateTimeFormat);
		$I->selectOption("form select[name='datetime_format_id']", $random);
        */
        $I->selectOption("form select[name='datetime_format_id']", Helper::getRandom('DatetimeFormat'));

		$I->click('Save');


	}
}
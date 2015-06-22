<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ClientsEditCest
{
    public function _before(FunctionalTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function EditClient(FunctionalTester $I)
    {   

    	$faker = Faker\Factory::create();
		$fixtures = New fixtures;

		$client = $fixtures->getRandomClient();
		$clientId = $client->id;

		$I->amOnPage('/clients/'.$clientId.'/edit');
		$I->see('name');
		$I->fillField(['name' => 'name'],$faker->word);
		$I->see('ID Number');
		$I->fillField(['name' => 'id_number'],rand(0,10000));
		$I->see('VAT Number');
		$I->fillField(['name' => 'vat_number'], rand(0,10000));
		$I->see('Website');
		$I->fillField(['name' => 'website'], 'https://www.invoiceninja.com/');
		$I->see('Phone');
		$I->fillField(['name' => 'work_phone'], $faker->phoneNumber);

		//Address
		$I->see('Street');
		$I->fillField(['name' => 'address1'],$faker->streetName);
		$I->see('Apt/Suite');
		$I->fillField(['name' => 'address2'],$faker->streetName);
		$I->see('City');
		$I->fillField(['name' => 'city'],$faker->city);
		$I->see('State/Province');
		$I->fillField(['name' => 'state'],$faker->state);
		$I->see('Postal Code');
		$I->fillField(['name' => 'postal_code'], $faker->postcode);
		$I->see('Country');
		$country = $fixtures->getCountries();
		$random = array_rand($country);
		$I->selectOption("form select[name='country_id']", $random);

		//Contacts
		$I->see('First Name');
		$I->fillField(['name' => 'first_name'],$faker->firstName);
		$I->see('Last Name');
		$I->fillField(['name' => 'last_name'],$faker->lastName);
		$I->see('Email');
		$I->fillField(['name' => 'email'],$faker->email);
		$I->see('Phone');
		$I->fillField(['name' => 'phone'],$faker->phoneNumber);

		$I->see('Currency');
		$currency = $fixtures->getCurrency();
		$random = array_rand($currency);
		$I->selectOption("form select[name='currency_id']", $random);

		$I->see('Payment Terms');
		$payments = $fixtures->getPaymentTerms();
		$random = array_rand($payments);
		$I->selectOption("form select[name='payment_terms']", $random);

		$I->see('Size');
		$sizes = $fixtures->getSizes();
		$random = array_rand($sizes);
		$I->selectOption("form select[name='size_id']", $random);

		$I->see('Industry');
		$industry = $fixtures->getIndustry();
		$random = array_rand($industry);
		$I->selectOption("form select[name='industry_id']", $random);

		$I->see('Private Notes');
		$I->fillField(['name' => 'private_notes'],$faker->text);

		$I->click('Save');

	}
}
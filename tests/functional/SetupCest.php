<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class SetupCept
{
    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function SetUpPage(FunctionalTester $I)
    {   

		$I->amOnPage('/setup');
		$I->see('Invoice Ninja Setup');
		$I->fillField(['name' => 'app[url]'], getenv('APP_URL'));
		$I->selectOption("form select[name='database[default]']", getenv('DB_TYPE'));
		$I->fillField(['name' => 'database[type][host]'], getenv('DB_HOST'));

		$I->fillField(['name' => 'database[type][database]'],  getenv('DB_DATABASE'));
		$I->fillField(['name' => 'database[type][username]'], getenv('DB_USERNAME'));
		$I->fillField(['name' => 'database[type][password]'], getenv('DB_PASSWORD'));

		//email settings
		$I->selectOption("form select[name='mail[driver]']",getenv('MAIL_DRIVER'));
		$I->fillField(['name' => 'mail[host]'], getenv('DB_HOST'));
		$I->fillField(['name' => 'mail[port]'], getenv('MAIL_PORT'));
		$I->selectOption("form select[name='mail[encryption]']", getenv('MAIL_ENCRYPTION'));

		//userdetails
		$I->fillField(['name' => 'first_name'],  getenv('USER_FIRSTNAME'));
		$I->fillField(['name' => 'last_name'],  getenv('USER_LASTNAME'));
		$I->fillField(['name' => 'email'],  getenv('USER_EMAIL'));
		$I->fillField(['name' => 'password'],  getenv('USER_PASSWORD'));

		$I->checkOption('form input[name="terms_checkbox"]');
		$I->click('Submit');
		$I->amOnPage('/dashboard');

		$I->seeResponseCodeIs(200);
	}
}
<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \FunctionalTester;
use Faker\Factory;

class SignUpCest
{
    private $faker;

    public function _before(FunctionalTester $I)
    {
        $I->checkIfLogin($I);

        $this->faker = Factory::create();
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function signUp(FunctionalTester $I)
    {
        $I->wantTo("Sign up as new user");

        $I->amOnPage('/logout');

        $I->amOnPage('/signup');

        $I->seeCurrentUrlEquals('/signup');

        $I->seeResponseCodeIs(200);
    }
}

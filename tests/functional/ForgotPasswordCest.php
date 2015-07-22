<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \FunctionalTester;
use Faker\Factory;

class ForgotPasswordCest
{
    private $faker;

    public function _before(FunctionalTester $I)
    {
        $I->checkIfLogin($I);
        //$I->logout();
        $this->faker = Factory::create();
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function resetPassword(FunctionalTester $I)
    {
        $I->wantTo("Reset my password");

        $I->amOnPage('/logout');

        $I->amOnPage('/forgot');

        $I->seeCurrentUrlEquals('/forgot');

        $I->fillField(['name' => 'email'], 'webmaster@email.com');

        $I->click('.btn-success');

        $I->seeResponseCodeIs(200);
    }
}

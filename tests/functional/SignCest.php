<?php
use \FunctionalTester;

class SignCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkLogin(FunctionalTester $I)
    {
        //Login user
        $I->checkIfLogin($I);
        $I->amOnPage('/dashboard');

        //Check login
        $I->seeCurrentUrlEquals('/dashboard');
        $I->see('dashboard');
    }

    public function checkLogout(FunctionalTester $I)
    {
        $I->wantTo('Test Logout');

        //Login user
        $I->checkIfLogin($I);
        $I->amOnPage('/dashboard');
        $I->seeCurrentUrlEquals('/dashboard');

        //Logout user
        $I->amOnPage('/logout');
        $I->seeCurrentUrlEquals('/login');

    }
}

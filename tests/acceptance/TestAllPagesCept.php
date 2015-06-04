<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//$I->amOnUrl('http://invoice_ninja.app/dino');
$I->amOnPage('/login');
$I->see('Forgot your password?');
$I->fillField(['name' => 'email'], 'test@email.com');

$I->fillField(['name' => 'password'], 'password');
$I->click('Let’s go');
//$I->seeCookie();

$I->amOnPage('/dashboard');
$I->see('dashboard');
$I->see('Dashboard','li');
//$I->see('Laravel 5');
<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('To check Dashboard Page');

// $I->amOnPage('/login');
// $I->fillField(['name' => 'email'], 'webmaster@email.com');
// $I->fillField(['name' => 'password'], '2Werty4');
// $I->click('Let’s go');
$I->checkIfLogin($I);

$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/dashboard');
$I->see('Notifications');
$I->see('Invoices Past Due');
<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
//$I->amOnUrl('http://invoice_ninja.app/dino');
$I->amOnPage('/login');
$I->fillField(['name' => 'email'], 'webmaster@email.com');
$I->fillField(['name' => 'password'], '2Werty4');
$I->click('Let’s go');

//$I->amOnPage('/tasks');
$I->amOnPage('/tasks/create');

$I->executeJS('return $("#client").attr("style","display:block")');
$I->selectOption("#client", '6');

//$I->fillField(['name' => 'description'], '2Werty4');
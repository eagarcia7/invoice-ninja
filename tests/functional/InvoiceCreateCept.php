<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Create an invoice');

$I->checkIfLogin($I);
$I->amOnPage('/invoices');
$I->seeResponseCodeIs(200);
$I->click('New Invoice');

$I->amOnPage('/invoices/create');
$I->seeCurrentUrlEquals('/invoices/create');
$I->seeResponseCodeIs(200);

$I->see('Client');
$I->see(['name' => 'client']);

<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();
$fixtures = New fixtures;

$I = new FunctionalTester($scenario);
$I->wantTo('Edit Payment Gateway details');

$I->checkIfLogin($I);

$I->amOnPage('/company/payments');

$payment_type = ['PAYMENT_TYPE_CREDIT_CARD','PAYMENT_TYPE_PAYPAL','PAYMENT_TYPE_BITCOIN'];
$rand = array_rand($payment_type);
$I->selectOption("form select[name='country_id']", 'PAYMENT_TYPE_CREDIT_CARD');

if ($rand == 'PAYMENT_TYPE_CREDIT_CARD') {
	
	$gateway = $fixtures->getGateways();
	$random = array_rand($gateway);
	$I->selectOption("form select[name='payment_type_id']", $random);

}
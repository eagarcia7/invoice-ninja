<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();
$I = new FunctionalTester($scenario);

$fixtures = New fixtures;

$I->wantTo('Edit Notification');

$I->checkIfLogin($I);

$I->seeResponseCodeIs(200);

$I->amOnPage('company/notifications');
$I->seeCurrentUrlEquals('/company/notifications');

$I->checkOption('notify_sent');
$I->checkOption('notify_viewed');

$I->checkOption('notify_paid');
$I->checkOption('notify_viewed');
$I->checkOption('notify_approved');

$I->see('Set default invoice terms');
$I->fillField(['name' => 'invoice_terms'],$faker->sentence);

$I->see('Set default invoice footer');
$I->fillField(['name' => 'invoice_footer'],$faker->sentence);

$I->see('Set default email signature');
$I->fillField(['name' => 'email_footer'],$faker->word);

$I->click('Save');
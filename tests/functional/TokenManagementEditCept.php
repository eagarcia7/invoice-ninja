<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();
$I = new FunctionalTester($scenario);
$I->wantTo('To edit a token');

$fixtures = New fixtures;

$I->checkIfLogin($I);

$token = $fixtures->getToken(null,true);

$tokenId = $token->id;

$I->amOnPage('/tokens/'.$tokenId.'/edit');
$I->seeCurrentUrlEquals('/tokens/'.$tokenId.'/edit');
$I->seeResponseCodeIs(200);

$I->see('Edit Token');
$I->fillField(['name' => 'name'],$faker->word);
$I->click('Save');

$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');
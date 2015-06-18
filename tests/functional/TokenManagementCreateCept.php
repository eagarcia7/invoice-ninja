<?php 
$faker = Faker\Factory::create();
$I = new FunctionalTester($scenario);
$I->wantTo('To token lists');

$I->checkIfLogin($I);

$I->amOnPage('/company/advanced_settings/token_management');
$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');
$I->seeResponseCodeIs(200);

$I->click('Add Token');
$I->seeCurrentUrlEquals('/tokens/create');

$I->see('Add Token');
$I->fillField(['name' => 'name'],$faker->word);
$I->click('Save');

$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');
<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();
$I = new FunctionalTester($scenario);
$I->wantTo('Create a Product');

$I->checkIfLogin($I);

$I->amOnPage('/company/products');
$I->seeCurrentUrlEquals('/company/products');
$I->seeResponseCodeIs(200);

$I->click('Create Product');
$I->seeCurrentUrlEquals('/products/create');

$I->see('Product');
$I->fillField(['name' => 'product_key'],$faker->word);

$I->see('Notes');
$I->fillField(['name' => 'notes'],$faker->sentence);

$I->see('Notes');
$I->fillField(['name' => 'cost'],$faker->randomFloat(2,1,100));

$I->click('Save');

$I->seeCurrentUrlEquals('/company/products');
$I->seeResponseCodeIs(200);
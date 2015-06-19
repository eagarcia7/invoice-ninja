<?php 
require 'fixtures.php';
$faker = Faker\Factory::create();
$I = new FunctionalTester($scenario);

$fixtures = New fixtures;

$I->wantTo('Update Notification');

$I->checkIfLogin($I);

$I->seeResponseCodeIs(200);

$I->amOnPage('/company/notifications');
$I->seeCurrentUrlEquals('/company/notifications');

$product = $fixtures->getProduct(null,true);
$productId = $product->id;

$I->amOnPage('/products/'.$productId.'/edit');
$I->seeCurrentUrlEquals('/products/'.$productId.'/edit');

$I->see('Product');
$I->fillField(['name' => 'product_key'],$faker->word);

$I->see('Notes');
$I->fillField(['name' => 'notes'],$faker->sentence);

$I->see('Notes');
$I->fillField(['name' => 'cost'],$faker->randomFloat(2,1,100));

$I->click('Save');

$I->seeCurrentUrlEquals('/company/products');

$I->seeResponseCodeIs(200);
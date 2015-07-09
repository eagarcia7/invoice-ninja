<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class ProductCreateCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function ProductCreate(FunctionalTester $I)
    {   
    	$faker = Faker\Factory::create();
		$fixtures = New fixtures;

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

	}
}
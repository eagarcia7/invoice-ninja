<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class InvoiceDesignCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function updateInvoiceDesign(AcceptanceTester $I)
    {   

        $fixtures = New fixtures;

        $faker = Faker\Factory::create();

        $I->amOnPage('/company/advanced_settings/invoice_design');

        $design = $fixtures->getInvoiceDesign(null,true);
        
        $I->selectOption('#invoice_design_id', $design->id);
        
        $I->fillField(['name' => 'font_size'],$faker->randomDigitNotNull);

        $I->executeJs('return $("#primary_color").attr("style:display:block")');

        //$I->fillField('#primary_color',$faker->hexcolor);
        //$I->click('Save');

        $I->fillField(['name' => 'labels_item'],$faker->word);

        $I->fillField(['name' => 'labels_description'],$faker->realText);

        $I->fillField(['name' => 'labels_unit_cost'],$faker->randomFloat(2, 1, 100));

        $I->fillField(['name' => 'labels_quantity'],$faker->randomDigitNotNull);

        $I->checkOption('#hide_quantity');

        $I->checkOption('#hide_paid_to_date');

        $I->click('Save');

    }
}
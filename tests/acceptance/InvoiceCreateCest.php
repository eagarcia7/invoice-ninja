<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class InvoiceCreateCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function createInvoice(AcceptanceTester $I)
    {   
        $fixtures = New fixtures;

        $faker = Faker\Factory::create();

        $I->amOnPage('/invoices/create');

        $I->see('Invoice');

        $I->see('Create');

        $I->dontSee('#client');

        //$I->click('.dropdown-toggle');

        $I->executeJS('return $("ul.dropdown-menu").attr("style","display:block")');

        $I->seeCurrentUrlEquals('/invoices/create');

        //$I->click('.dropdown-menu a');

        $I->click('#invoice_date');

        $I->click('.datepicker-days td.day');

        $I->see('Due Date');

        $I->click('#due_date');

        $I->click('.datepicker-days td.day');    
        
        $I->fillField(['name' => 'partial'],$faker->word);
        
        $I->fillField(['name' => 'invoice_number'],$faker->randomNumber(5));

        $I->fillField(['name' => 'po_number'],$faker->randomNumber(5));

        $I->fillField(['name' => 'discount'],$faker->randomNumber(2));

        //item 

        $I->fillField(['name' => 'product_key'],$faker->randomNumber(2));
        $I->fillField(['name' => 'public_notes'],$faker->realText);

        $I->click('#saveButton');
        
    }
}
<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class DataVisualizationCest
{
    public function _before(AcceptanceTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function CheckDataVisualizationPage(AcceptanceTester $I)
    {   
        $faker = Faker\Factory::create();
        
        $format = 'M d,Y';

		$I->amOnPage('/company/advanced_settings/data_visualizations');
		
        $I->seeCurrentUrlEquals('/company/advanced_settings/data_visualizations');

        $fixtures = New fixtures;

        $I->selectOption('#groupBySelect','Clients');

        //check report

         $I->selectOption('#groupBySelect','Invoices');

         //check report
         
         $I->selectOption('#groupBySelect','Products');

          //check report
    }   
}
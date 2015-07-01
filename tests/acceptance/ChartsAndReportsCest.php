<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class ChartsAndReportsCest
{
    public function _before(AcceptanceTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function UpdateChartsAndReportPage(AcceptanceTester $I)
    {   

        $faker = Faker\Factory::create();

        $fixtures = New fixtures;

		$I->amOnPage('/company/advanced_settings/charts_and_reports');
		
        $I->seeCurrentUrlEquals('/company/advanced_settings/charts_and_reports');
 
        $format = 'M d,Y';

        $start_date =  date ( $format, strtotime ( '-7 day' . date('M d,Y'))); 

        $I->fillField(['name' => 'start_date'],$start_date);

        $I->fillField(['name' => 'end_date'],date('M d,Y'));

        $I->checkOption(['name' => 'enable_report']);

        $I->selectOption("#report_type", 'Client');

        $I->checkOption(['name' => 'enable_chart']);

        $rand = ['DAYOFYEAR','WEEK','MONTH'];

        $select = array_rand($rand);

        $I->selectOption("#group_by", $rand[$select]);

        $rand = ['Bar','Line'];

        $select = array_rand($rand);

        $I->selectOption("#chart_type", $rand[$select]);

        $I->click('Export');

    }
}
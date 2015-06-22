<?php
require 'fixtures.php';
use \AcceptanceTester;
//use \fixtures;

class PaymentCreateCest extends PHPUnit_Extensions_Selenium2TestCase
{


    protected $webDriver;

    public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function testTitle()
    {
        $this->url('http://www.example.com/');
        $this->assertEquals('Example WWW Page', $this->title());
    }


    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }

    // tests
    public function CreatePayment(AcceptanceTester $I)
    {   

        // $I->amOnPage('/payments/create');
        // $I->seeCurrentUrlEquals('/payments/create');
        // $I->seeResponseCodeIs(200);

        // $I->see('Client');
        // $I->click('.dropdown-toggle');
        // $I->click('.client-select .dropdown-menu li:first');

    }
}
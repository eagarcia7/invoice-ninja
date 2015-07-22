<?php
require 'fixtures.php';
use \AcceptanceTester;

class ExportCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function CheckDashboard(AcceptanceTester $I)
    {
        $I->amOnPage('/company/import_export');
        $I->seeCurrentUrlEquals('/company/import_export');

        $I->see('Export Client Data');
        $I->click('Download');
    }
}

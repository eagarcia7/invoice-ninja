<?php
use \AcceptanceTester;

class TokenManagementCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function TestTokenManagementPage(AcceptanceTester $I)
    {
        $I->amOnPage('/company/advanced_settings/token_management');
        $I->seeCurrentUrlEquals('/company/advanced_settings/token_management');

        $tokens = \App\Models\AccountToken::all()->toArray();
        $num_tokens = count($tokens);
        $I->seeElement('table#DataTables_Table_0 tbody tr:nth-child('.$num_tokens.')');
    }
}

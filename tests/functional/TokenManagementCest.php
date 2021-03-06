<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class TokenManagementCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function TestTokenManagementPage(FunctionalTester $I)
    {   
		$I->amOnPage('/company/advanced_settings/token_management');
		$I->seeCurrentUrlEquals('/company/advanced_settings/token_management');

        $tokens = \App\Models\AccountToken::all()->toArray();
        $num_tokens = count($tokens);
        $I->seeElement('table#DataTables_Table_0 tbody tr:nth-child('.$num_tokens.')');
	}
}
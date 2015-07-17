<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use Faker\Factory;

class CreditsCest
{
    private $faker;

    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);

        $this->faker = Factory::create();
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function showCredits(AcceptanceTester $I)
    {
        $I->wantTo('See the list Credits');

        $I->amOnPage('/credits');

        $I->seeCurrentUrlEquals('/credits');

        $credits = \App\Models\Credit::all()->toArray();
        $num_credits = count($credits);
        $I->seeElement('table#DataTables_Table_0 tbody tr:nth-child('.$num_credits.')');
    }
}
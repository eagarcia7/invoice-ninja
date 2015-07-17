<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use Faker\Factory;

class CreditCreateCest
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

    public function createCredit(AcceptanceTester $I)
    {
        $I->wantTo('Enter a new Credit');

        $I->amOnPage('/credits/create');

        $opt_client = 2;
        $amount = $this->faker->numberBetween(50, 200);
        $date = 'now + 1 day';
        $private_notes = $this->faker->text(50);

        $I->click('.client-select .combobox-container span.dropdown-toggle');
        $I->click('.client-select .combobox-container ul li:nth-child('.$opt_client.')');
        $id_client = $I->executeJS('return $("input[name=client]").val()');

        $I->fillField(['name' => 'amount'], $amount);

        $I->selectDataPicker($I, '#credit_date', 'now + 1 day');

        $I->fillField(['name' => 'private_notes'], $private_notes);

        $I->click('.btn-success');

        $I->seeCurrentUrlEquals('/clients/'.$id_client);

        $I->seeInDatabase('credits', ['amount' => $amount]);
    }
}
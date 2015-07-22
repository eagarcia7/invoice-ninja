<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use App\Models\Credit;
use Faker\Factory;

class CreditCest
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

    public function index(AcceptanceTester $I)
    {
        $I->wantTo('see the list Credits');

        $I->amOnPage('/credits');
        $I->seeCurrentUrlEquals('/credits');

        $I->seeNumberOfElements('table.table tr', Credit::all()->count());
    }

    public function create(AcceptanceTester $I)
    {
        $I->wantTo('create a new Credit');

        $I->amOnPage('/credits/create');

        if ($client = Helper::getRandom('Client', 'name')) {
            $amount        = rand(50, 200);
            $private_notes = $this->faker->text(50);

            //select client
            $I->selectDropdown($I, $client, '.client-select .dropdown-toggle');

            //amount
            $I->fillField(['name' => 'amount'], $amount);

            //credit date
            $I->selectDataPicker($I, '#credit_date', 'now + 1 day');

            //private notes
            $I->fillField(['name' => 'private_notes'], $private_notes);

            //save
            $I->click('button[type=submit]');
            $I->wait(3);

            //check if credit was created
            $I->seeInDatabase('credits', ['private_notes' => $private_notes]);
        }
    }
}
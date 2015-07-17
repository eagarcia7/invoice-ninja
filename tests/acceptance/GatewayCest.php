<?php
use \AcceptanceTester;
use Faker\Factory;

class GatewayCest
{
    private $faker;

    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);

        $this->faker = Factory::create();
        //$this->faker->
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function create(AcceptanceTester $I)
    {
        $I->wantTo("Add a new gateway");

        $I->amOnPage('/gateways/create');

        $I->seeCurrentUrlEquals('/gateways/create');

        $account_gateways = \App\Models\AccountGateway::all()->toArray();

        $option = 1;

        //$I->seeNumberOfElements('div', 0);

        $I->selectOption('#payment_type_id', $option);

        switch($option) {

            case 1:
                $I->fillField(['name' => '17_username'], $this->faker->userName);
                $I->fillField(['name' => '17_password'], $this->faker->password);
                $I->fillField(['name' => '17_signature'], $this->faker->text(12));
                $I->checkOption(['name' => '17_testMode']);
                break;

            case 2:
                $I->checkOption(['name' => '42_testMode']);
                $I->fillField(['name' => '42_apiKey'], $this->faker->key());
                break;

            case 3:
                $I->fillField(['name' => '43_destinationId'], $this->faker->address);
                $I->checkOption(['name' => '43_sandbox']);
                $I->fillField(['name' => '43_secret'], $this->faker->key());
                $I->fillField(['name' => '43_key'], $this->faker->key());
                break;
        }

        $I->click('Save');
    }
}

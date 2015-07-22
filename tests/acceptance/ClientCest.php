<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use Faker\Factory;

class ClientCest
{
    /**
     * @var \Faker\Generator
     */
    private $faker;
    
    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);

        $this->faker = Factory::create();
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function createClient(AcceptanceTester $I)
    {
        $I->wantTo('Create a new Client');

        //Organization
        $I->amOnPage('/clients/create');
        $I->fillField(['name' => 'name'], $name = $this->faker->name);
        $I->fillField(['name' => 'id_number'],rand(0,10000));
        $I->fillField(['name' => 'vat_number'], rand(0,10000));
        $I->fillField(['name' => 'website'], $this->faker->url);
        $I->fillField(['name' => 'work_phone'], $this->faker->phoneNumber);

        //Contacts
        $I->fillField(['name' => 'first_name'], $this->faker->firstName);
        $I->fillField(['name' => 'last_name'], $this->faker->lastName);
        $I->fillField(['name' => 'email'], $this->faker->companyEmail);
        $I->fillField(['name' => 'phone'],  $this->faker->phoneNumber);

        //Additional Contact
        /*
        $I->click('Add contact +');
        $I->fillField('.form-group:nth-child(6) #first_name', $this->faker->firstName);
        $I->fillField('.form-group:nth-child(7) #last_name', $this->faker->lastName);
        $I->fillField('.form-group:nth-child(8) #email1', $this->faker->companyEmail);
        $I->fillField('.form-group:nth-child(9) #phone', $this->faker->phoneNumber);
        */

        //Address
        $I->see('Street');
        $I->fillField(['name' => 'address1'], $this->faker->streetAddress);
        $I->fillField(['name' => 'address2'], $this->faker->streetAddress);
        $I->fillField(['name' => 'city'], $this->faker->city);
        $I->fillField(['name' => 'state'], $this->faker->state);
        $I->fillField(['name' => 'postal_code'], $this->faker->postcode);
        $I->executeJS('$(\'input[name="country_id"]\').val('. Helper::getRandom('Country').')');

        //Additional Info
        $I->selectOption(['name' => 'currency_id'], Helper::getRandom('Currency'));;
        $I->selectOption(['name' => 'payment_terms'], Helper::getRandom('PaymentTerm', 'num_days'));
        $I->selectOption(['name' => 'size_id'], Helper::getRandom('Size'));
        $I->selectOption(['name' => 'industry_id'], Helper::getRandom('Industry'));
        $I->fillField(['name' => 'private_notes'], 'Private Notes');

        //save
        $I->click('form button[type=submit]');

        //Verify that the client was added to the bd
        $I->seeInDatabase('clients', ['name' => $name,]);
    }

    public function indexClient(AcceptanceTester $I)
    {
        $I->wantTo('list of clients');

        $I->amOnPage('/clients');
        $I->seeCurrentUrlEquals('/clients');
    }

    public function showClient(AcceptanceTester $I)
    {
        $I->wantTo('show a client');

        $client = Helper::getRandom('Client', 'all');

        $id   = $client['public_id'];
        $name = $client['name'];

        $I->amOnPage('/clients/'.$id);
        $I->seeCurrentUrlEquals('/clients/'.$id);
        $I->see($name, 'h2');
    }

    public function editClient(AcceptanceTester $I)
    {
        $I->wantTo('edit a client');

        $id = Helper::getRandom('Client', 'public_id');
        $url = sprintf('/clients/%d/edit', $id);

        $I->amOnPage($url);
        $I->seeCurrentUrlEquals($url);

        //update fields
        $name = $this->faker->firstName;
        $size = Helper::getRandom('Size');

        $I->fillField(['name' => 'name'], $name);
        $I->selectOption(['name' => 'size_id'], $size);
        $I->click('form button[type=submit]');

        //check if data was updated
        $I->seeInDatabase('clients', ['public_id' => $id, 'name' => $name, 'size_id' => $size]);
    }
    
    public function deleteClient(AcceptanceTester $I)
    {
        $I->wantTo('delete a client');

        $I->amOnPage('/clients');
        $I->seeCurrentUrlEquals('/clients');

        $I->executeJS(sprintf('deleteEntity(%s)', $id = Helper::getRandom('Client', 'public_id')));
        $I->acceptPopup();

        //check if client was removed from database
        $I->wait(5);
        $I->seeInDatabase('clients', ['public_id' => $id, 'is_deleted' => true]);
    }
}

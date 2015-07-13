<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use Faker\Factory;

class QuoteCest
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

    public function indexQuote(AcceptanceTester $I)
    {
        $I->wantTo('List quotes');

        $I->amOnPage('/quotes');
        $I->seeCurrentUrlEquals('/quotes');

        $random_quote_number = Helper::getRandom('Invoice', 'invoice_number', ['is_quote' => 1, 'is_recurring' => false]);

        if ($random_quote_number) {
            $I->wait(2);
            $I->see($random_quote_number);
        }
    }

    public function createQuote(AcceptanceTester $I)
    {
        $I->wantTo('Create a new Invoice');

        $I->amOnPage('/quotes/create');

        $I->selectDataPicker($I, '#invoice_date');
        $I->selectDataPicker($I, '#due_date', '+ 15 day');

        if (!$this->selectRandomClient($I)) {
            //Create a new Client if not exist
            $this->createClient($I);
        }

        $I->fillField('#po_number', rand(100, 200));
        $I->fillField('#discount', rand(0, 20));

        $this->fillItems($I);

        $I->click('#saveButton');
    }

    public function editQuote(AcceptanceTester $I)
    {
        $I->wantTo('Edit a new invoice');

        $invoice = Helper::getRandom('Invoice', 'all', ['is_quote' => 1]);
        $I->amOnPage(sprintf('/quotes/%s/edit', $invoice['public_id']));

        //change po_number with random number
        $po_number = rand(100, 300);
        $I->fillField('po_number', $po_number);

        //save
        $I->click('Save Quote');
        if ($invoice['is_recurring']) $I->acceptPopup();
        $I->wait(5);

        //check if po_number was updated
        $I->seeInDatabase('invoices', ['public_id'=> $invoice['public_id'], 'po_number' => $po_number]);
    }

    public function deleteQuote(AcceptanceTester $I)
    {
        $I->wantTo('Delete an invoice');

        $I->amOnPage('/quotes');
        $I->seeCurrentUrlEquals('/quotes');

        //delete invoice
        $I->executeJS(sprintf('deleteEntity(%d)', $id = Helper::getRandom('Invoice', 'public_id', ['is_quote' => 1])));
        $I->acceptPopup();
        $I->wait(5);

        //check if invoice was removed
        $I->seeInDatabase('invoices', ['public_id' => $id, 'is_deleted' => true]);
    }

    private function createClient(AcceptanceTester $I)
    {
        $I->click('#createClientLink');

        $name       = $this->faker->name;
        $email      = $this->faker->email;
        $phone      = $this->faker->phoneNumber;
        $last_name  = $this->faker->lastName;
        $first_name = $this->faker->firstName;
        $currency   = Helper::getRandom('Currency');

        $I->fillField('#name',$name);
        $I->fillField('#first_name', $first_name);
        $I->fillField('#last_name', $last_name);
        $I->fillField('#email0', $email);
        $I->fillField('#phone', $phone);
        $I->selectOption('#currency_id', $currency);

        $I->click('#clientDoneButton');
    }

    private function selectRandomClient(AcceptanceTester $I)
    {
        if ($name = Helper::getRandom('Client', 'name')) {
            $I->click('.client_select .dropdown-toggle');
            $I->click(sprintf('ul.typeahead li[data-value="%s"]', $name));
        }

        return $name;
    }

    private function fillItems(AcceptanceTester $I, $max = 5)
    {
        for ($i = 1; $i <= $max; $i++) {
            $row_selector = sprintf('table.invoice-table tbody tr:nth-child(%d) ', $i);

            $product_key  = $this->faker->randomDigitNotNull;
            $description  = $this->faker->text($maxNbChars = 40);
            $unit_cost    = $this->faker->randomFloat(2, 0 ,100);
            $quantity     = $this->faker->randomDigitNotNull;

            $I->fillField($row_selector.'#product_key', $product_key);
            $I->fillField($row_selector.'textarea', $description);
            $I->fillField($row_selector.'td:nth-child(4) input', $unit_cost);
            $I->fillField($row_selector.'td:nth-child(5) input', $quantity);
        }
    }
}

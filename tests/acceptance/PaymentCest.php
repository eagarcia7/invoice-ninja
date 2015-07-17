<?php
use \AcceptanceTester;
use Faker\Factory;

class PaymentCest
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
    public function showPayments(AcceptanceTester $I)
    {
        $I->wantTo("See all Payments");

        $I->amOnPage('/payments');

        $I->seeCurrentUrlEquals('/payments');

        $invoices = \App\Models\Invoice::all()->toArray();
        $num_invoices = count($invoices);
        $I->seeElement('table#DataTables_Table_0 tbody tr:nth-child('.$num_invoices.')');
    }

    public function create(AcceptanceTester $I)
    {
        $I->wantTo("Enter a new Payment");

        $I->amOnPage('/payments/create');

        $opt_client = 9;
        $opt_invoice = 1;
        $amount = 5;
        $opt_payment_type = 7;
        $date = 'now + 1 day';
        $transaction_reference = $this->faker->text(12);

        $I->click('.client-select .combobox-container span.dropdown-toggle');
        $I->click('.client-select .combobox-container ul li:nth-child('.$opt_client.')');
        $id_client = $I->executeJS('return $("input[name=client]").val()');

        $I->click('.invoice-select .combobox-container span.dropdown-toggle');
        $I->click('.invoice-select .combobox-container ul li:nth-child('.$opt_invoice.')');

        $I->fillField(['name' => 'amount'], $amount);

        $I->click('div.panel-body div.form-group:nth-child(4) .combobox-container span.dropdown-toggle');
        $I->click('div.panel-body div.form-group:nth-child(4) .combobox-container ul li:nth-child('.$opt_payment_type.')');

        $I->selectDataPicker($I, '#payment_date', $date);

        $I->fillField(['name' => 'transaction_reference'], $transaction_reference);

        $I->click('button.btn-success');

        $I->seeCurrentUrlEquals('/clients/'.$id_client);
    }

    public function edit(AcceptanceTester $I)
    {
        $I->wantTo("Edit a Payment");

        $payment_id = 2;

        $I->amOnPage('/payments/'.$payment_id.'/edit');

        $opt_payment_type = 3;
        $date = 'now + 1 day';
        $transaction_reference = $this->faker->text(12);

        $I->click('div.panel-body div.form-group:first-child .combobox-container span.dropdown-toggle');
        $I->click('div.panel-body div.form-group:first-child .combobox-container span.dropdown-toggle');
        $I->click('div.panel-body div.form-group:first-child .combobox-container ul li:nth-child('.$opt_payment_type.')');

        $I->selectDataPicker($I, '#payment_date', $date);

        $I->fillField(['name' => 'transaction_reference'], $transaction_reference);

        $I->click('Save');
    }
}

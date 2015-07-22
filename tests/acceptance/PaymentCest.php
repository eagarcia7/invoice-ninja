<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use App\Models\Payment;
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

    public function showPayments(AcceptanceTester $I)
    {
        $I->wantTo("See all Payments");

        $I->amOnPage('/payments');

        $I->seeCurrentUrlEquals('/payments');
        $I->wait(3);

        //check number of payments
        $I->seeNumberOfElements('tbody tr[role=row]', Payment::all()->count());
    }

    public function create(AcceptanceTester $I)
    {
        $I->wantTo("Enter a new Payment");

        $I->amOnPage('/payments/create');

        $opt_client = 9;
        $opt_invoice = 1;
        $amount = rand(1,100);
        $opt_payment_type = 7;
        $date = 'now + 1 day';
        $transaction_reference = $this->faker->text(12);

        //select client
        $client = Helper::getRandom('Client', 'all');
        $I->selectDropdown($I,  $client['name'], '.client-select .dropdown-toggle');

        $I->click('.invoice-select .combobox-container span.dropdown-toggle');
        $I->click('.invoice-select .combobox-container ul li:nth-child('.$opt_invoice.')');

        $I->fillField(['name' => 'amount'], $amount);

        $I->click('div.panel-body div.form-group:nth-child(4) .combobox-container span.dropdown-toggle');
        $I->click('div.panel-body div.form-group:nth-child(4) .combobox-container ul li:nth-child('.$opt_payment_type.')');

        $I->selectDataPicker($I, '#payment_date', $date);

        $I->fillField(['name' => 'transaction_reference'], $transaction_reference);

        $I->click('button.btn-success');
        $I->wait(3);
        $I->seeInDatabase('payments', ['amount' => number_format($amount, 2)]);

        $I->seeCurrentUrlEquals('/clients/'.$client['public_id']);
    }

    public function edit(AcceptanceTester $I)
    {
        $I->wantTo("edit a Payment");

        if ($payment_id = Helper::getRandom('Payment', 'public_id')) {

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
            $I->wait(3);

            //check if was saved
            $I->seeInDatabase('payments', ['transaction_reference' => $transaction_reference]);
        }
    }

    public function delete(AcceptanceTester $I)
    {
        $I->wantTo('delete a payment');

        $I->amOnPage('/payments');
        $I->seeCurrentUrlEquals('/payments');
        $I->wait(3);

        if ($num_payments = Payment::all()->count()) {
            $row_rand = sprintf('tbody tr:nth-child(%d)', rand(1, $num_payments));
            //show button
            $I->executeJS(sprintf('$("%s div").css("visibility", "visible")', $row_rand));

            //dropdown
            $I->click($row_rand . ' button');

            //click to delete button
            $I->click($row_rand . ' ul li:nth-last-child(1) a');
            $I->acceptPopup();
        }
    }
}

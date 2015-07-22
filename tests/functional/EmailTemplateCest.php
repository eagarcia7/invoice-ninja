<?php
require 'fixtures.php';
use \FunctionalTester;
//use \fixtures;

class EmailTemplateCest
{
    public function _before(FunctionalTester $I)
    {
    	$I->checkIfLogin($I);
    }

    public function _after(FunctionalTester $I)
    {

    }

    // tests
    public function UpdateEmailTemplate(FunctionalTester $I)
    {   
		$I->amOnPage('/company/advanced_settings/email_templates');
		$I->seeCurrentUrlEquals('/company/advanced_settings/email_templates');
		$I->seeResponseCodeIs(200);

        //invoice email
        $message = '$client,<p/>
        To view your invoice for $amount, click the link below.<p/>
        <a href="$link">$link</a><p/>
        Thank You for using InvoiceNinja<p/>
        $footer';

        $I->see('Invoice Email');
        $I->fillField(['name' => 'email_template_invoice'],$message);

        //quote email
        $message = '$client,<p/>
        To view your quote for $amount, click the link below.<p/>
        <a href="$link">$link</a><p/>
        Thank You for using InvoiceNinja<p/>
        $footer';

        $I->see('Quote Email');
        $I->fillField(['name' => 'email_template_quote'],$message);

        //payment email
        $message = '$client,<p/>
            Thank you for your payment of $amount.<p/>
            Thank You for using InvoiceNinja<p/>
            $footer';

        $I->see('Quote Email');
        $I->fillField(['name' => 'email_template_payment'],$message);


        $I->click('Save');
        $I->seeInDatabase('accounts', ['email_template_payment' => $message]);
    }
}
<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check if it\'s going to redirect https://www.invoiceninja.com/contact');

$I->amOnPage('/contact');
$I->seeResponseCodeIs(200);
$I->amOnUrl('https://www.invoiceninja.com/contact');
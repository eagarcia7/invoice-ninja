<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check if it\'s going to redirect https://www.invoiceninja.com/how-it-works');

$I->amOnPage('/faq');
$I->seeResponseCodeIs(200);
$I->amOnUrl('https://www.invoiceninja.com/how-it-works');
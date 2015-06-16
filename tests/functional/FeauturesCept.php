<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check if it\'s going to redirect https://www.invoiceninja.com/features');

$I->amOnPage('/features');
$I->seeResponseCodeIs(200);
$I->amOnUrl('https://www.invoiceninja.com/features');
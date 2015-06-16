<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Check if it\'s going to redirect https://www.invoiceninja.com/');

$I->amOnPage('/rocksteady');
$I->seeResponseCodeIs(200);
$I->amOnUrl('https://www.invoiceninja.com/');
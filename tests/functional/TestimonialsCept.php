<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('check testimonial page');

$I->amOnPage('/testimonials');
//$I->seeCurrentUrlEquals('https://www.invoiceninja.com/');
$I->seeResponseCodeIs(200);
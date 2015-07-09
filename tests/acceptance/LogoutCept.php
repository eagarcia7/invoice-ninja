<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('to test export client');

$I->checkIfLogin($I);

$I->amonPage('/dashboard');

$I->click('#myAccountButton');

$I->executeJS('return $(".dropdown-menu").attr("style","display:block")');

$I->click('Log Out');
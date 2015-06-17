<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('login');
$I->checkIfLogin();

//$I->assertTrue(Auth::check());
$I->amOnPage('/dashboard');
$I->see('dashboard');
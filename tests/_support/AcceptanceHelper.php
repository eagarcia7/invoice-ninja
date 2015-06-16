<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module
{

	function checkIfLogin($login)
	{	
		$login->amOnPage('/login');
		$login->fillField(['name' => 'email'], 'webmaster@email.com');
		$login->fillField(['name' => 'password'], '2Werty4');
		$login->click('Let’s go');
	}

}

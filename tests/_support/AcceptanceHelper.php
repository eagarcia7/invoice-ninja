<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module
{

	function checkIfLogin(\AcceptanceTester $login)
	{
        if ($login->loadSessionSnapshot('login')) return;
		$login->amOnPage('/login');
		$login->fillField(['name' => 'email'], 'webmaster@email.com');
		$login->fillField(['name' => 'password'], '2Werty4');
		$login->click('Let’s go');
        $login->saveSessionSnapshot('login');
	}

    function selectDataPicker(\AcceptanceTester $I, $element, $date = 'now')
    {
        $_date = date('Y, m, d', strtotime($date));
        $I->executeJS(sprintf('$(\'%s\').datepicker(\'update\', new Date(%s))', $element, $_date));
    }

}

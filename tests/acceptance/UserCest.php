<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use Faker\Factory;

class UserCest
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    public function _before(AcceptanceTester $I)
    {
        $I->checkIfLogin($I);

        $this->faker = Factory::create();
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function indexUser(AcceptanceTester $I)
    {
        $I->wantTo('list users');

        $I->amOnPage('/company/advanced_settings/user_management');
        $I->wait(3);

        //get a random email
        $random_email = Helper::getRandom('User', 'email');
        if ($random_email) {
            $I->see($random_email);
        }
    }

    public function createUser(AcceptanceTester $I)
    {
        $I->wantTo('create a User');

        $I->amOnPage('/users/create');

        //information of user
        $first_name = $this->faker->firstName;
        $last_name  = $this->faker->lastName;
        $email      = $this->faker->email;

        $I->fillField('#first_name', $first_name);
        $I->fillField('#last_name', $last_name);
        $I->fillField('#email', $email);

        //create
        $I->click('Send invitation ');
        $I->wait(5);

        //check email
        $code = Helper::getRandom('user', 'confirmation_code', ['email' => $email]);
        $I->seeInLastEmail($code);

        //check if user was created
        $I->seeCurrentUrlEquals('/company/advanced_settings/user_management');
        $I->see($email);
        $I->seeInDatabase('users', [
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email,
        ]);
    }

    public function editUser(AcceptanceTester $I)
    {
        $I->wantTo('edit a User');

        if ($user_id = Helper::getRandom('User', 'public_id')) {

            $I->amOnPage(sprintf('/users/%d/edit', $user_id));

            //update information of user
            $first_name = $this->faker->firstName;
            $last_name  = $this->faker->lastName;
            $email      = $this->faker->email;

            $I->fillField('#first_name', $first_name);
            $I->fillField('#last_name', $last_name);
            $I->fillField('#email', $email);

            //save changes
            $I->click('Send invitation ');
            $I->wait(5);

            //check if user was created
            $I->seeCurrentUrlEquals('/company/advanced_settings/user_management');
            $I->see($email);
            $I->seeInDatabase('users', [
                'email'      => $email,
                'last_name'  => $last_name,
                'first_name' => $first_name,
            ]);
        }
    }

    public function sendConfirmation(AcceptanceTester $I) {
        $I->wantTo('send confirmation email');

        $user = Helper::getRandom('User', 'all');
        $id   = $user['public_id'];
        $code = $user['confirmation_code'];

        if ($id) {
            //send email
            $I->amOnPage(sprintf('/send_confirmation/%d', $id));
            $I->wait(5);

            //check email
            $I->seeInLastEmail($code);
        }
    }

    public function deleteUser(AcceptanceTester $I)
    {
        $I->wantTo('delete a User');
        $I->amOnPage('/company/advanced_settings/user_management');
        $I->wait(2);

        $user_id = Helper::getRandom('User', 'public_id');

        if ($user_id) {
            $I->executeJS(sprintf('deleteUser(%d)', $user_id));
            $I->acceptPopup();

            $I->wait(5);
        }
    }
}

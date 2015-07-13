<?php
require_once __DIR__ . '/../helpers/Helper.php';

use \AcceptanceTester;
use Faker\Factory;

class TaskCest
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


    public function indexTask(AcceptanceTester $I)
    {
        $I->wantTo('list Tasks');

        $I->amOnPage('/tasks');
        $I->seeCurrentUrlEquals('/tasks');

    }

    public function createTimerTask(AcceptanceTester $I)
    {
        $I->wantTo('create a Task (Timer)');

        $I->amOnPage('/tasks/create');
        $I->seeCurrentUrlEquals('/tasks/create');

        //select client
        $this->selectRandomClient($I);

        //description
        $description = $this->faker->text($maxNbChars = 200);
        $I->fillField('#description', $description);

        //start timer
        $I->click('#start-button');

        //save task
        $I->click('#save-button');
        $I->wait(rand(5, 15));

        //stop timer
        $I->click('#stop-button');

        //check if task was saved
        $I->seeInDatabase('tasks', ['description' => $description]);
    }

    public function createManualTask(AcceptanceTester $I)
    {
        $I->wantTo('create a Task (Manual)');

        $I->amOnPage('/tasks/create');
        $I->seeCurrentUrlEquals('/tasks/create');

        //select client
        $this->selectRandomClient($I);

        //description
        $description = $this->faker->text($maxNbChars = 200);
        $I->fillField('#description', $description);

        //select Manual option
        $I->selectOption('#task_type3', 'manual');

        //date
        $date = date('M d, Y', strtotime(sprintf('+ %d day', rand(1, 30))));
        $I->fillField('#date', $date);

        //time
        $start_hours   = rand(1, 12);
        $start_minutes = rand(0, 59);
        $start_seconds = rand(0, 59);

        $I->fillField('#start_hours', $start_hours);
        $I->fillField('#start_minutes', $start_minutes);
        $I->fillField('#start_seconds', $start_seconds);

        //duration
        $duration_hours   = rand(1, 999);
        $duration_minutes = rand(0, 59);
        $duration_seconds = rand(0, 59);

        $I->fillField('#duration_hours', $duration_hours);
        $I->fillField('#duration_minutes', $duration_minutes);
        $I->fillField('#duration_seconds', $duration_seconds);

        //save task
        $I->click('#save-button');

        //check if task was saved
        $I->wait(2);
        $I->seeInDatabase('tasks', ['description' => $description]);
    }

    public function editTask(AcceptanceTester $I)
    {
        $I->wantTo('edit a Task');

        $task =  Helper::getRandom('Task', 'all');
        $url  = sprintf('/tasks/%d/edit', $task['public_id']);

        $I->amOnPage($url);
        $I->seeCurrentUrlEquals($url);

        //edit description
        $description = $this->faker->text($maxNbChars = 200);
        $I->fillField('#description', $description);

        //save task
        $I->click('#save-button');

        //check if task was saved
        $I->wait(2);
        $I->seeInDatabase('tasks', ['public_id' => $task['public_id'], 'description' => $description]);
    }

    public function deleteTask(AcceptanceTester $I)
    {
        $I->wantTo('delete a Task');
        $I->amOnPage('/tasks');

        $task_id = Helper::getRandom('Task', 'public_id');

        //delete task
        $I->executeJS(sprintf('deleteEntity(%d)', $task_id));
        $I->acceptPopup();

        //check if Task was delete
        $I->wait(2);
        $I->seeInDatabase('tasks', ['public_id' => $task_id, 'is_deleted' => true]);
    }

    private function selectRandomClient(AcceptanceTester $I)
    {
        $I->click('.client-select .dropdown-toggle');
        $I->click(sprintf('ul.typeahead li[data-value="%s"]', Helper::getRandom('Client', 'name')));
    }
}

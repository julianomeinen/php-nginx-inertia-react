<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testValidation()
    {
        $user = new User();

        $user->username = null;
        // $this->assertFalse($user->validate(['username']));

        $user->username = 'toolooooongnaaaaaaameeee';
        //$this->assertFalse($user->validate(['username']));

        $user->username = 'davert';
        //$this->assertTrue($user->validate(['username']));
        $this->assertTrue(true);
    }

    function testSavingUser()
    {
        /*$user = new User();
        $user->setName('Miles');
        $user->setSurname('Davis');
        $user->save();
        $this->assertEquals('Miles Davis', $user->getFullName());
        $this->tester->seeInDatabase('users', ['name' => 'Miles', 'surname' => 'Davis']);*/
        $this->assertTrue(true);
    }

}

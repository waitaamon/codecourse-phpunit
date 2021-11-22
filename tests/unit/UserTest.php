<?php
namespace Tests\unit;

class UserTest extends \PHPUnit\Framework\TestCase
{

    protected $user;

    public function setUp(): void
    {
        $this->user = new \App\Models\User;
    }

    public function test_that_we_can_get_the_first_name()
    {

        $this->user->setFirstName('jack');

        $this->assertEquals('jack', $this->user->getFirstName());
    }

    public function test_that_we_can_get_the_last_name()
    {

        $this->user->setLastName('thuo');

        $this->assertEquals('thuo', $this->user->getlastName());
    }

    public function test_full_name_is_returned()
    {
        $user = new \App\Models\User;

        $user->setFirstName('jack');

        $user->setLastName('thuo');

        $this->assertEquals('jack thuo', $user->getFullName());
    }

    public function test_first_and_last_name_are_trimmed()
    {
        $user = new \App\Models\User;

        $user->setFirstName('  jack ');

        $user->setLastName('   thuo ');

        $this->assertEquals('jack', $user->getFirstName());

        $this->assertEquals('thuo', $user->getLastName());
    }

    public function test_email_address_can_be_set()
    {
        $user = new \App\Models\User;

        $user->setEmail('jack@email.com');

        $this->assertEquals('jack@email.com', $user->getEmail());
    }

    public function test_email_variables_contains_correct_values()
    {
        $user = new \App\Models\User;

        $user->setFirstName('jack');

        $user->setLastName('thuo');

        $user->setEmail('jack@email.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('jack thuo', $emailVariables['full_name']);
        $this->assertEquals('jack@email.com', $emailVariables['email']);
    }

}
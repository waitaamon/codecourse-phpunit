<?php

namespace App\Models;

class User
{
    public $first_name;

    public $last_name;

    public $email;

    public function setFirstName($firstname)
    {
        $this->first_name = trim($firstname);
    }

    public function setLastname($lastName)
    {
        $this->last_name = trim($lastName);
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }

}
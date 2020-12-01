<?php

class Intern
{
    private $userId;
    private $firstName;
    private $lastName;

    public function __construct()
    {
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstame($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

}

<?php

class Borrowings implements JsonSerializable
{
    private $bookId;
    private $userId;
    private $borrowed;
    private $returningDate;
    private $returned;

    public function __construct()
    {
    }

    public function jsonSerialize() {
        return array(
            'book' => $this->bookId,
            'user' => $this->userId,
            'borrowed' => $this->borrowed,
            'returningDate' => $this->returningDate,
            'returned' => $this->returned,
       );
    } 

    public function getBookId()
    {
        return $this->userId;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getBorrowed(){
        return $this->borrowed;
    }

    public function setBorrowed($borrowed){
        $this->borrowed = $borrowed;
    }

    public function getReturningDate(){
        return $this->returningDate;
    }

    public function setReturningDate($returningDate){
        $this->returningDate = $returningDate;
    }

    public function getReturned(){
        return $this->returned;
    }

    public function setReturned($returned){
        $this->returned = $returned;
    }

}

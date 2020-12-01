<?php

class Intern
{
    private $bookId;
    private $title;
    private $author;
    private $year;

    public function __construct()
    {
    }

    public function getBookId()
    {
        return $this->userId;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getYear(){
        return $this->year;
    }

    public function setYear($year){
        $this->year = $year;
    }

}

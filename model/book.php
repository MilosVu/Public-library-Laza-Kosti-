<?php

class Book implements JsonSerializable
{
    private $bookId;
    private $title;
    private $author;
    private $year;

    public function __construct()
    {
    }

    public function jsonSerialize() {
        return array(
            'title' => $this->title,
            'author' => $this->author,
            'year' => $this->year,
       );
    }
    

    public function getBookId()
    {
        return $this->bookId;
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

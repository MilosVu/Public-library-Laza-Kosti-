<?php

require_once('../databaseBroker.php');
require_once('../model/book.php');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
    OR die('Could not connect to MySQL' . 
    mysql_conncet_error());

function getAllBooks()
{
    $bookList = array();
    $query = "SELECT * FROM book";

    $response = @mysqli_query($GLOBALS['dbc'],$query);

    if($response){
    
        while($row = mysqli_fetch_array($response)){
            $book = new Book();
            $book->setBookId($row['BookId']);
            $book->setTitle($row['Title']);
            $book->setAuthor($row['Author']);
            $book->setYear($row['Year']);
            $bookList[] = $book;
        }
        return $bookList;
    }else{
        echo "Couldn't issue database query";
    
        echo mysqli_error($dbc);
    }
    
    mysqli_close($dbc);

}



// Add
if (isset($_POST['add']) && !empty($_POST['add'])) {
    $title = trim($_POST['add']);
    $author = trim($_POST['author']);
    $year = trim($_POST['year']);

    $sql = "INSERT INTO book (Title, Author, Year) VALUES ('$title','$author', '$year')";
    if(mysqli_query($dbc,$sql)){
        echo "Book added.";
    }else{
        echo "Failed!";
    }
    mysqli_close($dbc);
}


// Delete
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $sql = "DELETE FROM book WHERE BookId=$id";
    if(mysqli_query($dbc,$sql)){
        echo "Book deleted.";
    }else{
        echo "Failed!";
    }
    mysqli_close($dbc);
}


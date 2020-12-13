<?php

include('../../database_connection.php');
include('../../model/book.php');

if(isset($_POST["id"]))
{
 $id = $_POST["id"];
 $query = "SELECT Title, Author, Year FROM book WHERE BookId = $id";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $book = new Book();
 $book->setTitle($row['Title']);
 $book->setAuthor($row['Author']);
 $book->setYear($row['Year']);

 echo json_encode($book);
}

?>

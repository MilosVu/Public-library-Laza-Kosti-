<?php


include('../../database_connection.php');
include('../../model/borrowings.php');

if(isset($_POST["idbook"]))
{
 $idBook = $_POST["idbook"];
 $idUser = $_POST["iduser"];

 $query = "SELECT borrowings.BookId as BookId, borrowings.UserId as UserId, book.title as Book, 
 users.Firstname as User, Borrowed, ReturningDate, 
 CASE borrowings.Returned WHEN 1 THEN "."'Yes' "." ELSE "."'No' "."END as 'Returned' 
 FROM borrowings JOIN book ON book.BookId = borrowings.BookId JOIN users ON users.UserId = borrowings.userId 
 WHERE borrowings.BookId = '$idBook' and borrowings.UserId ='$idUser'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $borrowing = new Borrowings();
 $borrowing->setBookId($row['Book']);
 $borrowing->setUserId($row['User']);
 $borrowing->setBorrowed($row['Borrowed']);
 $borrowing->setReturningDate($row['ReturningDate']);
 $borrowing->setReturned($row['Returned']);
 
 echo json_encode($borrowing);
}

?>

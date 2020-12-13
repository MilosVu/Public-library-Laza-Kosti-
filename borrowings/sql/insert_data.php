<?php


include('../../database_connection.php');

if(isset($_POST["bookId"]))
{
 $error = '';
 $success = '';
 $bookId = '';
 $userId = '';
 $borrowed = '';
 $returningDate = '';
 $returned = '';

 if(empty($_POST["bookId"]))
 {
  $error .= '<p>Book ID is Required</p>';
 }
 else
 {
  $bookId = $_POST["bookId"];
 }


 if(empty($_POST["userId"]))
 {
  $error .= '<p>User ID is Required</p>';
 }
 else
 {
  $userId = $_POST["userId"];
 }


 if(empty($_POST["borrowed"]))
 {
  $error .= '<p>Borrowed Date is Required</p>';
 }
 else
 {
  $borrowed = $_POST["borrowed"];
 }

 if(empty($_POST["returningDate"]))
 {
  $error .= '<p>Returning Date is Required</p>';
 }
 else
 {
  $returningDate = $_POST["returningDate"];
 }
 if(empty($_POST["returned"]))
 {
  $error .= '<p>Returned is Required</p>';
 }
 else
 {
     if($_POST["returned"] == 'yes'){
         $returned = 1;
     }
     else{
        $returned = 0;
     }
 }


 if($error == '')
 {
  $data = array(
   ':bookId'   => $bookId,
   ':userId'  => $userId,
   ':borrowed' => $borrowed,
   ':returningDate' => $returningDate,
   ':returned' => $returned
  );

  $query = "
  INSERT INTO borrowings
  VALUES (:bookId, :userId, :borrowed, :returningDate, :returned)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Borrowing Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>
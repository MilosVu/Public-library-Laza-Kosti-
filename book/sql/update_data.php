<?php

//update_data.php

include('database_connection.php');

if(isset($_POST["title"]))
{
 $error = '';
 $success = '';
 $title = '';
 $author = '';
 $year = '';
 $id = $_POST["id"];
 if(empty($_POST["title"]))
 {
  $error .= '<p>Title is Required</p>';
 }
 else
 {
  $title = $_POST["title"];
 }
 if(empty($_POST["author"]))
 {
  $error .= '<p>Author is Required</p>';
 }
 else
 {
  $author = $_POST["author"];
 }
 if(empty($_POST["year"]))
 {
  $error .= '<p>Year is Required</p>';
 }
 else
 {
  $year = $_POST["year"];
 }

 if($error == '')
 {
  $data = array(
   ':title'   => $title,
   ':author'  => $author,
   ':year'   => $year,
   ':id'   => $_POST["id"]
  );

  $query = "
  UPDATE book 
  SET Title = :title,
  Author = :author,
  Year = :year
  WHERE BookId = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Book Data Updated';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>

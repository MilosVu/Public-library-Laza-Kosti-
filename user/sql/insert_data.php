<?php

//insert_data.php

include('../../database_connection.php');

if(isset($_POST["firstName"]))
{
 $error = '';
 $success = '';
 $firstName = '';
 $lastName = '';


 if(empty($_POST["firstName"]))
 {
  $error .= '<p>FirstName is Required</p>';
 }
 else
 {
  $firstName = $_POST["firstName"];
 }


 if(empty($_POST["lastName"]))
 {
  $error .= '<p>LastName is Required</p>';
 }
 else
 {
  $lastName = $_POST["lastName"];
 }



 if($error == '')
 {
  $data = array(
   ':firstName'   => $firstName,
   ':lastName'  => $lastName,
  );

  $query = "
  INSERT INTO users 
  (firstName, lastName) 
  VALUES (:firstName, :lastName)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'User Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>
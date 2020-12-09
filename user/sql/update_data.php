<?php

//update_data.php

include('../../database_connection.php');

if(isset($_POST["firstName"]))
{
 $error = '';
 $success = '';
 $firstName = '';
 $lastName = '';
 $year = '';
 $id = $_POST["id"];
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
   ':id'   => $_POST["id"]
  );

  $query = "
  UPDATE users 
  SET FirstName = :firstName,
  LastName = :lastName
  WHERE UserId = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'User Data Updated';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>

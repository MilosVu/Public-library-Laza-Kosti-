<?php

//fetch_single_data.php

include('../../database_connection.php');
include('../../model/user.php');

if(isset($_POST["id"]))
{
 $id = $_POST["id"];
 $query = "SELECT FirstName, LastName FROM users WHERE UserId = $id";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $user = new User();
 $user->setFirstName($row['FirstName']);
 $user->setLastName($row['LastName']);

 echo json_encode($user);
}

?>

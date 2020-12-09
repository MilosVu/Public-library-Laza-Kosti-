<?php

//fetch_single_data.php

include('../../database_connection.php');

if(isset($_POST["id"]))
{
 $id = $_POST["id"];
 $query = "SELECT FirstName, LastName FROM users WHERE UserId = $id";

 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>

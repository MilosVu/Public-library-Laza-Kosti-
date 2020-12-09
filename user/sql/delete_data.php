<?php

//delete_data.php

include('../../database_connection.php');

if(isset($_POST["id"]))
{
 $query = "
 DELETE FROM users 
 WHERE UserId = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>
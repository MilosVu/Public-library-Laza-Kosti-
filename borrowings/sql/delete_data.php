<?php

include('../../database_connection.php');

if(isset($_POST["idbook"]))
{
    $idBook = $_POST["idbook"];
    $idUser = $_POST["iduser"];
    $query = "
    DELETE FROM borrowings 
    WHERE BookId = $idBook and UserId = $idUser";
    $statement = $connect->prepare($query);
    $statement->execute();
}
 
?>
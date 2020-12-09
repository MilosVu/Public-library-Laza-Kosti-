<?php

require_once('../databaseBroker.php');
require_once('../model/user.php');

// GetAllUsers
function getAllUsers()
{
    $userList = array();
    $query = "SELECT * FROM users";

    $response = @mysqli_query($GLOBALS['dbc'],$query);

    if($response){
    
        while($row = mysqli_fetch_array($response)){
            $user = new User();
            $user->setUserId($row['UserId']);
            $user->setFirstName($row['FirstName']);
            $user->setLastName($row['LastName']);
            $userList[] = $user;
        }
        return $userList;
    }else{
        echo "Couldn't issue database query";
    
        echo mysqli_error($dbc);
    }

    mysqli_close($dbc);
}

// Add
if (isset($_POST['add']) && !empty($_POST['add'])) {
    $firstName = trim($_POST['add']);
    $lastName = trim($_POST['lastName']);

    $sql = "INSERT INTO users (FirstName, LastName) VALUES ('$firstName','$lastName')";
    if(mysqli_query($dbc,$sql)){
        echo "User added.";
    }else{
        echo "Failed!";
    }
    mysqli_close($dbc);
}


// Delete
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $sql = "DELETE FROM users WHERE Userid=$id";
    if(mysqli_query($dbc,$sql)){
        echo "User deleted.";
    }else{
        echo "Failed!";
    }
    mysqli_close($dbc);
}


// On Edit click return data about that filed
if (isset($_POST['edit'])) {
    $id = $_POST['edit'];


    /*
    $sql = "DELETE FROM users WHERE Userid=$id";
    if(mysqli_query($dbc,$sql)){
        echo "User deleted.";
    }else{
        echo "Failed!";
    }*/

    $query = "SELECT * FROM users where UserId=$id";

    $response = @mysqli_query($GLOBALS['dbc'],$query);
    
    if($response){

    $row = mysqli_fetch_array($response);
    $data = array(
        'id' => $row['id'],
        'name' => $row['name'],
        );
    }else{
        //echo "Failed!";
    }
    

    mysqli_close($dbc);
    echo json_encode($row);

}

// Update
if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $name = trim($_POST['name']);
    $sql = "UPDATE users SET name = '$name' WHERE id = '$id'";
    $db->query($sql) or die($db->error());
}

?>
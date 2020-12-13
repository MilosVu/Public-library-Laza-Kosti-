<?php

include('../../database_connection.php');
$query = '';
$output = array();
$query .= "SELECT borrowings.BookId as BookId, borrowings.UserId as UserId, book.title as Book, users.Firstname as User, Borrowed, ReturningDate, Returned 
FROM borrowings JOIN book ON book.BookId = borrowings.BookId JOIN users ON users.UserId = borrowings.userId ";


if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}

if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["Book"];
 $sub_array[] = $row["User"];
 $sub_array[] = $row["Borrowed"];
 $sub_array[] = $row["ReturningDate"];
 if($row["Returned"] == "1"){
    $sub_array[] = "Yes";
 }else{
    $sub_array[] = "No";
 }
 $sub_array[] = '<button type="button" name="view" idBook="'.$row["BookId"].'" idUser="'.$row["UserId"].'" class="btn btn-primary btn-xs view">View</button>';
 $sub_array[] = '<button type="button" name="delete" idBook="'.$row["BookId"].'" idUser="'.$row["UserId"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT book.Title as Book, users.Firstname as User, Borrowed, ReturningDate, Returned 
 FROM borrowings JOIN book ON book.BookId = borrowings.BookId JOIN users ON users.UserId = borrowings.userId ");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($connect),
 "data"    => $data
);
echo json_encode($output);
?>

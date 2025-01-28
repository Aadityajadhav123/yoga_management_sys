<?php 
// echo "hello";

include('includes/dbconnection.php');

$id = $_GET['id'];

$sql = "SELECT * from tbltrainer where Tname = '$id' ";
// print_r($sql);
// exit;
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
// print_r($results);

echo json_encode($results);
// return $results; 
?>
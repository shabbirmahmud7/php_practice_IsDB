<?php 

include_once("dbconfig.php");
$id = $_GET['id'];

$conn->query("DELETE FROM students WHERE id='$id'");

if($conn->affected_rows){
    header("location: index.php");
}
?>
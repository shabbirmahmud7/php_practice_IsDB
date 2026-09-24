<?php
$host = "localhost";
$user = "root";
$pass= "";
$db="pwad_73";

$conn = new mysqli($host,$user,$pass,$db);
if(!$conn){
    die("database connection failed". mysqli_connect_error());
}

else{
    echo "ok";
}
?>
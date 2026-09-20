<?php 
    // connection with mysql

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pwad73";
 
    // $conn = mysqli_connect($host, $user, $pass , $db);
    $conn = new mysqli($host, $user, $pass, $db);
    if(!$conn){
        die("Database connecttion failed;" . mysqli_connect_error());
    }
    //  else {
    //     echo "ok";
    // }

?>
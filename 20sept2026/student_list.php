<?php include_once('dbconifg.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
   $data =  $conn->query("SELECT * FROM students");
//    $row = $data->fetch_object(); 

//    var_dump($data);
//    var_dump($row);

while($row = $data->fetch_Object()){
    echo $row->name . "<br>" ;
}

    ?>
</body>
</html>
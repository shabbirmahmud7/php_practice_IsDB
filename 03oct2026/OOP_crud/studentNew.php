<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>student Entry Form</h3>
    <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        // Data recivce from entry form

            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['phone'];
            include_once("dbconfig.php");
   
            $conn->query("INSERT INTO students (id,name,email,phone)
            VALUES (NULL,'$name','$email','$number')");
            if($conn->affected_rows){
                echo"success";
            }


            }
    
    ?>

    <form action="" method="post">
        <label for="name">Name</label><br>
    <input type="text" name="name"  placeholder="enter name"><br><br>
     <label for="Email">Email</label><br>
    <input type="text" name="email"  placeholder="enter email"><br><br>
     <label for="phone">phone</label><br>
    <input type="text" name="phone" placeholder="enter number" ><br><br>
    <input type="submit" name="submit" value="SAVE">

    </form>

     <a href="index.php">Back to Student List</a><br><br>

</body>
</html>
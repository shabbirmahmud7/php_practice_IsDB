<?php include_once("dbconfig.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Student Update Form</h3>
    <?php 
    // Display Student Record
     $id=$_GET['id'];

  

   
   
//    update Student Record
   if($_SERVER['REQUEST_METHOD']=='POST'){
        // Data recivce from entry form

            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['phone'];
            
   
            $conn->query("UPDATE students SET name = '$name', email = '$email' , phone = '$number'
                WHERE id = '$id' ");
    
            if($conn->affected_rows){
                echo"<div class = 'message'>update Successful</div> ";
            }


            }

        $data= $conn->query("SELECT * FROM students WHERE id = '$id' ");
        $row = $data->fetch_object();


    ?>

    <form action="" method="post">
        <label for="name">Name</label><br>
    <input type="text" name="name"  placeholder="enter name" value="<?php echo $row->name; ?>"><br><br>
     <label for="Email">Email</label><br>
    <input type="text" name="email"  placeholder="enter email" value="<?php echo $row->email; ?>"><br><br>
     <label for="phone">phone</label><br>
    <input type="text" name="phone" placeholder="enter number" value="<?php echo $row->phone; ?>"><br><br>
    <input type="submit" name="submit" value="Update">

    </form>

     <a href="index.php">Back to Student List</a><br><br>

</body>
</html>
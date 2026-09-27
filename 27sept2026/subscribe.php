<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Subscription Form</h2>
    <?php
    
    // print_r($_POST);
    // print_r($_POST);
    // print_r($_REQUEST);

   if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    echo("you have submitted : <br> ");
    echo("name: ". $name . "<br>");
    echo("email: " . $email."<br>");
   }
    
    ?>
    <form action="" method="Post">
        <!-- <form action="" method="get"> -->
    <label for="name">Name</label><br>
    <input type="text" name="name" placeholder="Enter Your name" ><br>
      <label for="email">Email</label><br>
    <input type="text" name="email" placeholder="Enter your email"><br>
    <input type="submit" name="submit" value="subscribe">
    </form>
</body>
</html>
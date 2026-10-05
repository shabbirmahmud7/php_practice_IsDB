<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
        }

        .login-card h3 {
            text-align: center;
            margin-bottom: 24px;
            color: #333333;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="password"]:focus {
            border-color: #007bff;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h3>Login Form</h3>

        <?php 
        if(isset($_POST['submit'])){
            extract($_POST);
            $password = md5($password);
            include_once("dbconfig.php");

            $result = $conn->query(" SELECT * FROM users WHERE email = '$email' AND password = '$password' ");
            
            if($result->num_rows > 0){
                session_start();
                $_SESSION['email'] = $email;
                header("location: dashboard.php");
                exit();
            } else {
                echo "<div class='alert-error'>Login Failed! Invalid email or password.</div>";
            }
        }
        ?>

        <form action="" method="post">
            <div class="input-group">
                <input type="text" name="email" placeholder="Enter email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <input type="submit" name="submit" value="LOGIN" class="btn-submit">
        </form>
    </div>

</body>
</html>
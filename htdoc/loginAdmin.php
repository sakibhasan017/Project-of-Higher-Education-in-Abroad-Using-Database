<?php

include('connection.php');

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);
    
    if($result) {
        $count = mysqli_num_rows($result);
       
        if ($count == 1) {
            header("Location: homeAdmin.php");
            exit;
        } else {
            $invalid_message = "Invalid username or password";
        }
    } else {
        $invalid_message = "Error executing SQL query";
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-msg {
            text-align: center;
            margin-top: 20px;
            color: red;
        }

        .login-msg a {
            color: #4CAF50;
            text-decoration: none;
        }

        
        .back-button {
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 14px;
            text-decoration: none;
            color: #333;
            background-color: #f2f2f2;
            padding: 8px 12px;
            border-radius: 4px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .forgot-password {
            text-align: left;
            margin-bottom: 10px; 
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Login</h2>
        <a href="#" class="back-button" onclick="goBack()">Back</a>
        <?php if(isset($invalid_message)) { ?>
            <div class="login-msg"><?php echo $invalid_message; ?></div>
        <?php } ?>
        
        <form  method="POST">

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Login">

            <div class="forgot-password">
                <a href="forgetPassAdmin.php">Forgot password?</a><br>
            </div>

        </form>
    </div>
    <script>
        
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

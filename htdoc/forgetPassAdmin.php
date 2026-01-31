<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $security_answer = $_POST["security_answer"];
    $new_password = $_POST["new_password"];

    
    $sql = "SELECT * FROM admin WHERE Email='$email' AND Answer='$security_answer'";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        
        $update_query = "UPDATE admin SET Password='$new_password' WHERE Email='$email'";
        $update_result = mysqli_query($con, $update_query);

        echo "Error updating password: " . mysqli_error($con);
        header("Location: loginAdmin.php");
    }else {
        $invalid_message = "Invalid username or Answer";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Forget Password</h2>
        <a href="#" class="back-button" onclick="goBack()">Back</a>
        <?php if(isset($invalid_message)) { ?>
            <div class="login-msg"><?php echo $invalid_message; ?></div>
        <?php } ?>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="security_answer">Security Answer(What's Your Favourite Pet):</label>
                <input type="text" id="security_answer" name="security_answer" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Reset Password" class="btn">
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
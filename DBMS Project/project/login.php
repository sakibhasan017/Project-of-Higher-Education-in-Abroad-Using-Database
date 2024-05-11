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

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: block;
            margin: 20px auto 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    <h2>Login</h2>
    <a href="#" class="back-button" onclick="goBack()">Back</a>

    <form action="" method="POST">
        <label>Login as:</label><br>
        <input type="radio" id="admin" name="user-type" value="admin">
        <label for="admin">Admin</label>
        <input type="radio" id="student" name="user-type" value="student">
        <label for="student">Student</label>
        <input type="radio" id="parent" name="user-type" value="parent">
        <label for="parent">Parent</label><br>

        <input type="submit" name="next" value="Next">
    </form>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["next"])) {
        $user_type = $_POST["user-type"];
        if ($user_type === "admin") {
            header("Location: loginAdmin.php");
            exit;
        } elseif ($user_type === "student") {
            header("Location: loginUser.php");
            exit;
        } elseif ($user_type === "parent") {
            header("Location: loginParent.php");
            exit;
        }
    }
}
?>

</body>
</html>

<?php
include('connection.php');
$Stu_ID="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_email = $_POST["student_email"];
    $parent_email = $_POST["parent_email"];
    $password = $_POST["password"];
    $security_question = $_POST["security_question"];

    $findSQL="SELECT Stu_ID FROM STUDENT WHERE Email='$student_email'";
    $result=mysqli_query($con, $findSQL);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Stu_ID=$row['Stu_ID'];
    
    $sql = "INSERT INTO Parents (Student_ID, Parent_Email, Parent_Password, Answer) VALUES ('$Stu_ID', '$parent_email', '$password', '$security_question')";
    
    if ($con && $con->query($sql) === TRUE) {
      
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}else{
    $invalid_message = "Student Email doesn't Exist";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Parent</title>
   <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-button {
            background-color: #f2f2f2;
            color: #333;
            padding: 8px 12px;
            border-radius: 4px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            cursor: pointer;
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
    </style>
</head>
<body>
<div class="container">
<a href="#" class="back-button" onclick="goBack()">Back</a>
<?php if(isset($invalid_message)) { ?>
            <div class="login-msg"><?php echo $invalid_message; ?></div>
        <?php } ?>
    <h2>Register as Parent</h2>
    <form method="POST">
        <label for="student_email">Corresponding Student Email:</label>
        <input type="email" id="student_email" name="student_email" required><br><br>

        <label for="parent_email">Parent Email:</label>
        <input type="email" id="parent_email" name="parent_email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="security_question">Security Question (What is your favourite color?):</label>
        <input type="text" id="security_question" name="security_question" required><br><br>

        <input type="submit" value="Register">
    </form>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

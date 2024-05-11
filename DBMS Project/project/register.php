<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $institute_name = $_POST["institute_name"];
    $program_name = $_POST["program_name"];
    $dept_name = $_POST["dept_name"];
    $ielts_score = $_POST["ielts_score"];
    $toefl_score = $_POST["toefl_score"];
    $sat_score = $_POST["sat_score"];
    $act_score = $_POST["act_score"];
    $total_cgpa = $_POST["total_cgpa"];
    $passing_year = $_POST["passing_year"];
    $question_ans = $_POST["security_question"];

    $sql = "INSERT INTO Student (Email, Password, Answer) VALUES ('$email', '$password', '$question_ans')";
    if ($con && $con->query($sql) === TRUE) {
        $stu_id = $con->insert_id;

        $sql = "INSERT INTO Profile (Stu_Id, Name, Phone_Number,Email, Address) VALUES ('$stu_id', '$name', '$phone_number','$email' ,'$address')";
        $con->query($sql);

        $sql = "INSERT INTO Education_Info (Stu_ID, Institute_Name, Program_Name, Dept_Name, IELTS_Score, TOEFL_Score, SAT_Score, ACT_Score, Total_CGPA, Passing_Year) 
            VALUES ('$stu_id', '$institute_name', '$program_name', '$dept_name', '$ielts_score', '$toefl_score', '$sat_score', '$act_score', '$total_cgpa', '$passing_year')";
        $con->query($sql);

        echo "Registration successful!";
        header("Location: index.php");
            exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    </style>
</head>
<body>
<div class="container">
<a href="#" class="back-button" onclick="goBack()">Back</a>
        <h2>Registration Form</h2>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="institute_name">Institute Name:</label>
            <input type="text" id="institute_name" name="institute_name" required>

            <label for="program_name">Program Name:</label>
            <input type="text" id="program_name" name="program_name" required>

            <label for="dept_name">Department Name:</label>
            <input type="text" id="dept_name" name="dept_name" required>

            <label for="ielts_score">IELTS Score:</label>
            <input type="text" id="ielts_score" name="ielts_score" required>

            <label for="toefl_score">TOEFL Score:</label>
            <input type="text" id="toefl_score" name="toefl_score">

            <label for="sat_score">SAT Score:</label>
            <input type="text" id="sat_score" name="sat_score">

            <label for="act_score">ACT Score:</label>
            <input type="text" id="act_score" name="act_score">

            <label for="total_cgpa">Total CGPA:</label>
            <input type="text" id="total_cgpa" name="total_cgpa" required>

            <label for="passing_year">Passing Year:</label>
            <input type="text" id="passing_year" name="passing_year" required>

            <label for="security_question">Security Question (What is your nickname?):</label>
            <input type="text" id="security_question" name="security_question" required>

            <input type="submit" value="Register">
        </form>
        <p>Register as a Parent: <a href="registerParents.php">Click Here</a></p>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

<?php
include('connection.php');

if(isset($_POST['submit'])) {
   
    $ins_name = $_POST['ins_name'];
    $app_last_date = $_POST['app_last_date'];
    $location = $_POST['location'];
    $country = $_POST['country'];

    $ins_sql = "INSERT INTO Educational_Institute (Ins_Name, App_Last_Date, Location, Country) VALUES ('$ins_name', '$app_last_date', '$location', '$country')";

    if(mysqli_query($con, $ins_sql)) {
        $ins_id = mysqli_insert_id($con); 
        
        
        $toefl_score = $ielts_score = $sat_score = $act_score = $application_fee = "NULL";

        
        if(isset($_POST['toefl_score']) && $_POST['toefl_score'] != "") {
            $toefl_score = $_POST['toefl_score'];
        }
        if(isset($_POST['ielts_score']) && $_POST['ielts_score'] != "") {
            $ielts_score = $_POST['ielts_score'];
        }
        if(isset($_POST['sat_score']) && $_POST['sat_score'] != "") {
            $sat_score = $_POST['sat_score'];
        }
        if(isset($_POST['act_score']) && $_POST['act_score'] != "") {
            $act_score = $_POST['act_score'];
        }
        if(isset($_POST['application_fee']) && $_POST['application_fee'] != "") {
            $application_fee = $_POST['application_fee'];
        }

        $req_sql = "INSERT INTO Requirement (Ins_ID, TOEFL_Score, IELTS_Score, SAT_Score, ACT_Score, Application_Fee) VALUES ($ins_id, $toefl_score, $ielts_score, $sat_score, $act_score, $application_fee)";

        if(mysqli_query($con, $req_sql)) {
            
            echo "<script>window.location.href = 'uniDetailsAdmin.php?name=" . urlencode($ins_name) . "';</script>";

            exit();
        } else {
            echo "Error: " . $req_sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Error: " . $ins_sql . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .error {
            color: red;
            margin-bottom: 10px;
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
    <h2><center>Insert Information</center></h2>
    <a href="#" class="back-button" onclick="goBack()">Back</a>
    <form method="POST">
        <label for="ins_name">Institute Name:</label>
        <input type="text" id="ins_name" name="ins_name" required><br><br>
        
        <label for="app_last_date">Application Last Date:</label>
        <input type="date" id="app_last_date" name="app_last_date" required><br><br>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br><br>
        
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br><br>

        <label for="toefl_score">TOEFL Score:</label>
        <input type="number" id="toefl_score" name="toefl_score"><br><br>

        <label for="ielts_score">IELTS Score:</label>
        <input type="number" id="ielts_score" name="ielts_score"><br><br>

        <label for="sat_score">SAT Score:</label>
        <input type="number" id="sat_score" name="sat_score"><br><br>

        <label for="act_score">ACT Score:</label>
        <input type="number" id="act_score" name="act_score"><br><br>

        <label for="application_fee">Application Fee:</label>
        <input type="number" id="application_fee" name="application_fee"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

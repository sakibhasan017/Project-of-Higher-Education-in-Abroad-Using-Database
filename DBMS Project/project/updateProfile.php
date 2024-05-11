<?php
include('connection.php'); 

session_start(); 

if(isset($_SESSION['username'])) {
    $email = $_SESSION['username']; 
} else {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM Student s JOIN profile p ON p.Stu_ID=s.Stu_ID JOIN Education_INFO e ON e.Stu_ID=s.Stu_ID  WHERE s.Email = '$email'";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = $row['Name'];
    $phone_number = $row['Phone_Number'];
    $address = $row['Address'];
    $institute_name = $row['Institute_Name'];
    $program_name = $row['Program_Name'];
    $dept_name = $row['Dept_Name'];
    $ielts_score = $row['IELTS_Score'];
    $toefl_score = $row['TOEFL_Score'];
    $sat_score = $row['SAT_Score'];
    $total_cgpa = $row['Total_CGPA'];
    $passing_year = $row['Passing_Year'];

} else {
    echo "No info";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nam = $_POST["name"];
    $phone_num = $_POST["phone"];
    $addres = $_POST["address"];
    $new_password = $_POST["password"];
    $new_ielts_score = $_POST["ielts_score"];
    $new_toefl_score = $_POST["toefl_score"];
    $new_sat_score = $_POST["sat_score"];

    
    $updateQ= "UPDATE profile SET Name='$nam', Phone_Number='$phone_num', Address='$addres' WHERE Email='$email'";
    $update_result = mysqli_query($con, $updateQ);
    if ($result->num_rows > 0) {

    }
    

    if ($update_result) {
        
        if (!empty($new_password)) {
            $updateP= "UPDATE Student SET Password='$new_password' WHERE Email='$email'";
            $update_password_result = mysqli_query($con, $updateP);

        }

        
        $updateScores = "UPDATE Education_INFO SET IELTS_Score='$new_ielts_score', TOEFL_Score='$new_toefl_score', SAT_Score='$new_sat_score' WHERE Stu_ID=(SELECT Stu_ID FROM Student WHERE Email='$email')";
        $update_scores_result = mysqli_query($con, $updateScores);
        
        header("Location: myAccount.php");
        exit;
    } else {
        
        echo "Error updating account: " . mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
      
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
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
        <h2>Edit Your Account</h2>
        <a href="#" class="back-button" onclick="goBack()">Back</a>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone_number; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="ielts_score">IELTS Score:</label>
                <input type="text" id="ielts_score" name="ielts_score" value="<?php echo $ielts_score; ?>">
            </div>
            <div class="form-group">
                <label for="toefl_score">TOEFL Score:</label>
                <input type="text" id="toefl_score" name="toefl_score" value="<?php echo $toefl_score; ?>">
            </div>
            <div class="form-group">
                <label for="sat_score">SAT Score:</label>
                <input type="text" id="sat_score" name="sat_score" value="<?php echo $sat_score; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Update Account" class="btn">
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

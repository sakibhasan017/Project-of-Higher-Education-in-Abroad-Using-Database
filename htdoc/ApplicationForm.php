<?php

session_start();


if(!isset($_SESSION['username'])) {
    
    header("Location: login.php");
    exit;
}


include('connection.php');


$email = $_SESSION['username'];


$university_name = '';
$applicant_name = '';


if(isset($_GET['name'])) {
   
    $university_name = $_GET['name'];
}


$sql = "SELECT Name FROM profile WHERE email = '$email'";
$result = mysqli_query($con, $sql);


if($result) {
    
    $row = mysqli_fetch_assoc($result);
    
    if($row) {
        $applicant_name = $row['Name'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $emaill = $_POST['email'];
    $application_details = $_POST['application_details'];

    $status = 'Pending';
    $sqll = "INSERT INTO application (University_Name, Applicant_Info, Application_Details, Status,Email) 
            VALUES ('$university_name', '$email', '$application_details', '$status','$emaill')";

    if (mysqli_query($con, $sqll)) {
        echo "Application submitted successfully.";
        header('Location: myAccount.php');
        exit;
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <style>
       
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

input[readonly] {
    background-color: #f2f2f2;
    cursor: default;
}

    </style>
</head>
<body>
    <h2>Application Form</h2>
    <form method="POST">
       
        <label for="university_name">University Name:</label>
        <input type="text" id="university_name" name="university_name" value="<?php echo htmlspecialchars($university_name); ?>" readonly>
        
        <label for="email">Contact Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="applicant_info">Applicant Account Email:</label>
        <input type="text" id="applicant_info" name="applicant_info" value="<?php echo htmlspecialchars($email); ?>" readonly>
        <p style="font-size: 0.9em; color: #666;">We collect your information from your Account.</p>
        
        <label for="application_details">Application Details (Drive Link):</label>
<input type="text" id="application_details" name="application_details" required>
<p style="font-size: 0.9em; color: #666;">Please upload the drive link containing all the files listed in additional requirements.</p>


        
        <input type="submit" value="Submit">
    </form>

    
    
</body>
</html>


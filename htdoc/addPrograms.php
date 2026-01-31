<?php

include('connection.php');

$insId = "";
$programName = "";
$tuitionFee = "";
$error = "";


if(isset($_GET['id'])) {
    $insId = $_GET['id'];
    
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $programName = $_POST['programName'];
    $tuitionFee = $_POST['tuitionFee'];
        
    $sql = "INSERT INTO program (Ins_ID, Program_Name, Tuition_Fee) VALUES ('$insId', '$programName', '$tuitionFee')";
        
   
    $sqlN = "SELECT * FROM educational_institute WHERE Ins_ID='$insId'";
    $resultN = mysqli_query($con, $sqlN);

    if (mysqli_num_rows($resultN) > 0) {
        $row = mysqli_fetch_assoc($resultN);
        $uni_name = $row['Ins_Name']; 
        
        
        if (mysqli_query($con, $sql)) {
            header("Location: uniDetailsAdmin.php?name=$uni_name");
            exit();
        } 
    } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Program</title>
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
    <h2><center>Add Program</center></h2>

    <a href="#" class="back-button" onclick="goBack()">Back</a>
    
    <form method="post">
         
        <input type="hidden" name="insId" value="<?php echo $insId; ?>">
        <label for="programName">Program Name:</label><br>
        <input type="text" id="programName" name="programName" value="<?php echo $programName; ?>"><br>
        <label for="tuitionFee">Tuition Fee:</label><br>
        <input type="text" id="tuitionFee" name="tuitionFee" value="<?php echo $tuitionFee; ?>"><br>
        <input type="submit" value="Add Program">
        <p class="error"><?php echo $error; ?></p>
    </form>
    <script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

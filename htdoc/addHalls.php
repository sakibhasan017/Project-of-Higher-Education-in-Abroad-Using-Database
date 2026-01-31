<?php

include('connection.php');

$uni_name = "";


if(isset($_GET['id'])) {
    $insId = $_GET['id'];
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $hallName = $_POST['hallName'];
    $totalSeats = $_POST['totalSeats'];
    $availableSeats = $_POST['availableSeats'];
    $hallCost = $_POST['hallCost'];
    
    $sql = "INSERT INTO hall (Ins_ID, Hall_Name, Total_Seats, Available_Seats, Hall_Cost) VALUES ('$insId', '$hallName', '$totalSeats', '$availableSeats', '$hallCost')";
    $sqlN = "SELECT * FROM educational_institute WHERE Ins_ID='$insId'";
    $resultN = mysqli_query($con, $sqlN);

    if (mysqli_num_rows($resultN) > 0) {
        $row = mysqli_fetch_assoc($resultN);
        $uni_name = $row['Ins_Name']; 

    if(mysqli_query($con, $sql)) {
        
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
    <title>Add New Hall</title>
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

<h2><center>Add New Hall</center></h2>
<a href="#" class="back-button" onclick="goBack()">Back</a>

<form method="post" >
    <input type="hidden" name="insId" value="<?php echo $insId; ?>">
    <label for="hallName">Hall Name:</label>
    <input type="text" id="hallName" name="hallName" required><br>
    <label for="totalSeats">Total Seats:</label>
    <input type="text" id="totalSeats" name="totalSeats" required><br>
    <label for="availableSeats">Available Seats:</label>
    <input type="text" id="availableSeats" name="availableSeats" required><br>
    <label for="hallCost">Hall Cost:</label>
    <input type="text" id="hallCost" name="hallCost" required><br>
    <input type="submit" value="Add Hall">
</form>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

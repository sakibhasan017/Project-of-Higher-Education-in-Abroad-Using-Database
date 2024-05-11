<?php

include('connection.php');


$programId = "";
$facultyName = "";
$designation = "";
$email = "";
$error = "";


if(isset($_GET['prog_ID']) && !empty($_GET['prog_ID'])) {
    $programId = $_GET['prog_ID'];
} else {
    $error = "Program_ID not provided.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $facultyName = mysqli_real_escape_string($con, $_POST['facultyName']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    
    $sql = "INSERT INTO Faculty (Program_ID, Faculty_Name, Designation, Email) 
            VALUES ('$programId', '$facultyName', '$designation', '$email')";

    
    if(mysqli_query($con, $sql)) {
        header("Location: facultyForAdmin.php?prog_ID=$programId");
        exit();
    } else {
        $error = "Error adding faculty: " . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
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
    <h2><center>Add Faculty</center></h2>
    <a href="#" class="back-button" onclick="goBack()">Back</a>
    <?php if(!empty($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" >
        <input type="hidden" name="programId" value="<?php echo $programId; ?>">
        <label for="facultyName">Faculty Name:</label><br>
        <input type="text" id="facultyName" name="facultyName" required><br>
        <label for="designation">Designation:</label><br>
        <input type="text" id="designation" name="designation" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

<?php

include('connection.php');



if(isset($_GET['id'])) {
    $insId = $_GET['id'];

    
    $sql = "SELECT * FROM requirement WHERE Ins_ID='$insId'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $ieltsScore = $row['IELTS_Score'];
        $toeflScore = $row['TOEFL_Score'];
        $satScore = $row['SAT_Score'];
        $actScore = $row['ACT_Score'];
        $app_fee= $row['Application_Fee'];
    } else {
        echo "No requirements found for this institute";
    }
   
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $insId = $_POST['insId'];
    $ieltsScore = $_POST['ieltsScore'];
    $toeflScore = $_POST['toeflScore'];
    $satScore = $_POST['satScore'];
    $actScore = $_POST['actScore'];
    $app_fee= $_POST['appFee'];


    $sql = "UPDATE requirement SET IELTS_Score='$ieltsScore', TOEFL_Score='$toeflScore', SAT_Score='$satScore', ACT_Score='$actScore' WHERE Ins_ID='$insId'";
    
    $sqlN = "SELECT * FROM educational_institute WHERE Ins_ID='$insId'";
    $resultN = mysqli_query($con, $sqlN);

    if (mysqli_num_rows($resultN) > 0) {
        $row = mysqli_fetch_assoc($resultN);
        $uni_name = $row['Ins_Name']; 
    } 

    if (mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$uni_name");
        exit();
    } else {
        echo "Error updating requirements: " . mysqli_error($con);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Requirements</title>
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
    <h2>Edit Requirements</h2>
    <a href="#" class="back-button" onclick="goBack()">Back</a>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="insId" value="<?php echo $insId; ?>">
        <label for="ieltsScore">IELTS Score:</label>
        <input type="text" id="ieltsScore" name="ieltsScore" value="<?php echo $ieltsScore; ?>"><br><br>
        <label for="toeflScore">TOEFL Score:</label>
        <input type="text" id="toeflScore" name="toeflScore" value="<?php echo $toeflScore; ?>"><br><br>
        <label for="satScore">SAT Score:</label>
        <input type="text" id="satScore" name="satScore" value="<?php echo $satScore; ?>"><br><br>
        <label for="actScore">ACT Score:</label>
        <input type="text" id="actScore" name="actScore" value="<?php echo $actScore; ?>"><br><br>
        <label for="appFee">Application Fee:</label>
        <input type="text" id="appFee" name="appFee" value="<?php echo $app_fee; ?>"><br><br>
        <input type="submit" value="Update Requirements">
    </form>
    <script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

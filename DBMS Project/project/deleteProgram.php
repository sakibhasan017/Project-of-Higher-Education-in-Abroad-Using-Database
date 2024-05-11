<?php

include('connection.php');

$uni_name = "";

if(isset($_GET['prog_ID']) && !empty($_GET['prog_ID'])) {
    
    $prog_ID = mysqli_real_escape_string($con, $_GET['prog_ID']);

    $sqlN = "SELECT e.Ins_Name FROM Educational_institute e JOIN Program p ON e.Ins_ID = p.Ins_ID WHERE p.Prog_ID = '$prog_ID'";
    $resultN = mysqli_query($con, $sqlN);
    
    if (mysqli_num_rows($resultN) > 0) {
        $row = mysqli_fetch_assoc($resultN);
        $uni_name = $row['Ins_Name']; 
    }

    $sql = "DELETE FROM Program WHERE Prog_ID = $prog_ID";
    $sqll = "DELETE FROM Faculty WHERE Program_ID = $prog_ID";
    mysqli_query($con, $sqll);

    if(mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$uni_name");
        exit();
    } else {
        echo "Error deleting program: " . mysqli_error($con);
    }
} 
?>

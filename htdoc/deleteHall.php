<?php

include('connection.php');

$uni_name = "";

if(isset($_GET['hall_ID']) && !empty($_GET['hall_ID'])) {
    
    $hall_ID = mysqli_real_escape_string($con, $_GET['hall_ID']);

    $sqlN = "SELECT e.Ins_Name FROM educational_institute e JOIN hall h ON e.Ins_ID = h.Ins_ID WHERE h.Hall_ID = '$hall_ID'";
    $resultN = mysqli_query($con, $sqlN);
    
    if (mysqli_num_rows($resultN) > 0) {
        $row = mysqli_fetch_assoc($resultN);
        $uni_name = $row['Ins_Name']; 
    }

    $sql = "DELETE FROM hall WHERE Hall_ID = $hall_ID";

    if(mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$uni_name");
        exit();
    } else {
        echo "Error deleting hall: " . mysqli_error($con);
    }
} 
?>

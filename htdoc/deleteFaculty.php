<?php

include('connection.php');

$prog_ID="";

if(isset($_GET['faculty_ID']) && !empty($_GET['faculty_ID'])){

    $faculty_ID = mysqli_real_escape_string($con, $_GET['faculty_ID']);

    $sqlN = "SELECT * FROM faculty WHERE Faculty_ID = '$faculty_ID'";
    $resultN = mysqli_query($con, $sqlN);
    
    if (mysqli_num_rows($resultN) > 0) {
        $row = mysqli_fetch_assoc($resultN);
        $prog_ID = $row['Program_ID']; 
    }
    $sql = "DELETE FROM faculty WHERE Faculty_ID = '$faculty_ID'";
    if(mysqli_query($con, $sql)) {
        header("Location: facultyForAdmin.php?prog_ID=$prog_ID");
        exit();
    } else {
        echo "Error deleting program: " . mysqli_error($con);
    }
}
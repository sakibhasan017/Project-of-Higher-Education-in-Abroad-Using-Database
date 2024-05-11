<?php
include('connection.php');
 
$uni_name = "";

if(isset($_GET['Ins_ID']) && !empty($_GET['Ins_ID'])) {
    
    $Ins_ID = mysqli_real_escape_string($con, $_GET['Ins_ID']);

   
    $Psql = "SELECT Prog_ID FROM Program WHERE Ins_ID = '$Ins_ID'";
    $Presult = mysqli_query($con, $Psql);

    if ($Presult) {
        while ($prog_row = mysqli_fetch_assoc($Presult)) {
            $prog_ID = $prog_row['Prog_ID'];

            $delete_faculty = "DELETE FROM Faculty WHERE Program_ID = '$prog_ID'";
            mysqli_query($con, $delete_faculty);
        }
    }

    $delete_program = "DELETE FROM Program WHERE Ins_ID = '$Ins_ID'";
    mysqli_query($con, $delete_program);
     
    $delete_hall = "DELETE FROM Hall WHERE Ins_ID = '$Ins_ID'";
    mysqli_query($con, $delete_program);

    $delete_req = "DELETE FROM Requirement WHERE Ins_ID = '$Ins_ID'";
    mysqli_query($con, $delete_req);

    $delete_institute = "DELETE FROM Educational_institute WHERE Ins_ID = '$Ins_ID'";
    if(mysqli_query($con, $delete_institute)) {
        header("Location: adminInstitute.php");
        exit();
    } else {
        echo "Error deleting educational institute: " . mysqli_error($con);
    }
} 
?>

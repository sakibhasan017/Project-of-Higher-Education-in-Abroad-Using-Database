<?php
include('connection.php');


if(isset($_POST['updateCategory'])) {
    
    $category = $_POST['category'];
    $newValue = $_POST[$category];
    $uni_name = $_GET['uName']; 

    $sql = "UPDATE Educational_Institute SET $category = '$newValue' WHERE Ins_Name = '$uni_name'";
    $result = mysqli_query($con, $sql);

    if($result) {
       
        header("Location: uniDetailsAdmin.php?name=$uni_name");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}






if(isset($_POST['updateProgram'])) {
    $programId = $_POST['programId'];
    $newTuitionFee = $_POST['tuitionFee'];

    $sql = "UPDATE Program SET Tuition_Fee = '$newTuitionFee' WHERE Prog_ID = $programId";
    
    $sqll = "SELECT e.Ins_Name FROM Educational_Institute e JOIN Program p ON e.Ins_ID=p.Ins_ID WHERE p.Prog_ID = $programId";
    $resultss = mysqli_query($con, $sqll);
    if ($resultss && mysqli_num_rows($resultss) > 0) {
        $row = mysqli_fetch_assoc($resultss);
        $name = $row['Ins_Name'];
    }
    
    if(mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$name");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

if(isset($_POST['updateHallCost'])) {
    $hallId = $_POST['hallId'];
    $newHallCost = $_POST['hallCost'];

    $sql = "UPDATE Hall SET Hall_Cost = '$newHallCost' WHERE Hall_ID = $hallId";
    $sqll = "SELECT e.Ins_Name FROM Educational_Institute e JOIN Hall h ON e.Ins_ID=h.Ins_ID WHERE h.Hall_ID = $hallId";
    $resultsss = mysqli_query($con, $sqll);

    if ($resultsss && mysqli_num_rows($resultsss) > 0) {
        $row = mysqli_fetch_assoc($resultsss);
        $name = $row['Ins_Name'];
    }

    if(mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$name");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

if(isset($_POST['updateAvailableSeats'])) {
    $hallId = $_POST['hallId'];
    $updateAvSeats = $_POST['availableSeats'];

    $sql = "UPDATE Hall SET Available_Seats = ' $updateAvSeats' WHERE Hall_ID = $hallId";
    $sqll = "SELECT e.Ins_Name FROM Educational_Institute e JOIN Hall h ON e.Ins_ID=h.Ins_ID WHERE h.Hall_ID = $hallId";
    $resultsss = mysqli_query($con, $sqll);

    if ($resultsss && mysqli_num_rows($resultsss) > 0) {
        $row = mysqli_fetch_assoc($resultsss);
        $name = $row['Ins_Name'];
    }

    if(mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$name");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

if(isset($_POST['updateTotalSeats'])) {
    $hallId = $_POST['hallId'];
    $newtotalSeats = $_POST['totalSeats'];

    $sql = "UPDATE Hall SET Total_Seats = '$newtotalSeats' WHERE Hall_ID = $hallId";
    $sqll = "SELECT e.Ins_Name FROM Educational_Institute e JOIN Hall h ON e.Ins_ID=h.Ins_ID WHERE h.Hall_ID = $hallId";
    $resultsss = mysqli_query($con, $sqll);

    if ($resultsss && mysqli_num_rows($resultsss) > 0) {
        $row = mysqli_fetch_assoc($resultsss);
        $name = $row['Ins_Name'];
    }

    if(mysqli_query($con, $sql)) {
        header("Location: uniDetailsAdmin.php?name=$name");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

?>

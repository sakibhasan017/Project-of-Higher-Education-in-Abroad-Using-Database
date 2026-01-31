<?php
include('connection.php'); 
session_start(); 
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

} else {
    
    header("Location: index.php");
    exit;
}

$sql = "SELECT Name FROM profile where email='$username'";
$result = mysqli_query($con,$sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = $row['Name'];
    $nameParts = explode(' ', $name);
  
    $name = $nameParts[0];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        img.logo {
            max-width: 80px; 
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer p {
            margin-bottom: 10px;
        }

        
        .login-icon, .register-icon {
            color: #ff5733; 
            font-size: 24px; 
            margin-right: 5px; 
        }
        .back-button {
            background-color: #f2f2f2;
            color: #333;
            padding: 8px 12px;
            border-radius: 4px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
        <div>
            <img src="http://localhost/phpt/Image/logo.jpg" alt="Logo" class="logo">
        </div>
        <h1>Higher Education in Abroad</h1>
        <nav>
            <ul>
                <li><a href="homeUser.php">Home</a></li>
                <li><a href="instituteU.php">Institute</a></li>
                <li><a href="myAccount.php"><span class="profile-icon">&#x1F464;</span><?php echo $name; ?>'s Account</a></li>
                <li><a href="index.php"><strong>Logout</strong></a></li>
                
            </ul>
        </nav>
    </header>
    <main>
    <div class="container">
    <a href="#" class="back-button" onclick="goBack()">Back</a>
        <?php
        
        include('connection.php');

       
        function displayRequirements($requirements) {
            echo "<h3>Requirements:</h3>";
            echo "<ul>";
            foreach ($requirements as $requirement) {
                $lines = explode(",", $requirement);
                foreach ($lines as $line) {
                    echo "<li>$line</li>";
                }
                
            }
            echo "</ul>";
        }

       
        if(isset($_GET['name'])) {
            $uni_name = $_GET['name'];

            
            $sql = "SELECT * FROM educational_institute WHERE Ins_Name = '$uni_name'";
            $result=mysqli_query($con, $sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>{$row['Ins_Name']}</h2>";
                echo "<table>";
                echo "<tr><th>Category</th><th>Details</th></tr>";
                echo "<tr><td>Country</td><td>{$row['Country']}</td></tr>";
                echo "<tr><td>Application Last Date</td><td>{$row['App_Last_Date']}</td></tr>";
                echo "<tr><td>Location</td><td>{$row['Location']}</td></tr>";
                echo "</table>";

                $idd=$row['Ins_ID'];
                $sqll = "SELECT * FROM program WHERE Ins_ID = $idd";
                
                $resultt = mysqli_query($con, $sqll);

                echo "<h3>Programs Offered:</h3>";
                if ($resultt->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Program Name</th><th>Tuition Fee</th></tr>";
                    while ($program_row = $resultt->fetch_assoc()) {
                        echo "<tr><td><a href='facultyInfoU.php?prog_ID={$program_row['Prog_ID']}'>{$program_row['Program_Name']}</a></td><td>{$program_row['Tuition_Fee']}</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No programs offered.</p>";
                }

                
                $sqlH = "SELECT * FROM hall WHERE Ins_ID = $idd";
                
                $resultH = mysqli_query($con, $sqlH);

                echo "<h3>Halls Available:</h3>";
                if ($resultH->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Hall Name</th><th>Total Seats</th><th>Available Seats</th><th>Hall Cost</th></tr>";
                    while ($hall_row = $resultH->fetch_assoc()) {
                        echo "<tr><td>{$hall_row['Hall_Name']}</td><td>{$hall_row['Total_Seats']}</td><td>{$hall_row['Available_Seats']}</td><td>{$hall_row['Hall_Cost']}</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No halls available.</p>";
                }

                
                $sqlReq = "SELECT * FROM requirement WHERE Ins_ID = $idd";
                $resultReq=mysqli_query($con, $sqlReq);

                if ($resultReq->num_rows > 0) {
                    $requirements = [];
                    while ($requirement_row = $resultReq->fetch_assoc()) {
                        $requirement = "";
                        if ($requirement_row['TOEFL_Score']) {
                            $requirement .= "TOEFL Score: {$requirement_row['TOEFL_Score']}, ";
                        }
                        if ($requirement_row['IELTS_Score']) {
                            $requirement .= "IELTS Score: {$requirement_row['IELTS_Score']}, ";
                        }
                        if ($requirement_row['SAT_Score']) {
                            $requirement .= "SAT Score: {$requirement_row['SAT_Score']}, ";
                        }
                        if ($requirement_row['ACT_Score']) {
                            $requirement .= "ACT Score: {$requirement_row['ACT_Score']}, ";
                        }
                        if ($requirement_row['Application_Fee']) {
                            $requirement .= "Application Fee: {$requirement_row['Application_Fee']}$, ";
                        }
                        $requirements[] = rtrim($requirement, ", ");
                    }
                    displayRequirements($requirements);
                    
                    echo "<h3>Additional Requirements:</h3>";
                echo "<ul>";
                echo "<li>Academic Transcripts</li>";
                echo "<li>Visa and Immigration Documents</li>";
                echo "<li>Proof of Financial Support</li>";
                echo "<li>Health Insurance</li>";
                echo "<li>Statement of Purpose or Personal Statement</li>";
                echo "<li>Letters of Recommendation</li>";
                echo "<li>Passport-sized Photographs</li>";
                echo "</ul>";
                } else {
                    echo "<p>No requirements available.</p>";
                }
            } 
        } 
        ?>
        <div style="text-align: center; padding: 10px; background-color: red; border-radius: 8px;">
    <a href="ApplicationForm.php?name=<?php echo urlencode($uni_name); ?>" style="color: white; text-decoration: none;">Apply Now</a>
</div>


    </div>
    </main>
    <footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

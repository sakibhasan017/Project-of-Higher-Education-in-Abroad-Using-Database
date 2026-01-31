



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
            max-width: 1200px;
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
            <img src="Image/logo.jpg" alt="Logo" class="logo">
        </div>
        <h1>Higher Education in Abroad</h1>
        <nav>
            <ul>
            <ul>
            <li><a href="homeAdmin.php">Home</a></li>
                <li><a href="adminInstitute.php">Institute</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="accountInfos.php">Account Information</a></li>
                <li><a href="index.php"><strong>Logout</strong></a></li>
                
            </ul>
                
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
echo "<tr><td>Country</td><td>";
echo "<form action='updatePH.php?uName=$uni_name' method='POST'>";
echo "<input type='hidden' name='category' value='Country'>";
echo "<input type='text' name='Country' value='{$row['Country']}'>";
echo "<input type='submit' name='updateCategory' value='Update'>";
echo "</form>";
echo "</td><td></td></tr>";
echo "<tr><td>Application Last Date</td><td>";
echo "<form action='updatePH.php?uName=$uni_name' method='POST'>";
echo "<input type='hidden' name='category' value='App_Last_Date'>";
echo "<input type='text' name='Application_Last_Date' value='{$row['App_Last_Date']}'>";
echo "<input type='submit' name='updateCategory' value='Update'>";
echo "</form>";
echo "</td><td></td></tr>";
echo "<tr><td>Location</td><td>";
echo "<form action='updatePH.php?uName=$uni_name' method='POST'>";
echo "<input type='hidden' name='category' value='Location'>";
echo "<input type='text' name='Location' value='{$row['Location']}'>";
echo "<input type='submit' name='updateCategory' value='Update'>";
echo "</form>";
echo "</td><td></td></tr>";
echo "</table>";

                $idd=$row['Ins_ID'];
                $sqll = "SELECT * FROM program WHERE Ins_ID = $idd";
                
                $resultt = mysqli_query($con, $sqll);

                if ($resultt->num_rows > 0) {
                    echo "<h3>Programs Offered:</h3>";
                    echo "<table>";
                    echo "<tr><th>Program Name</th><th>Tuition Fee</th><th>Action</th></tr>";
                    while ($program_row = $resultt->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><a href='facultyForAdmin.php?prog_ID={$program_row['Prog_ID']}'>{$program_row['Program_Name']}</a></td>";
                        
                        echo "<td>";
                        echo "<form action='updatePH.php' method='POST'>";
                        echo "<input type='hidden' name='programId' value='{$program_row['Prog_ID']}'>";
                        echo "<input type='text' name='tuitionFee' value='{$program_row['Tuition_Fee']}'>";
                        echo "<input type='submit' name='updateProgram' value='Update'>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td><a href='deleteProgram.php?prog_ID={$program_row['Prog_ID']}' onclick='return confirm(\"Are you sure you want to delete this program?\");'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No programs offered.</p>";
                }
                echo "<a href='addPrograms.php?id={$row['Ins_ID']}'><button>Add More Programs</button></a>";
                echo "<br>";

                $sqlH = "SELECT * FROM hall WHERE Ins_ID = $idd";
                
                $resultH = mysqli_query($con, $sqlH);

                
                
                if ($resultH->num_rows > 0) {
                    echo "<h3>Halls Available:</h3>";
                    echo "<table>";
                    echo "<tr><th>Hall Name</th><th>Total Seats</th><th>Available Seats</th><th>Hall Cost</th><th>Action</th></tr>";
                    while ($hall_row = $resultH->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$hall_row['Hall_Name']}</td>";
                        
                        
                        echo "<td>";
                        echo "<form action='updatePH.php' method='POST'>";
                        echo "<input type='hidden' name='hallId' value='{$hall_row['Hall_ID']}'>";
                        echo "<input type='text' name='totalSeats' value='{$hall_row['Total_Seats']}'>";
                        echo "<input type='submit' name='updateTotalSeats' value='Update'>";
                        echo "</form>";
                        echo "</td>";
                        
                        
                        echo "<td>";
                        echo "<form action='updatePH.php' method='POST'>";
                        echo "<input type='hidden' name='hallId' value='{$hall_row['Hall_ID']}'>";
                        echo "<input type='text' name='availableSeats' value='{$hall_row['Available_Seats']}'>";
                        echo "<input type='submit' name='updateAvailableSeats' value='Update'>";
                        echo "</form>";
                        echo "</td>";
                        
                       
                        echo "<td>";
                        echo "<form action='updatePH.php' method='POST'>";
                        echo "<input type='hidden' name='hallId' value='{$hall_row['Hall_ID']}'>";
                        echo "<input type='text' name='hallCost' value='{$hall_row['Hall_Cost']}'>";
                        echo "<input type='submit' name='updateHallCost' value='Update'>";
                        echo "</form>";
                        echo "</td>";
                        
                        
                        echo "<td>";
                        echo "<a href='deleteHall.php?hall_ID={$hall_row['Hall_ID']}' onclick='return confirm(\"Are you sure you want to delete this hall?\");'>Delete</a>";
                        echo "</td>";
                        
                        echo "</tr>";
                    }
                    echo "</table>";
                    

                } else {
                    echo "<p>No halls available.</p>";
                }
                echo "<a href='addHalls.php?id={$row['Ins_ID']}'><button>Add More Halls</button></a>";
                echo "<br>";
                
                
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
                    echo "<a href='editRequirements.php?id={$row['Ins_ID']}'><button>Edit Requirements</button></a>";

                    echo "<br>";                    
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

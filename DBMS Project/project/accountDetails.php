<?php
include('connection.php'); 

if(isset($_GET['email'])) {
    $email = $_GET['email'];
    
} 

$sql = "SELECT * FROM Student s 
        JOIN profile p ON p.Stu_ID = s.Stu_ID 
        JOIN Education_INFO e ON e.Stu_ID = s.Stu_ID  
        WHERE s.Email = '$email'";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = $row['Name'];
    $namef=$row['Name'];
    $phone_number = $row['Phone_Number'];
    $address = $row['Address'];
    $institute_name = $row['Institute_Name'];
    $program_name = $row['Program_Name'];
    $dept_name = $row['Dept_Name'];
    $ielts_score = $row['IELTS_Score'];
    $toefl_score = $row['TOEFL_Score'];
    $sat_score = $row['SAT_Score'];
    $total_cgpa = $row['Total_CGPA'];
    $passing_year = $row['Passing_Year'];
    $nameParts = explode(' ', $namef);
  
    $namef = $nameParts[0];

} else {
    echo "No info";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            
            font-size: 14px; 
            
        
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

        main {
            padding: 20px;
        }

        
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .info {
            margin-bottom: 15px;
        }
        .info label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 150px;
        }
        .info p {
            display: inline;
            margin: 0;
            color: #777;
        }
       
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
        img.logo {
            max-width: 80px; 
            height: auto;
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
            <li><a href="homeAdmin.php">Home</a></li>
                <li><a href="adminInstitute.php">Institute</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="accountInfos.php">Account Information</a></li>
                <li><a href="index.php"><strong>Logout</strong></a></li>
                
            </ul>
        </nav>
    </header>
    <main>
    <div class="container">
            <h2>Welcome to <?php echo $name; ?>'s Account</h2>
            <div class="info">
                <label>Email:</label>
                <p><?php echo $email; ?></p>
            </div>
            <div class="info">
                <label>Phone Number:</label>
                <p><?php echo $phone_number; ?></p>
            </div>
            <div class="info">
                <label>Address:</label>
                <p><?php echo $address; ?></p>
            </div>
            <div class="info">
                <label>Institute Name:</label>
                <p><?php echo $institute_name; ?></p>
            </div>
            <div class="info">
                <label>Program Name:</label>
                <p><?php echo $program_name; ?></p>
            </div>
            <div class="info">
                <label>Department Name:</label>
                <p><?php echo $dept_name; ?></p>
            </div>
            <div class="info">
                <label>IELTS Score:</label>
                <p><?php echo $ielts_score; ?></p>
            </div>
            <div class="info">
                <label>TOEFL Score:</label>
                <p><?php echo $toefl_score; ?></p>
            </div>
            <div class="info">
                <label>SAT Score:</label>
                <p><?php echo $sat_score; ?></p>
            </div>
            <div class="info">
                <label>Total CGPA:</label>
                <p><?php echo $total_cgpa; ?></p>
            </div>
            <div class="info">
                <label>Passing Year:</label>
                <p><?php echo $passing_year; ?></p>
            </div>
            <a href="appHisFromDetails.php?email=<?php echo urlencode($email); ?>" class="btn">Application History</a>

        </div>
</body>
    </main>
    <footer class="footer">
    <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</html>



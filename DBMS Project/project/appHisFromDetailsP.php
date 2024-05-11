<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
       
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
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
    </header>
    <div class="container">
        <h2>Application History</h2>
        <?php
include('connection.php'); 

if(isset($_GET['email'])) {
    $email = $_GET['email'];
    
} 

$sql = "SELECT * FROM Application WHERE Applicant_Info = '$email' ORDER BY Application_Date DESC";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Application ID</th><th>University Name</th><th>Applicant Info</th><th>Application Details</th><th>Status</th><th>Application Date</th></tr>";
   
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["App_ID"] . "</td>";
        echo "<td><a href='uniDetailsU.php?name=" . urlencode($row["University_Name"]) . "'>" . $row["University_Name"] . "</a></td>";
        echo "<td>" . $row["Applicant_Info"] . "</td>";
        echo "<td>" . $row["Application_Details"] . "</td>";
        echo "<td>" . $row["Status"] . "</td>";
        echo "<td>" . $row["Application_Date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No application history found.";
}

mysqli_close($con);
?>
       <br>
        <a href="accountInfoParent.php?email=<?php echo urlencode($email); ?>" class="btn">Back to My Account</a>
    </div>
    <footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</body>
</html>

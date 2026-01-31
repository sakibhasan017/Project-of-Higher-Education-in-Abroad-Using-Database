

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px; 
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

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }

        .footer p {
            margin-bottom: 10px;
        }

        
        .login-icon, .register-icon {
            color: #ff5733; 
            font-size: 24px; 
            margin-right: 5px; 
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
                <li><a href="homeAdmin.php">Home</a></li>
                <li><a href="adminInstitute.php">Institute</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="accountInfos.php">Account Information</a></li>
                <li><a href="index.php"><strong>Logout</strong></a></li>  
            </ul>
        </nav>
        
    </header>
    <main>
    <h2><center>Account Information</center></h2>
    <?php

include('connection.php');



    $sql = "SELECT Name, Email FROM profile";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Student Name</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='accountDetails.php?email=" . urlencode($row['Email']) . "'>" . $row['Name'] . "</a></td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No students found.";
    }


?>
</main>
<footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</body>
</html>

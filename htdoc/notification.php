<?php

include('connection.php');


function updateStatus($con, $appID, $status) {
    $sql = "UPDATE application SET Status = '$status' WHERE App_ID = $appID";
    return mysqli_query($con, $sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['approve'])) {
        $appID = $_POST['approve'];
        $status = 'Accepted';
        if (updateStatus($con, $appID, $status)) {
            
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Failed to update status.";
        }
    }
    
    elseif (isset($_POST['reject'])) {
        $appID = $_POST['reject'];
        $status = 'Rejected';
        if (updateStatus($con, $appID, $status)) {
           
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Failed to update status.";
        }
    }
}


function decodeLink($driveLink) {
    
    return $driveLink;
}

$sql = "SELECT * FROM application where Status='Pending'  ORDER BY App_ID DESC ";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
        .approve-button, .reject-button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .approve-button {
            background-color: green;
            color: white;
        }
        .reject-button {
            background-color: red;
            color: white;
        }
        .drive-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
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
        .history-button {
            color: #fff;
            padding: 8px 16px; 
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            cursor: pointer;
            margin-bottom: 20px;
            float: right;
            transition: background-color 0.3s;
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
<button class="history-button" onclick="window.location.href='historyApp.php'">History</button>
    <h2><center>Notifications</center></h2>
    <form method="POST">
    <table>
        <thead>
            <tr>
                <th>University Name</th>
                <th>Applicant Info</th>
                <th>Applicant Details Link</th>
                <th>Status</th>
                <th>Application Date</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><a href='uniDetailsAdmin.php?name=" . urlencode($row['University_Name']) . "'>" . $row['University_Name'] . "</a></td>";
                    echo "<td><a href='accountDetails.php?email=" . $row['Applicant_Info'] . "'>See Profile</a></td>";
                    echo "<td><a class='drive-link' href='" . decodeLink($row['Application_Details']) . "' target='_blank'>Drive Link</a></td>";
                    echo "<td>" . $row['Status'] . "</td>";
                    echo "<td>" . $row['Application_Date'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>";
                    echo "<button class='approve-button' type='submit' name='approve' value='" . $row['App_ID'] . "'>Approve</button>";
                    echo "<button class='reject-button' type='submit' name='reject' value='" . $row['App_ID'] . "'>Reject</button>";
                    echo "</td>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>No notifications found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </form>
        </main>
    <footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</body>

</html>

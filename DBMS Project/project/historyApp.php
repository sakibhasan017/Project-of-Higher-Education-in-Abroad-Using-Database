<?php

include('connection.php');



function decodeLink($driveLink) {
    
    return $driveLink;
}

$sql = "SELECT * FROM application where Status!='Pending' ORDER BY App_ID DESC ";
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
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
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

<main>
<div class="container">
    <h2><center>History</center></h2>
    <a href="#" class="back-button" onclick="goBack()">Back</a>
    <table>
        <thead>
            <tr>
                <th>University Name</th>
                <th>Applicant Info</th>
                <th>Applicant Details Link</th>
                <th>Status</th>
                <th>Application Date</th>
                <th>Contact Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['University_Name'] . "</td>";
                    echo "<td>" . $row['Applicant_Info'] . "</td>";
                    echo "<td><a class='drive-link' href='" . decodeLink($row['Application_Details']) . "' target='_blank'>Drive Link</a></td>";
                    echo "<td>" . $row['Status'] . "</td>";
                    echo "<td>" . $row['Application_Date'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No History found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
        </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
        </main>
   
</body>

</html>

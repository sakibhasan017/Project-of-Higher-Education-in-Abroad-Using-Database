
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
    <title>Institute Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="submit"]:hover {
            border-color: #333;
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
                <li><a href="homeUser.php">Home</a></li>
                <li><a href="instituteU.php">Institute</a></li>
                <li><a href="myAccount.php"><span class="profile-icon">&#x1F464;</span><?php echo $name; ?>'s Account</a></li>
                <li><a href="index.php"><strong>Logout</strong></a></li>
                
            </ul>
        </nav>
    </header>
    <main>
    <div class="container">
        <h2>Search and Filter</h2>
        <form method="GET">
            <label for="search">Search by University Name:</label>
            <input type="text" id="search" name="search" placeholder="Enter university name...">
            <br><br>
            <label for="country">Filter by Country:</label>
            <select id="country" name="country">
                <option value="">Select Country</option>
                <option value="Germany">Germany</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Australia">Australia</option>
            </select>
            <br><br>
            <label for="tuition_min">Filter by Tuition Cost Range:</label>
            <input type="number" id="tuition_min" name="tuition_min" placeholder="Min" step="any">
            <input type="number" id="tuition_max" name="tuition_max" placeholder="Max" step="any">
            <br><br>
            <label for="living_min">Filter by Living Cost Range:</label>
            <input type="number" id="living_min" name="living_min" placeholder="Min" step="any">
            <input type="number" id="living_max" name="living_max" placeholder="Max" step="any">
            <br><br>
            <input type="submit" name="apply_filters" value="Apply Filters">
        </form>

        <h2>University Information</h2>
        
        <table>
            <thead>
                <tr>
                    <th>University Name</th>
                    <th>Tuition Fee (avg)</th>
                    <th>Living Cost (avg)</th>
                    <th>Application Last Date</th>
                    <th>Location/Address</th>
                </tr>
            </thead>
            <tbody>
                
            <?php
include('connection.php');

$whereClause = "";
$havingClause = "";
$parameters = array();

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = '%' . $_GET['search'] . '%';
    $whereClause .= " AND e.Ins_Name LIKE ?";
    $parameters[] = $search;
}

if (isset($_GET['apply_filters'])) {
    if (!empty($_GET['country'])) {
        $whereClause .= " AND e.Country = ?";
        $parameters[] = $_GET['country'];
    }

    if (!empty($_GET['tuition_min'])) {
        $havingClause .= " HAVING AVG(p.Tuition_Fee) >= ?";
        $parameters[] = $_GET['tuition_min'];
    }
    if (!empty($_GET['tuition_max'])) {
        $havingClause .= " AND AVG(p.Tuition_Fee) <= ?";
        $parameters[] = $_GET['tuition_max'];
    }

    if (!empty($_GET['living_min'])) {
        $whereClause .= " AND h.Hall_Cost >= ?";
        $parameters[] = $_GET['living_min'];
    }
    if (!empty($_GET['living_max'])) {
        $whereClause .= " AND h.Hall_Cost <= ?";
        $parameters[] = $_GET['living_max'];
    }
}

$sql = "SELECT e.Ins_ID, e.Ins_Name, 
        COALESCE(AVG(p.Tuition_Fee), 0) AS Tuition_Fee, 
        COALESCE(AVG(h.Hall_Cost), 0) AS Hall_Cost, 
        e.App_Last_Date, 
        e.Location 
        FROM educational_institute e 
        LEFT JOIN program p ON p.Ins_ID = e.Ins_ID 
        LEFT JOIN hall h ON h.Ins_ID = e.Ins_ID
        WHERE 1=1 $whereClause 
        GROUP BY e.Ins_Name $havingClause";

$stmt = $con->prepare($sql);
$chartDataPoints = array();
if ($stmt) {
    if (!empty($parameters)) {
        $types = str_repeat('s', count($parameters));
        $stmt->bind_param($types, ...$parameters);
    }

    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $totalCost = $row["Tuition_Fee"] + $row["Hall_Cost"];
            $chartDataPoints[] = array("label" => $row["Ins_Name"], "y" => $totalCost);
            echo "<tr>";
            
            echo "<td><a href='uniDetailsU.php?name=" . urlencode($row["Ins_Name"]) . "'>" . $row["Ins_Name"] . "</a></td>";
            echo "<td>$" . number_format($row["Tuition_Fee"], 2) . "</td>";
            echo "<td>$" . number_format($row["Hall_Cost"], 2) . "</td>";
            echo "<td>" . $row["App_Last_Date"] . "</td>";
            echo "<td>" . $row["Location"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No universities found.</td></tr>";
    }
}
?>

            </tbody>
        </table>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "University Total Cost (Tuition + Living)"
                },
                axisY: {
                    title: "Total Cost (USD)"
                },
                data: [{
                   
                    type: "column",
                    dataPoints: <?php echo json_encode($chartDataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
        </script>
    </div>
</main>
<footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</body>
</html>

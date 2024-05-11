<?php
include('connection.php');

$selectedProgramID = null;
$searchKeyword = null;

if (isset($_GET['prog_ID'])) {
    $selectedProgramID = $_GET['prog_ID'];
}


if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
}

$sqlPrograms = "SELECT Prog_ID, Program_Name FROM Program";
$resultPrograms = mysqli_query($con, $sqlPrograms);
$programs = mysqli_fetch_all($resultPrograms, MYSQLI_ASSOC);


$sql = "SELECT Faculty_name, Designation, Email FROM Faculty";


if ($selectedProgramID !== null) {
    $sql .= " WHERE Program_ID=$selectedProgramID";
}

if ($searchKeyword !== null) {
    if ($selectedProgramID !== null) {
        $sql .= " AND Faculty_name LIKE '%$searchKeyword%'";
    } else {
        $sql .= " WHERE Faculty_name LIKE '%$searchKeyword%'";
    }
}



$result = mysqli_query($con, $sql);

$facultyList = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-right: 10px;
        }
        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        button[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
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
            <img src="http://localhost/phpt/Image/logo.jpg" alt="Logo" class="logo">
        </div>
        <h1>Higher Education in Abroad</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="institute.php">Institute</a></li>
                <li><a href="login.php"><span class="login-icon">&#x1F512;</span>Login</a></li>
                <li><a href="register.php"><span class="register-icon">&#x1F4E6;</span>Register</a></li>
                
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <a href="javascript:history.go(-1)" class="back-button" onclick="goBack()">Back</a>
            <h2>Faculty List</h2>
            <form method="GET" action="facultyInfo.php<?php if(isset($_GET['prog_ID'])) echo '?prog_ID=' . $_GET['prog_ID']; ?>">
    <label for="search">Search by Faculty Name:</label>
    <input type="text" id="search" name="search" placeholder="Enter faculty name">
    <input type="hidden" name="prog_ID" value="<?php echo isset($_GET['prog_ID']) ? $_GET['prog_ID'] : ''; ?>">
    <button type="submit">Search</button>
</form>


            <div>
                <h3>Faculty Members:</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                    </tr>
                    <?php foreach ($facultyList as $faculty) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($faculty['Faculty_name']); ?></td>
                            <td><?php echo htmlspecialchars($faculty['Designation']); ?></td>
                            <td><?php echo htmlspecialchars($faculty['Email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</body>
</html>

<?php
include('connection.php');

$ProgramID = null;
$searchKeyword = null;

if (isset($_GET['prog_ID'])) {
    $ProgramID = $_GET['prog_ID'];
}

if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
}

$sqlF = "SELECT Faculty_name, Designation, Email FROM Faculty";

if ($ProgramID !== null) {
    $sqlF .= " WHERE Program_ID = $ProgramID";
}

if ($searchKeyword !== null) {
    if ($ProgramID !== null) {
        $sqlF .= " AND Faculty_name LIKE '%$searchKeyword%'";
    } else {
        $sqlF .= " WHERE Faculty_name LIKE '%$searchKeyword%'";
    }
}

$resultF = mysqli_query($con, $sqlF);
$facultyList = mysqli_fetch_all($resultF, MYSQLI_ASSOC);
?>


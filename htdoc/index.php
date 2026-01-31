<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higher Education in Abroad</title>
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

        main {
            padding: 20px;
        }

       
        .about-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
            gap: 10px; 
        }

        .about {
            text-align: left;
        }

        .about h2 {
            margin-bottom: 10px;
        }

        .about p {
            max-width: 800px; 
            font-size: 18px; 
        }

        table {
            width: 100%;
        }

        td {
            padding: 20px;
            vertical-align: top;
        }

        img.logo {
            max-width: 80px; 
            height: auto;
        }

        img.frontImg {
            width: 70%; 
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
        <table>
            <tr>
                <td>
                    <div class="about-container">
                        <img src="http://localhost/phpt/Image/frontImg.jpg" alt="Front Image" class="frontImg">
                        <div class="about">
                            <h2>About</h2>
                            <p>Our website provides a comprehensive platform for higher education opportunities abroad. Users can explore universities from various countries, apply for admission, check requirements, and find relevant announcements. Whether you're planning to study abroad for undergraduate or graduate programs, our platform offers the resources you need to make informed decisions and pursue your academic goals.</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </main>

    <footer class="footer">
        <p>If you encounter any problems, please feel free to contact us via email at <a href="mailto:info@example.com">info@sos.com</a>.</p>
        <p>We are here to help!</p>
    </footer>
</body>
</html>

<?php
if (!session_id()) {
    session_start();
}

require 'sanitize.php';

$url = sanitizeString(INPUT_GET, 'url');

if (isset($url)) {
    $_SESSION['targetURL'] = $url;
} else {
    $_SESSION['targetURL'] = 'userPage.php';
}

$clickIt = sanitizeString(INPUT_POST, 'clickIt');

$emailError = $passwordError = '';

if (isset($clickIt)) {
    $email = trim(sanitizeString(INPUT_POST, 'email'));
    $pWord = trim(sanitizeString(INPUT_POST, 'passWord'));

    if ($email == "" || $pWord == "") {
        $emailError = "Please enter both an email and password.";
    } else {
        require 'dbConnect.php';
        require 'callQuery.php';

        $query = "SELECT pWord FROM users WHERE email = '$email'";
        $errorMessage = 'Error fetching user account info';
        $passWord = callQuery($pdo, $query, $errorMessage)->fetchColumn();

        if (password_verify($pWord, $passWord)) {
            $_SESSION['authenticated'] = true;
            header("Location: $_SESSION[targetURL]");
            exit(); // Make sure to exit after redirect
        } else {
            $passwordError = "Invalid credentials. If you don't have an account, <a href='makeAccounts.php'>create one here</a>.";
        }
    }
} else {
    $logOut = sanitizeString(INPUT_GET, 'logOut');
    if (isset($logOut) && $logOut == 1) {
        unset($_SESSION['authenticated']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Galactic Explorer Admin Login Page</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <style>
        body {
            text-align: center;
        }
        
        form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        
        form label,
        form input {
            margin: 5px;
            width: 100%;
        }

        a:visited {
            
        }

        @media (min-width: 600px) {
            form {
                max-width: 400px;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Galactic Explorer</h1>
        <nav>
            <ul>
                <li><a href="views/index.php">Home</a></li>
                <li><a href="views/stars.php">Stars</a></li>
                <li><a href="views/planets.php">Planets</a></li>
                <li><a href="views/about.php">About</a></li>
            </ul>
            <input type="text" placeholder="Search...">
        </nav>
    </header>
        <h2>Please login to gain user access</h2>

        <form style="margin: 0 auto; width: 50%;" action="" method="post">
            <label for="email">Email:</label>
            <input type="text" placeholder="Email" name="email" id="email">
            <br><br>

            <label for="passWord">Password:</label>
            <input type="password" placeholder="Password" name="passWord" id="passWord">
            <br><br>

            <p style="color: red;"><?php echo $emailError; ?></p>
            <p style="color: red;"><?php echo $passwordError; ?></p>

            <input type="submit" name="clickIt" value="Log In">
        </form>

        <h3>If you don't have an account <br>
            <a style="color: inherit;" href='makeAccounts.php'>create one here</a>.
        </h3>
    </header>

</body>

</html>
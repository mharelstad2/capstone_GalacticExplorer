<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Galactic Explorer Account</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <style>
        /* Existing styles */

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
            color: white;
        }

        @media (min-width: 600px) {
            form {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        .success-message {
            color: green;
            margin-top: 10px;
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

    <?php
    ini_set('display_errors', 1);
    error_reporting(-1);

    // Connect to our DB server and select our DB
    require 'dbConnect.php';

    $emailError = $passwordError = $successMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if the email is already used
        $emailExistsQuery = "SELECT COUNT(*) FROM users WHERE email = ?";
        $stmt = $pdo->prepare($emailExistsQuery);
        $stmt->execute([$email]);
        $emailExists = $stmt->fetchColumn();

        // Validate input
        if ($emailExists) {
            $emailError = "Email is already in use. Please choose a different one.";
        }

        if ($password !== $confirmPassword) {
            $passwordError = "Password and Confirm Password do not match.";
        }

        if (empty($emailError) && empty($passwordError)) {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into the users table
            try {
                $pdo->beginTransaction();

                // Reminder, $s is a PDOStatement object
                $s = $pdo->prepare("INSERT INTO users (email, pWord) VALUES (?, ?)");

                $s->execute([$email, $hashedPassword]);

                $pdo->commit();

                $successMessage = 'Account created successfully!';
            } catch (PDOException $ex) {
                $pdo->rollBack();

                $error = 'Error performing insert of new user: ' . $ex->getMessage();
                echo "<p style='color: red;'>$error</p>";
                throw $ex;
            }
        }
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <p style="color: red;"><?php echo $emailError; ?></p>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <p style="color: red;"><?php echo $passwordError; ?></p>

        <input type="submit" value="Create Account">
    </form>

    <p style="text-align: center;" class="success-message"><?php echo $successMessage; ?></p>

</body>

</html>
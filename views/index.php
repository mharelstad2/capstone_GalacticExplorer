<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/styles.css">
  <title>Galactic Explorer - Home</title>
</head>

<body>
  <header>
    <h1>Galactic Explorer</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="stars.php">Stars</a></li>
        <li><a href="planets.php">Planets</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="../login.php">Login</a></li>
      </ul>
      <input type="text" placeholder="Search...">
    </nav>
  </header>

  <main>
    <p>Welcome to the Galactic Explorer! Choose a destination to explore the wonders of the universe.</p>
    <button onclick="redirectToLogin()">Login</button>
    <p> or create an account to get more space facts and discoveries.</p>
    <!-- Removed the search input from here -->
  </main>

  <footer>
    <p>&copy; 2023 Galactic Explorer</p>
  </footer>

  <script>
    function redirectToLogin() {
      window.location.href = "../login.php";
    }
  </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/styles.css">
  <style>
    .solar-system {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 60vh;
    }

    .planet-container {
      margin: 0 10px;
      text-align: center;
    }

    .planet {
      width: 100px;
      height: 100px;
      margin-bottom: 10px;
      border-radius: 50%;
      cursor: pointer;
      /* Add cursor pointer for better UX */
    }

    .planet a {
      text-decoration: none;
      color: #333;
      display: block;
    }

    .planet a:hover {
      color: #FFD700;
    }

    .planet-name {
      font-size: 16px;
      color: #333;
      font-weight: bold;
      margin-top: 5px;
      text-decoration: none !important;
      /* Add !important to override other styles */
    }
  </style>
  <title>Galactic Explorer - Planets</title>
</head>

<body>
  <header>
    <h1>Galactic Explorer</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="stars.php">Stars</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="../login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="solar-system">
      <div class="planet-container">
        <a href="/slideshow/mercury" onclick="goToSlideshow('/slideshow/mercury')">
          <img class="planet" src="../public/img/mercury.jpg" alt="Mercury">
          <div class="planet-name">Mercury</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/venus" onclick="goToSlideshow('/slideshow/venus')">
          <img class="planet" src="../public/img/venus.jpg" alt="Venus">
          <div class="planet-name">Venus</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/earth" onclick="goToSlideshow('/slideshow/earth')">
          <img class="planet" src="../public/img/earth.jpg" alt="Earth">
          <div class="planet-name">Earth</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/mars" onclick="goToSlideshow('/slideshow/mars')">
          <img class="planet" src="../public/img/mars.jpg" alt="Mars">
          <div class="planet-name">Mars</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/jupiter" onclick="goToSlideshow('/slideshow/jupiter')">
          <img class="planet" src="../public/img/jupiter.jpg" alt="Jupiter">
          <div class="planet-name">Jupiter</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/saturn" onclick="goToSlideshow('/slideshow/saturn')">
          <img class="planet" src="../public/img/saturn.jpg" alt="Saturn">
          <div class="planet-name">Saturn</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/uranus" onclick="goToSlideshow('/slideshow/uranus')">
          <img class="planet" src="../public/img/uranus.jpg" alt="Uranus">
          <div class="planet-name">Uranus</div>
        </a>
      </div>
      <div class="planet-container">
        <a href="/slideshow/neptune" onclick="goToSlideshow('/slideshow/neptune')">
          <img class="planet" src="../public/img/neptune.jpg" alt="Neptune">
          <div class="planet-name">Neptune</div>
        </a>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2023 Galactic Explorer</p>
  </footer>

  <script>
    function goToSlideshow(url) {
      window.location.href = url;
    }
  </script>

</body>

</html>
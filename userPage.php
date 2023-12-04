<?php
session_start();

// Use session data to check if the user trying to access
// this page is authenticated.  If not, we'll redirect them
// to our login page.
require 'authenticate.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Space Exploration</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0 auto;
            padding: 1.25rem;
        }

        h1 {
            color: #333;
            border-bottom: 0.125rem solid #333;
            padding-bottom: 0.625rem;
        }

        h2 {
            color: #333;
            margin-top: 1.25rem;
        }

        p {
            color: #555;
        }

        .space-fact {
            margin-bottom: 0.9375rem;
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
    <h1>Space Exploration Facts</h1>

    <h2>30 Space Facts</h2>
    <div class="space-fact">1. Space is completely silent because there is no air or medium for sound to travel.</div>
    <div class="space-fact">2. The largest volcano in the solar system is on Mars and is called Olympus Mons.</div>
    <div class="space-fact">3. Jupiter is so massive that it could fit more than 1,300 Earths inside it.</div>
    <div class="space-fact">4. The Great Red Spot on Jupiter is a storm that has been raging for at least 350 years.</div>
    <div class="space-fact">5. The Sun makes up 99.86% of the total mass of our solar system.</div>
    <div class="space-fact">6. The largest known star, UY Scuti, is over 1,700 times the diameter of the Sun.</div>
    <div class="space-fact">7. A day on Venus is longer than a year because it takes Venus about 243 Earth days to complete one rotation.</div>
    <div class="space-fact">8. There are more stars in the universe than there are grains of sand on all the beaches on Earth.</div>
    <div class="space-fact">9. The Milky Way galaxy is estimated to contain over 100 billion stars.</div>
    <div class="space-fact">10. A spoonful of a neutron star would weigh about 6 billion tons.</div>
    <div class="space-fact">11. The closest galaxy to the Milky Way is the Andromeda Galaxy, located about 2.5 million light-years away.</div>
    <div class="space-fact">12. Black holes are so dense that nothing, not even light, can escape their gravitational pull.</div>
    <div class="space-fact">13. The Voyager 1 spacecraft, launched in 1977, has reached interstellar space and is the farthest human-made object from Earth.</div>
    <div class="space-fact">14. The Moon is gradually moving away from Earth at a rate of about 1.5 inches (3.8 cm) per year.</div>
    <div class="space-fact">15. Saturn's rings are made mostly of particles of ice, with some particles as small as grains of sand and others as large as mountains.</div>
    <div class="space-fact">16. Space is not completely empty; it contains a very low density of particles, including atoms and molecules.</div>
    <div class="space-fact">17. The Hubble Space Telescope has provided stunning images of distant galaxies and helped determine the rate of expansion of the universe.</div>
    <div class="space-fact">18. The temperature on the surface of the Sun is about 5,500 degrees Celsius (9,932 degrees Fahrenheit).</div>
    <div class="space-fact">19. The first human to orbit the Earth was Yuri Gagarin, a Soviet cosmonaut, in 1961.</div>
    <div class="space-fact">20. The International Space Station (ISS) orbits the Earth at an average altitude of about 250 miles (400 km).</div>
    <div class="space-fact">21. The largest moon in the solar system is Ganymede, a moon of Jupiter.</div>
    <div class="space-fact">22. The universe is approximately 13.8 billion years old, based on observations of the cosmic microwave background radiation.</div>
    <div class="space-fact">23. The concept of black holes was first proposed by physicist John Michell in a letter written in 1783.</div>
    <div class="space-fact">24. The nearest known exoplanet, Proxima Centauri b, is located in the habitable zone of its star.</div>
    <div class="space-fact">25. One teaspoon of a neutron star weighs about 6 billion tons.</div>
    <div class="space-fact">26. The Great Wall of China is not visible from space with the naked eye, contrary to popular belief.</div>
    <div class="space-fact">27. A day on Pluto, the dwarf planet, is about 6.4 Earth days long.</div>
    <div class="space-fact">28. The Oort Cloud is a hypothetical region of icy objects located far beyond the orbit of Pluto.</div>
    <div class="space-fact">29. The concept of dark matter is proposed to explain the gravitational effects observed in the universe, despite not being directly visible.</div>
    <div class="space-fact">30. The James Webb Space Telescope, set to launch, is the successor to the Hubble Space Telescope and is designed to study the universe in infrared wavelengths.</div>

    <h2>Recent Space Discoveries</h2>
    <div class="space-fact">
        <h3>Discovery 1: Water on Mars</h3>
        <p>In recent years, scientists have discovered evidence of liquid water on Mars, suggesting the possibility of past or even present life.</p>
    </div>

    <div class="space-fact">
        <h3>Discovery 2: Proxima Centauri b</h3>
        <p>Proxima Centauri b is an exoplanet orbiting the closest star to our solar system, Proxima Centauri. It is located in the habitable zone, making it a potential candidate for extraterrestrial life.</p>
    </div>

    <div class="space-fact">
        <h3>Discovery 3: Gravitational Waves</h3>
        <p>Gravitational waves, ripples in spacetime caused by violent events like merging black holes, were directly detected for the first time, confirming a prediction of Albert Einstein's theory of general relativity.</p>
    </div>

</body>

</html>
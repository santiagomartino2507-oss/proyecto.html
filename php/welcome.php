<?php // Start PHP
session_start(); // Load the current session


if (!isset($_SESSION['username'])) { // Check for a missing session username
    header('Location: /proyecto.html/index.php?view=login&error=Please log in first'); // Return to login with the error
    exit(); // Stop before the home page
} // End the session check

header('Location: /proyecto.html/pages/paginaprincipal.php'); // Send the user to the home page
exit(); // Stop running this file

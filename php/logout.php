<?php // Start PHP


session_start(); // Load the current session
session_unset(); // Clear the session data
session_destroy(); // Destroy the session on the server

header('Location: /proyecto.html/pages/paginaprincipal.php'); // Send the user to the home page
exit(); // Stop running this file

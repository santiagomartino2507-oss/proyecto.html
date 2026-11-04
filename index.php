<?php 


$view = $_GET['view'] ?? ''; // Read the view, or use empty text
if (is_string($view) && in_array($view, ['paginaprincipal', 'login', 'register'], true)) { // Check view type and allowed pages

    $viewFile = __DIR__ . '/pages/' . $view . '.php'; // Create the url
    if (file_exists($viewFile)) { // Check if the file exists
        include_once $viewFile; // Load and show the page once
        exit; // Stop after loading the page
    } // End the file check
} // End the allowed page check


header('Location: /proyecto.html/pages/paginaprincipal.php'); // Send the user to the home page
exit; // Stop running this file

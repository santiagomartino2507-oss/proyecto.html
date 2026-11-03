<?php // Start PHP.

$servername = "localhost"; // Use the local database server.
$username = "root"; // MySQL administrator username.
$password = ""; // Empty password for this local connection.
$dbname = "registration"; // Database name.


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Allow catch to handle MySQL errors.
try { // Try the database connection.
    $conn = new mysqli($servername, $username, $password, $dbname); // Open the connection using the settings above.

    $conn->set_charset('utf8mb4'); // Handle accents, ñ and emojis correctly.
} catch (mysqli_sql_exception $error) { // Catch the database error in $error.

    error_log($error->getMessage()); // Save the error message in the server log.
    http_response_code(503); // Send the service unavailable status.
    exit('Database unavailable. Please try again later.'); // Stop PHP and show the database error message.
} // End the catch block.

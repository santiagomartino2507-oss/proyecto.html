<?php // Start PHP.
session_start(); // Keep track of the logged-in user.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { // Check for a non-POST request.
    header('Location: /proyecto.html/index.php?view=login'); // Go to the login form.
    exit; // Stop the script.
} // End the request check.

$input_user = $_POST['username'] ?? ''; // Get the submitted username.
$input_pass = $_POST['password'] ?? ''; // Get the submitted password.
if (!is_string($input_user) || !is_string($input_pass) || trim($input_user) === '' || $input_pass === '') { // Check the data types and empty fields.
    header('Location: /proyecto.html/index.php?view=login&error=' . urlencode('Please fill in both username and password.')); // Return to the form with an error in the URL.
    exit; // Stop the script.
} // End the input check.

require_once __DIR__ . '/db_connect.php'; // Load the database connection.
$location = '/proyecto.html/index.php?view=login&error=' . urlencode('Invalid username or password'); // Where to go if login fails.
try { // Try the database steps.
    $stmt = $conn->prepare('SELECT username, password FROM users WHERE username = ?'); // Prepare the user search.
    $stmt->bind_param('s', $input_user); // Which username to search for.
    $stmt->execute(); // Run the query.
    $result = $stmt->get_result(); // Get the result.

    if ($result->num_rows === 1) { // Check if the account was found
        $user = $result->fetch_assoc(); // Get that account's data.
        if (password_verify($input_pass, $user['password'])) { // Check if the password is correct
            session_regenerate_id(true); // New session ID for security.
            $_SESSION['username'] = $user['username']; // Remember who logged in.
            $location = '/proyecto.html/php/welcome.php'; // Where to go after a successful login.
        } // End the password check.
    } // End the account check.
    $stmt->close(); // Close the prepared statement.
} catch (mysqli_sql_exception $error) { // Catch the database error in $error.
    error_log($error->getMessage()); // Save the error message in the server log.
    $location = '/proyecto.html/index.php?view=login&error=' . urlencode('Login unavailable. Please try again later.'); // Save the login URL and error message.
} // End the catch block.

$conn->close(); // Close the database connection.
header('Location: ' . $location); // Send the user to the saved URL.
exit; // Stop this PHP script.

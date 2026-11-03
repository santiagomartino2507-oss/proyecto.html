<?php // Start PHP.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { // Only accept POST requests.
    header('Location: /proyecto.html/index.php?view=register'); // Return to the registration form.
    exit; // Stop running this file.
} // End the request check.

$user = $_POST['username'] ?? ''; // Read username, or use empty text.
$pass = $_POST['password'] ?? ''; // Read password, or use empty text.
$message = ''; // Start with no error message.



if (!is_string($user) || !is_string($pass) || // Check that both inputs are text.
    mb_strlen($user, 'UTF-8') < 5 || mb_strlen($user, 'UTF-8') > 20 || // Check username length: 5 to 20.
    mb_strlen($pass, 'UTF-8') < 5 || mb_strlen($pass, 'UTF-8') > 20) { // Check password length: 5 to 20.
    $message = 'Username and password must be between 5 and 20 characters.'; // Store the length error message.
} elseif (!preg_match('/[a-zA-Z]/', $user) || !preg_match('/[0-9]/', $user)) { // Require a letter and a number.
    $message = 'Username must contain at least one letter and one number.'; // Store the username error message.
} elseif (!preg_match('/[a-z]/', $pass) || !preg_match('/[A-Z]/', $pass) || // Require lowercase and uppercase letters.
    !preg_match('/[0-9]/', $pass) || !preg_match('/[!@#$%^&*()_+\-=\[\]{};\x27":\\\\|,.<>\/?]/', $pass)) { // Require a number and a symbol.
    $message = 'Password must contain a lowercase, uppercase, number, and special character.'; // Store the password error message.
} // End the validation checks.

if ($message !== '') { // Check if an error was found.
    header('Location: /proyecto.html/index.php?view=register&error=' . urlencode($message)); // Return with the error in the URL.
    exit; // Stop before saving invalid data.
} // End the error check.

require_once __DIR__ . '/db_connect.php'; // Load the database connection
try { // Try creating the account

    $hashed_password = password_hash($pass, PASSWORD_BCRYPT); // Hash the password and store the result

    $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)'); // Prepare the query to create an account
    $stmt->bind_param('ss', $user, $hashed_password); // Assign username and hash to the placeholders
    $stmt->execute(); // Run the query
    $stmt->close(); // Close the prepared query
    $location = '/proyecto.html/index.php?view=login&success=' . urlencode('Registration successful! Please log in.'); // Store login URL and success message
} catch (mysqli_sql_exception $error) { // Catch the database error in $error

    error_log($error->getMessage()); // Store the message in the server log
    $message = $error->getCode() === 1062 // Check duplicated data
        ? 'Registration failed. Username may exist.' // Message if the username already exists
        : 'Registration failed. Please try again later.'; // Message for other database errors
    $location = '/proyecto.html/index.php?view=register&error=' . urlencode($message); // Store register URL and error message
} // End the catch block


$conn->close(); // Close the database connection
header('Location: ' . $location); // Send the user to the saved URL
exit; // Stop running this file

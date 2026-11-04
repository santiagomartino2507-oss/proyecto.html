<!DOCTYPE html> <!-- Use HTML5. -->
<html lang="en"> <!-- Set the initial page language. -->

<head> <!-- Start the page settings. -->
    <meta charset="UTF-8"> <!-- Use UTF-8 for text. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Use the device width. -->
    <title>Register | Pitch Point</title> <!-- Set the registration tab title. -->
    <link rel="stylesheet" href="/proyecto.html/assets/css/style.css"> <!-- Load the shared styles. -->
</head> <!-- End the page settings. -->

<body> <!-- Start the visible content. -->
    <a href="/proyecto.html/pages/paginaprincipal.php" class="back-button" data-i18n="back-btn">← Back</a> <!-- Go back to the home page. -->


    <button id="lang-toggle" class="lang-btn-fixed" onclick="toggleLanguage()"> <!-- Switch languages on click. -->
        <img id="lang-flag" src="https://flagcdn.com/24x18/mx.png" alt="Switch to Spanish"> <!-- Show the language flag and its alt text. -->
    </button> <!-- Close the language button. -->

    <div class="profile"> <!-- Group the account form and links. -->
        <h1 data-i18n="register-title">Create Account</h1> <!-- Show the translatable registration heading. -->

        <form id="registerForm" action="/proyecto.html/php/register.php" method="post"> <!-- Send registration details to PHP with POST. -->
            <label for="username" data-i18n="register-username">Username</label> <!-- Connect the label to the username field. -->
            <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="username" required /> <!-- Require a username and allow autofill. -->
            <label for="password" data-i18n="register-password">Password</label> <!-- Connect the label to the password field. -->
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="new-password" required /> <!-- Hide typed characters and identify a new password. -->

            <div id="feedback" role="status" aria-live="polite"></div> <!-- Show feedback without interrupting screen readers. -->
            <button type="submit" data-i18n="register-btn">Register</button> <!-- Submit the registration form. -->
        </form> <!-- Close the form. -->
        <span> <!-- Group the account prompt and link. -->
            <span data-i18n="register-login-text">Already have an account?</span> <!-- Ask if the user already has an account. -->
            <a href="/proyecto.html/index.php?view=login" data-i18n="register-login-link">Login</a> <!-- Link to the login form. -->
        </span> <!-- Close the account prompt. -->
    </div> <!-- Close the account panel. -->

    <script src="/proyecto.html/assets/js/script.js"></script> <!-- Load form validation and feedback. -->
    <script src="/proyecto.html/assets/js/translation.js"></script> <!-- Load the translation script. -->
</body> <!-- End the visible content. -->

</html> <!-- Close the HTML document. -->

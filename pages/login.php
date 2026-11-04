<!DOCTYPE html> <!-- Use HTML5. -->
<html lang="en"> <!-- Set the initial page language. -->

<head> <!-- Start the page settings. -->
    <meta charset="UTF-8"> <!-- Use UTF-8 for text. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Use the device width. -->
    <title>Login | Pitch Point</title> <!-- Set the login tab title. -->
    <link rel="stylesheet" href="/proyecto.html/assets/css/style.css"> <!-- Load the shared styles. -->
</head> <!-- End the page settings. -->

<body> <!-- Start the visible content. -->

    <a href="/proyecto.html/pages/paginaprincipal.php" class="back-button" data-i18n="back-btn">← Back</a> <!-- Go back to the home page. -->


    <button id="lang-toggle" class="lang-btn-fixed" onclick="toggleLanguage()"> <!-- Switch languages on click. -->
        <img id="lang-flag" src="https://flagcdn.com/24x18/mx.png" alt="Switch to Spanish"> <!-- Show the language flag and its alt text. -->
    </button> <!-- Close the language button. -->

    <div class="profile"> <!-- Group the account form and links. -->

        <h1 data-i18n="login-title">Welcome Back</h1> <!-- Show the translatable login heading. -->

        <form id="login-form" action="/proyecto.html/php/login.php" method="post"> <!-- Group the fields and send their values to PHP using POST. -->

            <label for="username" data-i18n="login-username">Username</label> <!-- Clicking this text focuses the username field. -->
            <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="username" required> <!-- Require a username and allow autofill. -->

            <label for="password" data-i18n="login-password">Password</label> <!-- Clicking this text focuses the password field. -->
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required> <!-- Hide typed characters and allow saved passwords. -->


            <div id="feedback" role="status" aria-live="polite"></div> <!-- Show feedback without interrupting screen readers. -->

            <button type="submit" data-i18n="login-btn">Sign In</button> <!-- Submit the login form. -->

        </form> <!-- Close the form. -->
        <span> <!-- Keep the question and link together. -->
            <span data-i18n="login-register-text">Don't have an account?</span> <!-- Translate this question separately from the link. -->
            <a href="/proyecto.html/index.php?view=register" data-i18n="login-register-link">Register</a> <!-- Link to the registration form. -->
        </span> <!-- Close the account prompt. -->
    </div> <!-- Close the account panel. -->


    <script src="/proyecto.html/assets/js/script.js"></script> <!-- Load form validation and feedback. -->
    <script src="/proyecto.html/assets/js/translation.js"></script> <!-- Load the translation script. -->
</body> <!-- End the visible content. -->

</html> <!-- Close the HTML document. -->

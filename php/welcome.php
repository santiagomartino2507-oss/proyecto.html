<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: /proyecto.html/index.php?view=login&error=Please log in first');
    exit();
}

header('Location: /proyecto.html/pages/paginaprincipal.php');
exit();

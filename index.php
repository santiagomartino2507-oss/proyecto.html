<?php


$view = $_GET['view'] ?? '';
if (is_string($view) && in_array($view, ['paginaprincipal', 'login', 'register'], true)) {

    $viewFile = __DIR__ . '/pages/' . $view . '.php';
    if (file_exists($viewFile)) {
        include_once $viewFile;
        exit;
    }
}


header('Location: /proyecto.html/pages/paginaprincipal.php');
exit;

<?php
// settings, variables and constant variables
define('TEMPLATES_URL', __DIR__ . '/templates/');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');
define('IMAGES_DIR', __DIR__ . '/../images/');


function formatSeparator($path)
{
    if (DIRECTORY_SEPARATOR === "\\") {
        $path = str_replace('/', '\\', $path);
    } else {
        $path = str_replace('\\', '/', $path);
    }
    return $path;
}
function includeTemplate(string $templateName, bool $homePage = false)
{
    $templatePath = TEMPLATES_URL . $templateName . '.php';
    $templatePath = formatSeparator($templatePath);
    include $templatePath;
}
//check user's session
function isAuthenticated(): void
{
    session_start();

    $auth = $_SESSION["loggedin"] ?? null;

    if (!$auth) {
        header("location: /");
    }
}

function debugAndFormat($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}
//escape HTML
function stzr(string $html): string
{
    if (is_null($html)) {
        $html = '';
    }
    $s = htmlspecialchars($html);
    return $s;
}
//validate type of content
function validateContentType(string $type)
{
    $types = ['property', 'seller'];
    return in_array($type, $types);
}
//show notification
function showNotification($code): string | bool
{
    $message = '';
    $code = intval($code, 10);

    switch ($code) {
        case 1:
            $message = "Creado con exito!";
            break;
        case 2:
            $message = "Actualizado con exito!";
            break;
        case 3:
            $message = "Eliminado con exito!";
            break;
        case 4:
            $message = "Algo salío mal..";
            break;
        default:
            $message = false;
            break;
    }
    return $message;
}

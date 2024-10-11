<?php
// settings, variables and constant variables
define('TEMPLATES_URL', __DIR__ . '/templates/');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');


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
function isAuthenticated(): bool
{
    session_start();

    $auth = $_SESSION["loggedin"] ?? null;

    if ($auth) {
        return true;
    }

    return false;
}

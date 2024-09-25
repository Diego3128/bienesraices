<?php
require 'app.php';
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

<?php
require '../includes/functions.php';

includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Administrador de bienesraices</h2>
    <a href="/admin/properties/create.php" class="btnSmall btnSmall--green">Crear</a>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
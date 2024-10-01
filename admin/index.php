<?php
require '../includes/functions.php';
includeTemplate(templateName: 'header');

$creaded = $_GET["created"] ?? null;
$creaded = intval($creaded, 10);
?>

<main class="container section">
    <h2>Administrador de bienesraices</h2>

    <?php if ($creaded): ?>
        <div class="alert success">Propiedad creada con exito!</div>
    <?php endif; ?>

    <a href="/admin/properties/create.php" class="btnSmall btnSmall--green">Crear</a>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
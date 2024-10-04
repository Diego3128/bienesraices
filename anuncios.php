<?php
require './includes/functions.php';
includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Casas y aptos a la venta</h2>

    <?php
    // properties to show
    $numProperties = 15;
    include 'includes/templates/anuncios.php' ?>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
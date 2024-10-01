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

    <table class="properties">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>111</td>
                <td>titulooo</td>
                <td><img src="/images/05a4669c0af9203f14d912020f7bf030.jpg" class="table-img" alt="property image"></td>
                <td>100</td>
                <td>
                    <a href="#" class="btnLarge btnLarge--red">Eliminar</a>
                    <a href="#" class="btnLarge btnLarge--blue">Actualizar</a>
                </td>
            </tr>
        </tbody>

    </table>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
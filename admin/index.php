<?php
// Shows conditional alert message
//1 = created, 2= updated, 3= deleted
$result = $_GET["result"] ?? null;
$result = intval($result, 10);

// get properties from database

// import conexion
require '../includes/config/database.php';

//create an instance of the conexion
$db = connectToDB();

// sql query (bring all properties)
$propertySqlQuery = "SELECT * FROM propiedades";

//do the query to the db
$propertyResult = mysqli_query($db, $propertySqlQuery);

// include header template
require '../includes/functions.php';
includeTemplate(templateName: 'header');

?>

<main class="container section">
    <h2>Administrador de bienesraices</h2>

    <?php if ($result === 1): ?>
        <div class="alert success">Propiedad creada con exito!</div>
    <?php elseif ($result === 2): ?>
        <div class="alert success">Propiedad actualizada con exito!</div>
    <?php endif; ?>

    <a href="/admin/properties/create.php" class="btnSmall btnSmall--green">Crear</a>

    <div class="table-container">
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

            <tbody><!-- show query results -->
                <?php while ($property = mysqli_fetch_assoc($propertyResult)): ?>
                    <tr>
                        <td><?php echo $property["id"]; ?></td>
                        <td><?php echo $property["titulo"]; ?></td>
                        <td><img src="/images/<?php echo $property["imagen"]; ?>" class="table-img" alt="property image"></td>
                        <td><?php echo $property["precio"]; ?></td>
                        <td>
                            <a href="#" class="btnLarge btnLarge--red">Eliminar</a>
                            <a href="properties/update.php?id=<?php echo $property["id"]; ?>" class=" btnLarge btnLarge--blue">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>

        </table>
    </div>

</main>

<?php
// close db conexion
mysqli_close($db);

includeTemplate(templateName: 'footer');
?>
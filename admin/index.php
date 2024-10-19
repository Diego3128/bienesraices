<?php
require '../includes/app.php';
//authenticate user
isAuthenticated();

// Shows conditional alert message
//1 = created, 2= updated, 3= deleted 4= error
$result = $_GET["result"] ?? null;
$result = intval($result, 10);

//use Propiedad class
use App\Propiedad;

//Stactic method to obtain all properties from db
$properties = Propiedad::all();

// get property's id to delete
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $propertyId = intval($_POST["id"]);
    $propertyId = filter_var($propertyId, FILTER_VALIDATE_INT);

    if ($propertyId) {
        $propiedad = Propiedad::findById($propertyId);
        if ($propiedad) $propiedad->delete();
    }
}
// include header template
includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Administrador de bienesraices</h2>

    <?php if ($result === 1): ?>
        <div class="alert success">Propiedad creada con exito!</div>
    <?php elseif ($result === 2): ?>
        <div class="alert success">Propiedad actualizada con exito!</div>
    <?php elseif ($result === 3): ?>
        <div class="alert success">Propiedad eliminada correctamente!</div>
    <?php elseif ($result === 4): ?>
        <div class="alert success">Algo salió mal!</div>
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
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?php echo $property->id; ?></td>
                        <td><?php echo $property->titulo; ?></td>
                        <td><img src="/images/<?php echo $property->imagen; ?>" class="table-img" alt="property image"></td>
                        <td><?php echo $property->precio; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id" value=<?php echo $property->id; ?>>
                                <input type="submit" class="btnLarge btnLarge--red" value="Eliminar">
                            </form>
                            <a href="properties/update.php?id=<?php echo $property->id; ?>" class=" btnLarge btnLarge--blue">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>

</main>

<?php
includeTemplate(templateName: 'footer');
?>
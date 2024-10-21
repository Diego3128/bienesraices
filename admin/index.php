<?php
require '../includes/app.php';
//authenticate user
isAuthenticated();

// Shows conditional alert message
$result = $_GET["result"] ?? '';

//use Propiedad class
use App\Propiedad;
//use Vendedor class
use App\Vendedor;

//Stactic method to obtain all records from db
$properties = Propiedad::all();
$sellers = Vendedor::all();

// get objects's id to delete
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //validate id
    $id = intval($_POST["id"]);
    $id = filter_var($id, FILTER_VALIDATE_INT);
    //type of content (property || seller)
    $type = $_POST["type"];
    //check correct type
    if (validateContentType($type) && $id) {
        //identify the type
        if ($type === "property") {
            $propiedad = Propiedad::findById($id);
            if ($propiedad) $propiedad->delete();
        } elseif ($type === "seller") {
            $vendedor = Vendedor::findById($id);
            if ($vendedor) $vendedor->delete();
        }
    }
}
// include header template
includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Administrador de bienesraices</h2>

    <?php
    $message = showNotification($result);
    if ($message): ?>
        <div class="alert success"><?php echo stzr($message); ?></div>
    <?php
    endif;
    ?>


    <a href="/admin/properties/create.php" class="btnSmall btnSmall--green">Crear propiedad</a>

    <a href="/admin/sellers/create.php" class="btnSmall btnSmall--yellow">Crear vendedor</a>

    <h2>Propiedades</h2>

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
                                <input type="hidden" name="type" value="property">
                                <input type="submit" class="btnLarge btnLarge--red" value="Eliminar">
                            </form>
                            <a href="properties/update.php?id=<?php echo $property->id; ?>" class=" btnLarge btnLarge--blue">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>

    <h2>Vendedores</h2>

    <div class="table-container">
        <table class="properties">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-- show query results -->
                <?php foreach ($sellers as $seller): ?>
                    <tr>
                        <td><?php echo $seller->id; ?></td>
                        <td><?php echo $seller->nombre . " " . $seller->apellido ?></td>
                        <td><?php echo $seller->telefono; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id" value=<?php echo $seller->id; ?>>
                                <input type="hidden" name="type" value="seller">
                                <input type="submit" class="btnLarge btnLarge--red" value="Eliminar">
                            </form>
                            <a href="sellers/update.php?id=<?php echo $seller->id; ?>" class=" btnLarge btnLarge--blue">Actualizar</a>
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
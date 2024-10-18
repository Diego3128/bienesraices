<?php
require '../../includes/app.php';

isAuthenticated();

// get sellers
$sellerQuery = "SELECT * FROM vendedores";
// do the query
$sellerResult = mysqli_query($db, $sellerQuery);

// get and validate property id
$propertyId = intval($_GET["id"]);
//if the id type is not correct send to the admin page
if (!filter_var($propertyId, FILTER_VALIDATE_INT)) {
    //return if it's not  a number(int)
    header("location: /admin");
}

use App\Propiedad;
//Get property
$propiedad = Propiedad::findById($propertyId);

//Process update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Split variables and update value
    $titulo = mysqli_real_escape_string($db,  $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db,  $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db,  $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db,  $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db,  $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db,  $_POST["estacionamiento"]);
    $vendedorId =  isset($_POST["vendedor"]) ? $_POST["vendedor"] : "";

    $imagen = $_FILES["imagen"] ?? null;

    $errors = []; //check inputs for possible erros


    if (!$titulo) {
        $errors[] = "El titulo es necesario";
    }
    if (!$precio) {
        $errors[] = "El precio es necesario";
    }
    if (strlen($descripcion) < 50) {
        $errors[] = "La descripción es muy corta";
    }
    if (!$wc) {
        $errors[] = "El numero de baños es requerido";
    }
    if (!$habitaciones) {
        $errors[] = "El numero de habitaciones es requerido";
    }
    if (!$estacionamiento) {
        $errors[] = "El numero de lugares de estacionamiento es requerido";
    }
    if (!$vendedorId) {
        $errors[] = "Elija un vendedor";
    }
    // validate image size, max: 1mb 
    $maxSize = 1000000;
    if ($imagen["size"] > $maxSize) {
        $errors[] = "La imagen es muy grande";
    }

    // if there are no errors save in database
    if (empty($errors)) {
        //upload files // check if the directoy doesn't exist
        $imgDir = "../../images/";
        if (!is_dir($imgDir)) {
            mkdir($imgDir);
        }

        $imageName = "";
        //check if  anew image has been uploaded
        if ($imagen["name"]) {
            //delete previous image
            if ($propertyImg) {
                $previousImg = $imgDir . $propertyImg;
                unlink($previousImg);
            }
            //save new image 
            // image extension (jpg, png..)
            $imageExt = pathinfo($imagen["name"])["extension"];
            // random name plus the extension
            $imageName = md5(uniqid(mt_rand())) . "." . $imageExt;
            // move to a destination directory
            move_uploaded_file($imagen["tmp_name"], $imgDir  . $imageName);
        } else {
            // no new image it keeps the same
            $imageName = $propertyImg;
        }

        // Create sql query
        $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$imageName}', descripcion= '{$descripcion}',
        habitaciones= '{$habitaciones}', wc= '{$wc}', estacionamiento= '{$estacionamiento}', vendedor_id= '{$vendedorId}'
        WHERE id={$propertyId};";

        // var_dump($query);
        // exit;
        //do the query
        $queryResult = mysqli_query($db, $query);

        if ($queryResult) {
            //redirect user
            header("location: /admin?result=2");
        }
    }
}

//header template

includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Actualizar</h2>
    <a href="/admin/" class="btnSmall btnSmall--green">Volver</a>

    <!-- show query result -->
    <?php
    if (!empty($errors)):
        foreach ($errors as $error) : ?>
            <div class="alert error"> <?php echo $error; ?></div>
    <?php endforeach;
    endif;
    ?>

    <form method="post" class="form" enctype="multipart/form-data">

        <?php include "../../includes/templates/property_form.php" ?>

        <input type="submit" value="Actualizar propiedad" class="btnSmall btnSmall--green">

    </form>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
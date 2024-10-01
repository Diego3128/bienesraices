<?php
// database:
require '../../includes/config/database.php';
$db = connectToDB();

// query to get sellers
$sellerSqlQuery = "SELECT * FROM vendedores";
//results
$sellerResult = mysqli_query($db, $sellerSqlQuery);

// init variables
$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";
$creado  = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Split variables and update value
    $titulo = mysqli_real_escape_string($db,  $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db,  $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db,  $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db,  $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db,  $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db,  $_POST["estacionamiento"]);
    $vendedorId =  isset($_POST["vendedor"]) ? $_POST["vendedor"] : "";

    $imagen = $_FILES["imagen"];

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
    // validate image
    if (!$imagen["name"]) {
        $errors[] = "La imagen es obligatoria";
    }
    // validate image size, max: 1mb 
    $maxSize = 1000000;
    if ($imagen["size"] > $maxSize) {
        $errors[] = "La imagen es muy grande";
    }

    // if there are no errors save in database
    if (empty($errors)) {
        // upload files // check if the dir doesn't exist
        $imgDir = "../../images/";
        if (!is_dir($imgDir)) {
            mkdir($imgDir);
        }
        // image extension (jpg, png..)
        $imageExt = pathinfo($imagen["name"])["extension"];
        // random name plus the extension
        $imageName = md5(uniqid(mt_rand())) . "." . $imageExt;
        // move to a destination directory
        move_uploaded_file($imagen["tmp_name"], $imgDir  . $imageName);

        // Create sql query
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)
            VALUES ('$titulo', '$precio', '$imageName', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId');";
        //do the query
        $queryResult = mysqli_query($db, $query);

        if ($queryResult) {
            //redirect user
            header("location: /admin?created=1");
        } else {
            echo "No se pudo crear la propiedad";
        }
    }
}

//functions
require '../../includes/functions.php';

includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Crear</h2>
    <a href="/admin/" class="btnSmall btnSmall--green">Volver</a>

    <!-- show query result -->
    <?php
    if (!empty($errors)):
        foreach ($errors as $error) : ?>
            <div class="alert error"> <?php echo $error; ?></div>
    <?php endforeach;
    endif;
    ?>

    <form action="/admin/properties/create.php" method="post" class="form" enctype="multipart/form-data">
        <fieldset>
            <legend>Información general</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" placeholder="Describe la propiedad"><?php echo $descripcion ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="EJ: 5" min="1" max="10" value="<?php echo $habitaciones ?>">

            <label for="wc">Baños</label>
            <input type="number" id="wc" name="wc" placeholder="EJ: 2" min="1" max="10" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="EJ: 2" min="1" max="10" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option disabled selected>--Elija vendedor--</option>
                <?php
                while ($sellerRow = mysqli_fetch_assoc($sellerResult)) : ?>
                    <option <?php echo $vendedorId === $sellerRow["id"] ? "selected" : ""; ?> value="<?php echo $sellerRow["id"]; ?>">
                        <?php echo $sellerRow["nombre"] . " " . $sellerRow["apellido"];
                        ?>
                    </option>
                <?php
                endwhile;
                ?>

            </select>
        </fieldset>

        <input type="submit" value="Enviar" class="btnSmall btnSmall--green">

    </form>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
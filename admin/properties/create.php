<?php
require '../../includes/app.php';

isAuthenticated();

use App\Propiedad;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

// create image manager with GD driver
$manager = new ImageManager(new Driver());

// database:
$db = connectToDB();

// query to get sellers
$sellerSqlQuery = "SELECT * FROM vendedores";
//results
$sellerResult = mysqli_query($db, $sellerSqlQuery);

//init variable to check inputs for possible errors
$errors = Propiedad::getErrors();

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
    //create a new instance of Propiedad
    $propiedad = new Propiedad($_POST);
    //img variables
    $image;
    $imageName;

    // check if the image was correctly uploaded:
    if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK && $_FILES["imagen"]["tmp_name"]) {
        //get  data from the uploded image
        $propertyImg = $_FILES["imagen"];
        //file temporary location
        $imgTempDir = $propertyImg["tmp_name"];

        //CREATE A RANDOM NAME INCLUDING THE EXTENSION
        // get image extension (jpg, png..)
        $imageExt = pathinfo($propertyImg["name"])["extension"];
        // random name plus the extension
        $imageName = md5(uniqid(mt_rand())) . "." . $imageExt;

        //save the name of the image in the attribute of the instance
        $propiedad->setImage($imageName);
        //RESIZE IMAGE
        // read image from file system
        $image = $manager->read($imgTempDir);
        // resize image proportionally to 800 width 600 height
        $image->cover(800, 600);
    }

    // check for errors
    $errors = $propiedad->validateInputs();

    // if there are no errors, save the new property and also the image
    if (empty($errors)) {
        // Folder in the server to save the image
        if (!is_dir(IMAGES_DIR)) {
            mkdir(IMAGES_DIR);
        }
        //save the image in the server
        // save modified image in new format in the server
        $image->toJpeg()->save(IMAGES_DIR . $imageName);

        //save the property into the database
        $result = $propiedad->save();

        if ($result) {
            header("location: /admin?result=1");
        }
    }
}

//include header template

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
            <select name="vendedorId">
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
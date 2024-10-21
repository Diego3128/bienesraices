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
use App\Vendedor;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

// create image manager with GD driver
$manager = new ImageManager(new Driver());

//Get property
$propiedad = Propiedad::findById($propertyId);
//if the id doesn't exist return to the admin panel
if (!$propiedad) {
    header("location: /admin/?result=4");
}
//array with all the sellers
$vendedores = Vendedor::all();
//init var for possible errors
$errors = Propiedad::getErrors();
//Process update request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //array with the changes made in the form
    $args = $_POST["propiedad"];
    //update property in memory
    $propiedad->synchronize($args);
    // check if the a new image was uploaded:
    if ($_FILES["propiedad"]["error"]["imagen"] === UPLOAD_ERR_OK && $_FILES["propiedad"]["tmp_name"]["imagen"]) {
        //file temporary location
        $imgTempDir = $_FILES["propiedad"]["tmp_name"]["imagen"];

        // random name plus the extension
        $imageName = md5(uniqid(mt_rand())) . ".jpg";

        //save the name of the new image in the attribute of the instance
        $propiedad->setImage($imageName);
        // read image from file system
        $image = $manager->read($imgTempDir);
        // resize image proportionally to 800 width 600 height
        $image->cover(800, 600);
    }
    //input validation
    $propiedad->validateInputs();
    //check errors
    $errors = Propiedad::getErrors(); //check inputs for possible errors

    // if there are no errors update in database
    if (empty($errors)) {
        //save the possible new image in the server
        if (isset($image)) {
            $image->toJpeg()->save(IMAGES_DIR . $imageName);
        }
        //update the property into the database
        $propiedad->save();
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
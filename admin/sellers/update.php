<?php
//utils
require '../../includes/app.php';
//authenticate user
isAuthenticated();

//get and validate id
$id = $_GET["id"];
$id = filter_var(filter_var($id, FILTER_SANITIZE_NUMBER_INT), FILTER_VALIDATE_INT);
if (!$id) header("location: /admin/?result=4");

//use class
use App\Vendedor;
//get the seller from db
$vendedor = Vendedor::findById($id);
//init errors
$errors = Vendedor::getErrors();

// debugAndFormat($vendedor);
// process form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //array with the changes made in the form
    $args = $_POST["vendedor"];
    //update seller in memory
    $vendedor->synchronize($args);
    //validate new inputs
    $errors = $vendedor->validateInputs();
    if (empty($errors)) {
        $vendedor->save();
    }
}

includeTemplate('header');
?>

<main class="container section">

    <h2>Actualizar vendedor</h2>
    <a href="/admin/" class="btnSmall btnSmall--green">Volver</a>

    <!-- show query result -->
    <?php
    if (!empty($errors)):
        foreach ($errors as $error) : ?>
            <div class="alert error"> <?php echo $error; ?></div>
    <?php endforeach;
    endif;
    ?>

    <form method="post" class="form">
        <?php include "../../includes/templates/seller_form.php"; ?>

        <input type="submit" value="Actualizar Vendedor" class="btnSmall btnSmall--green">

    </form>
</main>

<?php
includeTemplate('footer');
?>
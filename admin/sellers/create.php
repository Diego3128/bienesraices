<?php
//utils
require '../../includes/app.php';
//authenticate user
isAuthenticated();

//use class
use App\Vendedor;
//init errors
$errors = Vendedor::getErrors();
//init an empty seller object
$vendedor = new Vendedor;

// debugAndFormat($vendedor);
// process form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //create new instance
    $vendedor = new Vendedor($_POST["vendedor"]);
    //check for errors
    $errors = $vendedor->validateInputs();

    if (empty($errors)) {
        $vendedor->save();
    }
}

includeTemplate('header');
?>

<main class="container section">

    <h2>Crear nuevo vendedor</h2>
    <a href="/admin/" class="btnSmall btnSmall--green">Volver</a>

    <!-- show query result -->
    <?php
    if (!empty($errors)):
        foreach ($errors as $error) : ?>
            <div class="alert error"> <?php echo $error; ?></div>
    <?php endforeach;
    endif;
    ?>

    <form action="/admin/sellers/create.php" method="post" class="form">
        <?php include "../../includes/templates/seller_form.php"; ?>

        <input type="submit" value="Registrar Vendedor" class="btnSmall btnSmall--green">

    </form>
</main>

<?php
includeTemplate('footer');
?>
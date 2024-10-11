<?php
//Get if from query params
$propertyId = $_GET["id"];
//sanitize and validate id
$propertyId = filter_var(filter_var($propertyId, FILTER_SANITIZE_NUMBER_INT), FILTER_VALIDATE_INT);
//check id
if (!$propertyId) {
    header("location: /");
}
// import connection
require 'includes/app.php';
//create and instance
$db = connectToDB();
//sql query for the property using the id
$propertySqlQuery = "SELECT * FROM propiedades WHERE id={$propertyId};";
//query result
$propertyResult = mysqli_query($db, $propertySqlQuery);
//check query result
if (!$propertyResult->num_rows) {
    //return to main page if there are no records
    header("location: /");
}
//fetch de property
$property = mysqli_fetch_assoc($propertyResult);

includeTemplate(templateName: 'header');
?>

<main class="container section centered-content">
    <h2><?php echo $property["titulo"] ?></h2>

    <picture>
        <img loading="lazy" src="/images/<?php echo $property["imagen"] ?>" alt="Propiedad anuncio">
    </picture>

    <div class="house-description">
        <p class="card__price"><span class="dollar">$</span> <?php echo $property["precio"] ?></p>
        <ul class="characteristics__icons">

            <li>
                <img src="./build/img/icono_wc.svg" alt="restroom icon">
                <p><?php echo $property["wc"] ?></p>
            </li>

            <li>
                <img src="./build/img/icono_estacionamiento.svg" alt="parking lot icon">
                <p><?php echo $property["estacionamiento"] ?></p>
            </li>

            <li>
                <img src="./build/img/icono_dormitorio.svg" alt="room icon">
                <p><?php echo $property["habitaciones"] ?></p>
            </li>

        </ul>
        <p><?php echo $property["descripcion"] ?></p>

    </div>
</main>

<?php
includeTemplate(templateName: 'footer');
//close db connection
mysqli_close($db);
?>
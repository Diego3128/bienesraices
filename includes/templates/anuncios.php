<?php
//Import connection: PATH RELATIVE TO THE FILE THAT IS USING IT// It's the file originally including everything

require "includes/config/database.php";
//Create and instance of the conexion
$db = connectToDB();

$query = "SELECT * FROM propiedades LIMIT {$numProperties}";

$queryResult = mysqli_query($db, $query);
?>


<div class="ads-container">
    <?php while ($row = mysqli_fetch_assoc($queryResult)): ?>
        <div class="card">
            <picture>
                <img loading="lazy" src="/images/<?php echo $row["imagen"] ?>" alt="Propiedad anuncio">
            </picture>

            <div class="card__details">
                <h3 class="card__title"><?php echo $row["titulo"] ?></h3>
                <p class="card__description"><?php echo $row["descripcion"] ?></p>
                <p class="card__price"><span class="dollar">$</span> <?php echo $row["precio"] ?></p>

                <ul class="card__icons">

                    <li>
                        <img src="./build/img/icono_wc.svg" alt="restroom icon">
                        <p><?php echo $row["wc"] ?></p>
                    </li>

                    <li>
                        <img src="./build/img/icono_estacionamiento.svg" alt="parking lot icon">
                        <p><?php echo $row["estacionamiento"] ?></p>
                    </li>

                    <li>
                        <img src="./build/img/icono_dormitorio.svg" alt="room icon">
                        <p><?php echo $row["habitaciones"] ?></p>
                    </li>

                </ul>

                <!-- card__icons -->
            </div>
            <!-- card__details -->
            <a href="anuncio.php?id=<?php echo $row["id"] ?>" class="btnLarge btnLarge--yellow">Ver propiedad</a>
        </div>
        <!-- card -->
    <?php endwhile  ?>

</div>

<?php
mysqli_close($db);
?>
<?php
include './includes/templates/header.php';
?>

<main class="container section centered-content">
    <h2>Casa lujosa con lago</h2>

    <picture>
        <source srcset="./build/img/anuncio1.webp" type="image/webp">
        <source srcset="./build/img/anuncio1.jpg" type="image/jpeg">
        <img loading="lazy" src="./build/img/anuncio1.jpg" alt="Propiedad anuncio">
    </picture>

    <div class="house-description">
        <p class="card__price"><span class="dollar">$</span> 20.000.000</p>
        <ul class="characteristics__icons">

            <li>
                <img src="./build/img/icono_wc.svg" alt="restroom icon">
                <p>3</p>
            </li>

            <li>
                <img src="./build/img/icono_estacionamiento.svg" alt="parking lot icon">
                <p>4</p>
            </li>

            <li>
                <img src="./build/img/icono_dormitorio.svg" alt="room icon">
                <p>4</p>
            </li>

        </ul>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, corrupti. Totam iste quibusdam, aliquid
            autem, ea ut necessitatibus, doloribus itaque eius tempora voluptatum vero culpa cumque. Rem hic ratione
            velit?</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, tenetur dolores quasi molestiae deserunt
            aut expedita dolorem blanditiis minus excepturi reprehenderit saepe reiciendis architecto, ex sunt sequi
            in velit laborum repellendus laudantium perferendis tempora nulla voluptate accusantium. Iste a quo
            sequi tenetur voluptates beatae, quod est, libero voluptate earum, nemo odio doloribus error rerum
            labore natus. Id ratione culpa architecto.</p>
    </div>
</main>

<?php
include './includes/templates/footer.php';
?>
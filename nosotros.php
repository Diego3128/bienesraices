<?php
require 'includes/app.php';
includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Más sobre nosotros</h2>

    <div class="aboutus-content">
        <div class="img">
            <picture>
                <source srcset="./build/img/nosotros.webp" type="image/webp" />
                <source srcset="./build/img/nosotros.jpg" type="image/jpeg" />
                <img loading="lazy" src="./build/img/nosotros.jpg" alt="about us image" />
            </picture>
        </div>
        <div class="description">
            <blockquote>25 años de experiencia</blockquote>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Perspiciatis aut, quia numquam molestiae, amet optio nobis
                reprehenderit architecto illo quasi mollitia ratione, eos laborum
                delectus quaerat in aperiam accusamus quis!
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Perspiciatis aut, quia numquam molestiae, amet optio nobis
                reprehenderit architecto illo quasi mollitia ratione, eos laborum
                delectus quaerat in aperiam accusamus quis!
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Perspiciatis aut, quia numquam molestiae, amet optio nobis
                reprehenderit architecto illo quasi mollitia ratione, eos laborum
                delectus quaerat.
            </p>
        </div>
    </div>
</main>

<section class="container section">
    <h2>Más sobre nosotros</h2>
    <div class="aboutus-icons">
        <div class="icon">
            <img loading="lazy" src="./build/img/icono1.svg" alt="security icon" />
            <h3>Seguridad</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae
                libero a itaque, dolore cum reprehenderit ad nesciunt ex fugiat
                tempora?
            </p>
        </div>

        <div class="icon">
            <img loading="lazy" src="./build/img/icono2.svg" alt="money icon" />
            <h3>Precio</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae
                libero a itaque, dolore cum reprehenderit ad nesciunt ex fugiat
                tempora?
            </p>
        </div>

        <div class="icon">
            <img loading="lazy" src="./build/img/icono3.svg" alt="clock icon" />
            <h3>Tiempo</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae
                libero a itaque, dolore cum reprehenderit ad nesciunt ex fugiat
                tempora?
            </p>
        </div>
    </div>

</section>

<?php
includeTemplate(templateName: 'footer');
?>
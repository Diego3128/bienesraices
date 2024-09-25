<?php
$homePage = true;

include './includes/templates/header.php';
?>

<main class="container section">
    <h2>Más sobre nosotros</h2>

    <div class="aboutus-icons">
        <div class="icon">
            <img loading="lazy" src="./build/img/icono1.svg" alt="security icon">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae libero a itaque, dolore cum
                reprehenderit ad nesciunt ex fugiat tempora?</p>
        </div>

        <div class="icon">
            <img loading="lazy" src="./build/img/icono2.svg" alt="money icon">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae libero a itaque, dolore cum
                reprehenderit ad nesciunt ex fugiat tempora?</p>
        </div>

        <div class="icon">
            <img loading="lazy" src="./build/img/icono3.svg" alt="clock icon">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae libero a itaque, dolore cum
                reprehenderit ad nesciunt ex fugiat tempora?</p>
        </div>
    </div>
</main>

<section class="container">
    <h2>Casas y aptos a la venta</h2>

    <div class="ads-container">

        <div class="card">
            <picture>
                <source srcset="./build/img/anuncio1.webp" type="image/webp">
                <source srcset="./build/img/anuncio1.jpg" type="image/jpeg">
                <img loading="lazy" src="./build/img/anuncio1.jpg" alt="Propiedad anuncio">
            </picture>

            <div class="card__details">
                <h3 class="card__title">Casa lujosa con lago</h3>
                <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                    molestias id laudantium nobis aperiam rem optio maxime quasi. Beatae laboriosam corporis ratione
                    enim quia quod autem labore. Doloribus sed quidem tempore, expedita facere officia consequuntur
                    repudiandae, provident dolore autem deserunt.</p>
                <p class="card__price"><span class="dollar">$</span> 20.000.000</p>
                <ul class="card__icons">

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
                <!-- card__icons -->
            </div>
            <!-- card__details -->
            <a href="anuncio.php" class="btnLarge btnLarge--yellow">Ver propiedad</a>
        </div>
        <!-- card -->

        <div class="card">
            <picture>
                <source srcset="./build/img/anuncio2.webp" type="image/webp">
                <source srcset="./build/img/anuncio2.jpg" type="image/jpeg">
                <img loading="lazy" src="./build/img/anuncio2.jpg" alt="Propiedad anuncio">
            </picture>

            <div class="card__details">
                <h3 class="card__title">Casa con terminados de lujo</h3>
                <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                    molestias id laudantium nobis aperiam rem optio maxime quasi. Beatae laboriosam corporis ratione
                    enim quia quod autem labore. Doloribus sed quidem tempore, expedita facere officia consequuntur
                    repudiandae, provident dolore autem deserunt.</p>
                <p class="card__price"><span class="dollar">$</span> 20.000.000</p>
                <ul class="card__icons">

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
                <!-- card__icons -->
            </div>
            <!-- card__details -->
            <a href="anuncio.php" class="btnLarge btnLarge--yellow">Ver propiedad</a>
        </div>
        <!-- card -->

        <div class="card">
            <picture>
                <source srcset="./build/img/anuncio3.webp" type="image/webp">
                <source srcset="./build/img/anuncio3.jpg" type="image/jpeg">
                <img loading="lazy" src="./build/img/anuncio3.jpg" alt="Propiedad anuncio">
            </picture>

            <div class="card__details">
                <h3 class="card__title">Casa con piscina</h3>
                <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                    molestias id laudantium nobis aperiam rem optio maxime quasi. Beatae laboriosam corporis ratione
                    enim quia quod autem labore. Doloribus sed quidem tempore, expedita facere officia consequuntur
                    repudiandae, provident dolore autem deserunt.</p>
                <p class="card__price"><span class="dollar">$</span> 20.000.000</p>
                <ul class="card__icons">

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
                <!-- card__icons -->
            </div>
            <!-- card__details -->
            <a href="anuncio.php" class="btnLarge btnLarge--yellow">Ver propiedad</a>
        </div>
        <!-- card -->
    </div>
    <!-- ads-container -->
    <div class="align-right">
        <a href="anuncios.php" class="btnSmall btnSmall--green">Ver todas</a>
    </div>
</section>

<section class="contact-img">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo.</p>
    <a href="contacto.php" class="btnSmall btnSmall--yellow">Contactanos</a>
</section>

<div class="container blog-test-section">

    <section class="blog">
        <h3 class="blog__title">Nuestro blog</h3>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="./build/img/blog1.webp" type="image/webp">
                    <source srcset="./build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="./build/img/blog1.jpg" alt="blog post">
                </picture>
            </div>

            <div class="content">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el <span class="text-yellow">20/10/2024</span>| Por: <span class="text-yellow">
                            Admin</span> </p>
                    <p>Construye una terraza en el techo de tu casa ahorrando dinero en materiales y mano de obra.
                    </p>
                </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="./build/img/blog2.webp" type="image/webp">
                    <source srcset="./build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="./build/img/blog2.jpg" alt="blog post">
                </picture>
            </div>

            <div class="content">
                <a href="entrada.php">
                    <h4>Guia para la decoración de tu casa</h4>
                    <p>Escrito el <span class="text-yellow">20/10/2024</span> | Por: <span class="text-yellow">
                            Admin</span>
                    </p>
                    <p>Ahorra espacio en tu hogar y aprende a combinar muebles y colores para decorar tu hogar.
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimonials">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal fue muy amable y recibí una gran atención. La propiedad cumplió con todas mis
                expectativas.
            </blockquote>
            <p>- Toni Perez</p>
        </div>
    </section>

</div>

<?php
include './includes/templates/footer.php';
?>
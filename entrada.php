<?php
include './includes/templates/header.php';
?>

<main class="container section centered-content">
    <h2>Entrada blog</h2>

    <picture>
        <source srcset="./build/img/destacada2.webp" type="image/webp">
        <source srcset="./build/img/destacada2.jpg" type="image/jpeg">
        <img loading="lazy" src="./build/img/destacada2.jpg" alt="imagen blog post">
    </picture>

    <p>Escrito por <span class="text-yellow">Toni Perez</span>. El <span class="text-yellow">2024/04/25</span>.</p>

    <div class="house-description">
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

<footer class="footer section">
    <div class="container footer-container">
        <nav class="navigation">
            <a href="nosotros.html">Acerca de nosotros</a>
            <a href="anuncios.html">anuncios</a>
            <a href="blog.html">blog</a>
            <a href="contacto.html">contactanos</a>
        </nav>

        <p class="copyright">All rights reserved 2024</p>
    </div>


</footer>

<script src="./build/js/bundle.min.js"></script>
</body>

</html>
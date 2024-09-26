<?php
require '../../includes/functions.php';

includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Crear</h2>
    <a href="/admin/" class="btnSmall btnSmall--green">Volver</a>

    <form action="" class="form">
        <fieldset>
            <legend>Información general</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" placeholder="Titulo de la propiedad">

            <label for="precio">Precio</label>
            <input type="number" id="precio" placeholder="Precio de la propiedad">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea name="" id="descripcion" placeholder="Describe la propiedad"></textarea>

        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" placeholder="EJ: 5" min="1" max="10">

            <label for="wc">Baños</label>
            <input type="number" id="wc" placeholder="EJ: 2" min="1" max="10">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" placeholder="EJ: 2" min="1" max="10">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select>
                <option disabled selected>--Elija vendedor--</option>
                <option value="1">Diego</option>
                <option value="2">Toni</option>
            </select>
        </fieldset>

        <input type="submit" value="Enviar" class="btnSmall btnSmall--green">

    </form>
</main>

<?php
includeTemplate(templateName: 'footer');
?>
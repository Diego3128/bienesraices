<?php
require './includes/functions.php';
includeTemplate(templateName: 'header');
?>
<main class="container section">
    <h2>Contactanos</h2>

    <picture>
        <source srcset="./build/img/destacada3.webp" type="image/webp">
        <source srcset="./build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="./build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>LLene el formulario de contacto</h2>

    <form action="" class="form">

        <fieldset>
            <legend>Información personal</legend>

            <div>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">
            </div>

            <div>
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email">
            </div>

            <div>
                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">
            </div>

            <div>
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" placeholder="Cuentanos un poco.."></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <div>
                <label for="opciones">Vende o compra:</label>
                <select name="" id="opciones">
                    <option selected disabled> --Seleccione-- </option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>
            </div>

            <div>
                <label for="cantidad">Cantidad</label>
                <input type="number" min="1" max="10" value="1" id="cantidad">
            </div>

            <div>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </div>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado?</p>

            <div class="contact-method">
                <label for="contact-email">E-mail:</label>
                <input type="radio" value="e-mail" name="telefono-email" id="contact-email">

                <label for="contact-telefono">Telefono:</label>
                <input type="radio" value="telefono" id="contact-telefono" name="telefono-email">
            </div>

            <p>En caso de seleccionar telefono, eliga la fecha y hora para ser contactado.</p>

            <div>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">
            </div>

            <div>
                <label for="hora">Hora</label>
                <input type="time" id="hora" value="13:00" min="09:00" max="18:00">
            </div>

            <input type="submit" value="Enviar" class="btnSmall btnSmall--green">

        </fieldset>
    </form>

</main>

<?php
includeTemplate(templateName: 'footer');
?>
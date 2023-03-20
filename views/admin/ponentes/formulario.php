<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>


    

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input name="apellido" type="text" class="formulario__input" placeholder="Apellido Ponente" id="nombre" value="<?php echo $ponente->apellido ?? '' ?>">
    </div>


    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input name="ciudad" type="text" class="formulario__input" placeholder="Ciudad del Ponente" id="ciudad" value="<?php echo $ponente->ciudad ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">Pais</label>
        <input name="pais" type="text" class="formulario__input" placeholder="Pais del Ponente" id="pais" value="<?php echo $ponente->pais ?? '' ?>">
    </div>


    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input name="imagen" type="file" class="formulario__input--file" id="imagen">
    </div>

    <?php if (isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" type="image/png">

                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" alt="Imagen Ponente">
            </picture>
        </div>
    <?php } ?>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Area de experiencias (separadas por comas)</label>
        <input type="text" class="formulario__input" placeholder="Ej. Node.js, PHP, Laravel, React, VueJS" id="tags_input">

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" i name="tags" value="<?php echo $ponente->tags ?? '' ?>">
    </div>
</fieldset>



<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Facebook" id="tags_input" name="redes[facebook]" value="<?php echo $redes->facebook ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Twitter" id="tags_input" name="redes[twitter]" value="<?php echo $redes->twitter ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Youtube" id="tags_input" name="redes[youtube]" value="<?php echo $redes->youtube ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Instagram" id="tags_input" name="redes[instagram]" value="<?php echo $redes->instagram ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Tiktok" id="tags_input" name="redes[tiktok]" value="<?php echo $redes->tiktok ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Github" id="tags_input" name="redes[github]" value="<?php echo $redes->github ?? '' ?>">
        </div>
    </div>
</fieldset>
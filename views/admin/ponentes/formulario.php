<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input name="nombre" type="text" class="formulario__input" placeholder="Nombre Ponente" id="nombre" value="<?php echo $ponente->nombre ?? '' ?>">
    </div>

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
            <input type="text" class="formulario__input--socieales" placeholder="Facebook" id="tags_input" name="redes[facebook]" value="<?php echo $ponente->facebook ?? '' ?>" >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Twitter" id="tags_input" name="redes[twitter]" value="<?php echo $ponente->twitter ?? '' ?>" >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Youtube" id="tags_input" name="redes[youtube]" value="<?php echo $ponente->youtube ?? '' ?>" >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Instagram" id="tags_input" name="redes[instagram]" value="<?php echo $ponente->instagram ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Tiktok" id="tags_input" name="redes[tiktok]" value="<?php echo $ponente->tiktok ?? '' ?>" >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text" class="formulario__input--socieales" placeholder="Github" id="tags_input" name="redes[github]" value="<?php echo $ponente->github ?? '' ?>" >
        </div>
    </div>
</fieldset>
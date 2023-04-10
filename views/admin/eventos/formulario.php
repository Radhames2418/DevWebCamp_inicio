<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input 
            name="nombre" 
            type="text" 
            class="formulario__input" 
            placeholder="Nombre Evento" 
            id="nombre" 
            value="<?php echo $evento->nombre ?>">
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción Evento</label>
        <textarea 
            name="descripcion" 
            class="formulario__input" 
            placeholder="Descripción Evento" 
            id="descripcion" 
            rows="8"><?php echo $evento->descripcion?></textarea>
    </div>
    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoria o Tipo de Eventos</label>
        <select 
            name="categoria_id" 
            class="formulario__select" 
            id="categoria">
            <option 
                selected
                value=""  
                disabled>- SELECCIONAR -
            </option>
            <?php foreach ($categorias as $categoria) { ?>
                <option
                    <?php echo($evento->categoria_id === $categoria->id) ? 'selected' : '' ?>
                    value="<?php echo $categoria->id ?>">
                    <?php echo $categoria->nombre ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Selecciona el día</label>

        <div class="formulario__radio">
            <?php foreach ($dias as $dia) { ?>
                <div>
                    <label 
                        for="<?php echo strtolower($dia->nombre); ?>">
                        <?php echo $dia->nombre; ?>
                    </label>

                    <input 
                        type="radio" 
                        id="<?php echo strtolower($dia->nombre); ?>" 
                        name="dia" 
                        value="<?php echo strtolower($dia->id); ?>"
                        <?php echo ($evento->dia_id == $dia->id) ? 'checked' : '';?>
                    >
                </div>
            <?php } ?>
        </div>

        <input type="hidden" name="dia_id" value="<?php echo  $evento->dia_id?>">
    </div>

    <div id="horas" class="formulario__campo">
        <label 
            class="formulario__label">Seleccionar Hora
        </label>

        <ul id="horas" class="horas">
            <?php foreach ($horas as $hora) { ?>
                <li 
                    data-hora-id ="<?php echo $hora->id; ?>"
                    class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora; ?>
                </li>
            <?php } ?>
        </ul>
        
        <input type="hidden" name="hora_id" value="<?php echo  $evento->hora_id?>">
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input 
            type="text" 
            class="formulario__input" 
            placeholder="Buscar Ponentes" 
            id="ponentes"
        >
        <ul id="listado-ponentes" class="listado-ponentes">
        </ul>

        <input type="hidden" name="ponente_id" value="<?php echo  $evento->ponente_id?>">
    </div>


    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input
            name="disponibles"
            type="number" 
            min="1" 
            class="formulario__input" 
            placeholder="EJ. 20" 
            id="disponibles"
            value="<?php echo $evento->disponibles ?>">
    </div>

</fieldset>
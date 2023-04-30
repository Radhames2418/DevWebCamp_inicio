<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">
    Elige hasta 5 eventos para asistir de forma presencial.
</p>

<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h3 class="eventos-registro__heading--conferencia">&lt; Conferencias /></h3
        >
        <p class="eventos-registro__fecha">Viernes 5 de Octubres</p>
        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_v'] as $evento) {?>
                <?php include __DIR__ . '/evento.php'?>
            <?php }?>
        </div>

        <p class="eventos-registro__fecha">Sábado 6 de Octubres</p>
        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_s'] as $evento) {?>
                <?php include __DIR__ . '/evento.php'?>
            <?php }?>
        </div>


        <h3 class="eventos-registro__heading--workshops">&lt; Workshops /></h3
        >
        <p class="eventos-registro__fecha">Viernes 5 de Octubres</p>
        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($eventos['workshops_v'] as $evento) {?>
                <?php include __DIR__ . '/evento.php'?>
            <?php }?>
        </div>

        <p class="eventos-registro__fecha">Sábado 6 de Octubres</p>
        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($eventos['workshops_s'] as $evento) {?>
                <?php include __DIR__ . '/evento.php'?>
            <?php }?>
        </div>
    </main>

    <aside class="registros">
        <h2 class="registros__heading">Tu Registro</h2>

        <div id="registro-resumen" class="registros__resumen">
        </div>

        <div class="registros__regalo">
            <label for="regalo" class="registros__label">Selecciona un Regalo</label>

            <select id="regalo" class="registros__select">
                <option value="">-- Selecciona tu regalo --</option>
                <?php foreach ($regalos as $regalo) { ?>
                    <option value="<?php echo $regalo->id?>"><?php echo $regalo->nombre?></option>
                <?php } ?>
            </select>
        </div>

        <form id="registro" class="formulario">
            <div class="formulario__campo">
                <input type="submit" class="formulario__submit formulario__submit--full" value="Registrarme">
            </div>
        </form>
    </aside>
</div>

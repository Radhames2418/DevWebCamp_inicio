<h1 class="dashboard__heading"><?php echo $titulo ?></h1>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">
    <?php require_once __DIR__ . './../../templates/alertas.php' ?>

    <form method="POST" action="/admin/eventos/editar" class="formulario">
        <?php require_once __DIR__ . '/formulario.php' ?>

        <input type="submit" class="formulario__submit formulario__submit--registrar" value="Guardar Cambios">
    </form>
</div>

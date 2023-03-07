<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">
        Coloca tu nuevo password
    </p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ?>

    <?php if ($token_valido) { ?>
        <form method="POST" class="formulario">
            <div class="formulario__campo">
                <label for="password" class="formulario__label">Nuevo Password</label>
                <input name="password" type="password" class="formulario__input" placeholder="Tu password" id="password">
            </div>
            <input type="submit" class="formulario__submit" value="Guardar password">
        </form>
    <?php } ?>

    <div class="acciones">
        <a class="acciones__enlace" href="/login">Ya tienes una cuenta? Iniciar Sesión</a>
        <a class="acciones__enlace" href="/registro">Aun no tienes una cuenta? Obtener una</a>
    </div>
</main>
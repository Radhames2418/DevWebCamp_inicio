<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">
        Iniciar Sesión en DevWebCamp
    </p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ?>


    <form method="POST" action="/login" class="formulario" novalidate>
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input name="email" type="email" class="formulario__input" placeholder="Tu email" id="email">
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input name="password" type="password" class="formulario__input" placeholder="Tu password" id="password">
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/registro">Aun no tienes una cuenta? Obtener una</a>
        <a class="acciones__enlace" href="/olvide">Olvidaste tu password?</a>
    </div>
</main>
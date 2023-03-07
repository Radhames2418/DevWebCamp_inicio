<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">
        Recupera tu acceso a DevWebcamp
</p>

    <form class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" class="formulario__input" placeholder="Tu email" id="email">
        </div>
        <input type="submit" class="formulario__submit" value="Enviar Instrucciones">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/login">Ya tienes una cuenta? Iniciar Sesión</a>
        <a class="acciones__enlace" href="/registro">Aun no tienes una cuenta? Obtener una</a>
    </div>
</main>
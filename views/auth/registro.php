<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">
        Registrate en DevWebcamp
    </p>

    <?php require_once __DIR__ .'/../templates/alertas.php'?>

    <form class="formulario" method="POST" action="/registro">
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input name="nombre" type="text" class="formulario__input" placeholder="Tu nombre" id="nombre" value="<?php echo s($usuario->nombre) ?>">
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellidos</label>
            <input name="apellido" type="text" class="formulario__input" placeholder="Tu apellido" id="apellido"  value="<?php echo s($usuario->apellido)?>">
        </div>

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input name="email" type="email" class="formulario__input" placeholder="Tu email" id="email"  value="<?php echo s($usuario->email)?>">
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input name="password" type="password" class="formulario__input" placeholder="Tu password" id="password">
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repetir Password</label>
            <input name="password2" type="password" class="formulario__input" placeholder="Repetir Password" id="password2">
        </div>
        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/login">Ya tiene cuenta? Inicia Sesión</a>
    </div>
</main>
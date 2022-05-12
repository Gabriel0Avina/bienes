
<main class="contenedor seccion contenido-centrado ">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <form action="/login" class="formulario " method="POST">
        <fieldset>
            <legend class="legend-centrado">Email y password</legend>


            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email" />

            <label for="password">password</label>
            <input type="password" name="password" placeholder="password" id="password" />

        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>

</main>

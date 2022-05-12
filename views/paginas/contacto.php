<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php if($mensaje){   ?>
            <p class="alerta exito">  <?php echo $mensaje ?>   </p>
            <?php } ?>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp" />
            <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
            <img class="img-contacto" loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto" />
        </picture>
        <h2>llene el formulario de Contacto</h2>
        <div class="contenedor-formulario">

        
            <form action="/contacto" method="POST" class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="contacto[nombre]" placeholder="Tu nombre" id="nombre" />
               
                <label for="mensaje">Mensaje</label>
                <textarea name="contacto[mensaje]"" id="mensaje" cols="20" rows="3" ></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion de la propiedad</legend>
                <label for="opciones">Vende o compra</label>
                <select id="opciones" name="contacto[tipo]">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vemde">Vende</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]"/>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>

                <p>como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" value="telefono" id="contactar-telefoto" name="contacto[contacto]" />
                    <label for="contactar-email">email</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]"  />
                </div>
                <div id="contacto"></div>
               
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde" />
            </form>
    </div>
    </main>
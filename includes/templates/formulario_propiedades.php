<fieldset>
                <legend>Informacion General</legend>
                <label for="titulo"> Titulo</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad"
                 value="<?php echo sanitizar($propiedad->titulo); ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad"
                 value="<?php echo sanitizar( $propiedad->precio); ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">
                <?php if($propiedad->imagen): ?>
                    <img src="/imagenes/<?php  echo $propiedad->imagen ?>" class="img-small">
                <?php endif; ?>
                <label for="descripcion">Descripcion:</label>
                <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"
                 ><?php echo sanitizar( $propiedad->descripcion );?></textarea>

            </fieldset>
            <fieldset>
                <legend>Informacion de Propiedades</legend>
                <label for="habitaciones"> Habitaciones</label>
                <input type="number" id="habitaciones" placeholder="numero de habitaciones" min="1" max="9" name="propiedad[habitaciones]"
                value="<?php echo sanitizar($propiedad->habitaciones); ?>">
                
                <label for="wc"> Baños</label>
                <input type="number" id="wc" placeholder="numero de baños" min="1" max="9" name="propiedad[wc]"
                value="<?php echo sanitizar($propiedad->wc); ?>">
                
                <label for="estacionamiento"> Estacionamientos:</label>
                <input type="number" id="estacionamiento" placeholder="numero de estacionamientos" min="1" max="9" name="propiedad[estacionamiento]"
                value="<?php echo sanitizar($propiedad->estacionamiento); ?>">

               
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedor</label>
               <select name="propiedad[vendedorID]" id="vendedor">
                   <option value="" disabled selected >--Seleccione--</option>

                   <?php  foreach($vendedores as $vendedor): ?>
                        <option
                       <?php echo $propiedad->vendedorID === $vendedor->id ? 'selected' : ''; ?>
                        value=" <?php echo sanitizar($vendedor->id);?>"
                        > 
                        <?php  echo sanitizar($vendedor->nombre) . " " .  sanitizar($vendedor->apellido); ?> 
                            
                        </option>
                    <?php endforeach; ?>
               </select>
            </fieldset>
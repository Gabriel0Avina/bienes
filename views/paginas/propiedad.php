<main class="contenedor seccion">
        <h1><?php echo $propiedad->titulo;   ?></h1>
       
            <img  class="img-blog" loading=" lazy" src="imagenes/<?php echo $propiedad->imagen;?>" alt="Imagen de la propiedad">
      
        <div class="resumen-propiedad">
            <p class="precio">
                $<?php echo $propiedad->precio;?>
            </p>
        </div>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono-caracteristicas" loading="lazy" src="build/img/icono_wc.svg" alt="icono W.C.">
                <p><?php echo $propiedad->wc;?></p>
            </li>
            <li>
                <img class="icono-caracteristicas" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono stacionamiento">
                <p><?php echo $propiedad->estacionamiento;?></p>
            </li>
            <li>
                <img class="icono-caracteristicas" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones.">
                <p><?php echo $propiedad->habitaciones;?></p>
            </li>

        </ul>
        <?php echo $propiedad->descripcion;?>
    </main>
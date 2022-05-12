
<div  class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){ ?>
            <div class="anuncio" data-cy="contendor-anuncios">
               
                  
                    <img  class="img" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagenes de Anuncios" loading ="lazy">            
                
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p> <?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"><?php echo $propiedad->precio; ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono-caracteristicas" loading="lazy" src="build/img/icono_wc.svg" alt="icono W.C.">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono-caracteristicas" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono stacionamiento">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono-caracteristicas" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono W.C.">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>

                    </ul>
                    <a data-cy="enlace-propiedad"  href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">Ver Propiedad</a>
                </div> <!--Contendido anuncio-->
            </div> <!-- anuncio-->
            <?php  } ?>

        </div> <!--Contenedor anuncios -->
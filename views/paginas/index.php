<main class="contenedor seccion">
      <h2 data-cy="heading-nosotros">Mas Sobre Nosotros</h2>
     <?php include 'iconos.php' ?>
      <section class="seccion contenedor">
          <h2 data-cy="heading-casas">Casas y Depas en Venta</h2>
        
          <?php 
          
          include 'listado.php';

          ?>

        <div class="alinear-derecha">
          <a href="/propiedades" class="boton-verde"> Ver Todas</a>
        </div>
      </section>
    </main>
    <section class="imagen-contacto ">
      <h2 >Encuentra la casa de tus Sueños</h2>
      <p>llena el formulariode contacto y un asesor se pondrea en contacto a la brevedad</p>
      <a href="/contacto" class="boton-amarillo-inline">Contactanos</a>
      
    </section>

    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog1.webp" type="image/webp">
              <source srcset="build/img/blog1.jpg" type="image/jpeg">
              <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
            </picture>

          </div>
          <div class="texto-entrada">
            <a href="/entrada">
              <h4>Terraza en el techo de tu casa</h4>
              <p>Escrito el: <span>22/09/2021</span> por: <span>Admin</span></p>
              <p>Consejos para construir una terraza en el techo de tu casa </p>
            </a>
          </div>
         </article>
        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog2.webp" type="image/webp">
              <source srcset="build/img/blog2.jpg" type="image/jpeg">
              <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
            </picture>

          </div>
          <div class="texto-entrada">
            <a href="/entrada">
              <h4>Guia para la decoracion de tu hogar</h4>
              <p>Escrito el: <span>22/09/2021</span> por: <span>Admin</span></p>
              <p>Consejos para construir una terraza en el techo de tu casa </p>
            </a>
          </div>
         </article>
      </section>
      <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
          <blockquote>
            El presonal se comproto de una excelente manera, muy buena atencion y las casas cumplen lo que dicen. 
          </blockquote>
          <p>--Gabriel perez</p>
        </div>
      </section>

    </div>
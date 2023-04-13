<?php 

require 'includes/funciones.php';
incluirTemplate('header');
  
?>
  
  <main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>
    

    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="build/img/nosotros.webp" type="image/webp">
          <source srcset="build/img/nosotros.jpg" type="image/jpeg">
          <img src="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
        </picture>
      </div>
    

      <div class="texto-nosotros">
        <blackquote> 
          25 Años de Experiencia
        </blackquote>

        <p>Vestibulum libero ex, luctus maximus justo eget, dapibus pharetra magna. In vel bibendum enim. Duis lectus massa, consequat at ornare eget, venenatis pellentesque felis. Sed quis sodales tellus. Morbi sagittis et purus a blandit. Fusce nec sodales est. Sed ex nibh, molestie a velit quis, pharetra dictum ante. Praesent cursus consequat dapibus. Proin malesuada libero erat, a ornare neque aliquam nec. </p>

        <p>Fusce eget velit eget augue lobortis tristique. In vitae lorem lacus. Fusce eu massa elementum, ultrices nunc at, egestas neque. Nulla facilisi. Phasellus posuere venenatis massa a aliquet. Maecenas congue purus a tortor commodo, quis molestie risus consequat. In malesuada sollicitudin nunc, et congue enim ullamcorper quis. </p>

      </div>
    </div>
  </main>

  <section class="contenedor seccion">
    <h1>Más sobre Nosotros</h1>
    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>Consequatur eveniet nobis quidem similique sunt error tempore blanditiis beatae alias fuga, aliquid illo voluptates, nemo amet reprehenderit quos.</p>
      </div>

      <div class="icono">
        <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
        <h3>Precio</h3>
        <p>Consequatur eveniet nobis quidem similique sunt error tempore blanditiis beatae alias fuga, aliquid illo voluptates, nemo amet reprehenderit quos.</p>
      </div>

      <div class="icono">
        <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
        <h3>Tiempo</h3>
        <p>Consequatur eveniet nobis quidem similique sunt error tempore blanditiis beatae alias fuga, aliquid illo voluptates, nemo amet reprehenderit quos.</p>
      </div>

    </div>
  </section>

  <?php 
  
  incluirTemplate('footer');
  
  ?>

<?php 

require 'includes/funciones.php';
incluirTemplate('header');
  
?>
  
  <main class="contenedor seccion contenido-centrado">
    <h1>Terraza en el techo de tu casa</h1>

    <picture>
      <source srcset="build/img/blog1.webp" type="image/webp">
      <source srcset="build/img/blog1.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen de la Propiedad">    
    </picture>

    <p class="informacion-meta">Escrito el: <span>27/09/2022</span> por: <span>Admin</span></p>

    <div class="resumen-propiedad">

      <p>Vestibulum libero ex, luctus maximus justo eget, dapibus pharetra magna. In vel bibendum enim. Duis lectus massa, consequat at ornare eget, venenatis pellentesque felis. Sed quis sodales tellus. Morbi sagittis et purus a blandit. Fusce nec sodales est. Sed ex nibh, molestie a velit quis, pharetra dictum ante. Praesent cursus consequat dapibus. Proin malesuada libero erat, a ornare neque aliquam nec. </p>

      <p>Fusce eget velit eget augue lobortis tristique. In vitae lorem lacus. Fusce eu massa elementum, ultrices nunc at, egestas neque. Nulla facilisi. Phasellus posuere venenatis massa a aliquet. Maecenas congue purus a tortor commodo, quis molestie risus consequat. In malesuada sollicitudin nunc, et congue enim ullamcorper quis. </p>
    </div>
  </main>

  <?php 
  
  incluirTemplate('footer');
  
  ?>

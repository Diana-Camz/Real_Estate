<?php 

require 'includes/funciones.php';
incluirTemplate('header');
  
?>
  
  <main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>

    <article class="entrada-blog"> <!--ENTRADA 1-->
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp">
          <source srcset="build/img/blog1.jpg" type="image/jpeg">
          <img loading="lazy" src="bluid/img/blog1.jpg" alt="Texto Entrada Blog">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
          <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
        </a>
      </div>
    </article>

    <article class="entrada-blog"> <!--ENTRADA 2-->
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp">
          <source srcset="build/img/blog2.jpg" type="image/jpeg">
          <img loading="lazy" src="bluid/img/blog2.jpg" alt="Texto Entrada Blog">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
          <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
        </a>
      </div>
    </article>

    <article class="entrada-blog"> <!--ENTRADA 3-->
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog3.webp" type="image/webp">
          <source srcset="build/img/blog3.jpg" type="image/jpeg">
          <img loading="lazy" src="bluid/img/blog3.jpg" alt="Texto Entrada Blog">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
          <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
        </a>
      </div>
    </article>

    <article class="entrada-blog"> <!--ENTRADA 4-->
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog4.webp" type="image/webp">
          <source srcset="build/img/blog4.jpg" type="image/jpeg">
          <img loading="lazy" src="bluid/img/blog4.jpg" alt="Texto Entrada Blog">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
          <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
        </a>
      </div>
    </article>
  </main>

  <?php 
  
  incluirTemplate('footer');
  
  ?>

  
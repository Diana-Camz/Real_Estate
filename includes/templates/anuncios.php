<?php 
  //importar la conexión
  //require 'includes/config/database.php'; //no olvidar que se manda a llamar desde index.php raiz, ya que desde ahi se esta importando anuncios de templates
  require __DIR__ . '/../config/database.php'; //__DIR__ considera este documento como el "raiz" en donde hay que incluir la funcion
  $db = conectarDB();

  //consultar 
  $query = "SELECT * FROM propiedades LIMIT ${limite}";//se le agrega un limite, para que en el index solo salgan tres o los que la variable limite marque.

  //obtener los resultados
  $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
      <div class="anuncio"> <!--ANUNCIO 1-->

          <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">        
        
        <div class="contenido-anuncio">
          <h3><?php echo $propiedad['titulo']; ?></h3> 
          <p><?php echo $propiedad['descripcion']; ?></p>
          <p class="precio">$<?php echo $propiedad['precio']; ?></p>

          <ul class="iconos-caracteristicas">
            <li>
              <img class="anuncio-icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
              <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>

            <li>
              <img class="anuncio-icono"  loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
              <p><?php echo $propiedad['wc']; ?></p>
            </li>

            <li>
              <img class="anuncio-icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
              <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>
          </ul>

          <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class=" boton-amarillo"> Ver Propiedad</a>
        </div> <!--.contenido-anuncio-->
      </div> <!--anuncio-->

    <?php endwhile;?>  
    </div> <!--.contenedor-anuncios-->

    <?php 
      //cerrar la conexion
      mysqli_close($db);

    ?>
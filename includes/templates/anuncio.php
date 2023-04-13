<?php 
  //importar la conexión
  //require 'includes/config/database.php'; //no olvidar que se manda a llamar desde index.php raiz, ya que desde ahi se esta importando anuncios de templates
  require __DIR__ . '/../config/database.php'; //__DIR__ considera este documento como el "raiz" en donde hay que incluir la funcion
  $db = conectarDB();

  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) {
    header('location: /');
  }

  //consultar 
  $query = "SELECT * FROM propiedades WHERE id = ${id}";//se le agrega un limite, para que en el index solo salgan tres o los que la variable limite marque.

  //obtener los resultados
  $resultado = mysqli_query($db, $query);
  
  if(!$resultado->num_rows) {
    header('location: /');   // con el num_rows estamos verificando que el id mostrado sea existente, si no es así se redirecciona al index. num_rows es una propiedad de un objeto.
  }
?>
<?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
<img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la Propiedad">

<h1><?php echo $propiedad['titulo']; ?></h1>

<div class="resumen-propiedad">
  <p class="precio">$<?php echo $propiedad['precio']; ?></p>

  <ul class="iconos-caracteristicas">
    <li>
      <img class="anuncio-icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
      <p><?php echo $propiedad['habitaciones']; ?></p>
    </li>

    <li>
      <img class="anuncio-icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
      <p><?php echo $propiedad['wc']; ?></p>
    </li>

    <li>
      <img class="anuncio-icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
      <p><?php echo $propiedad['estacionamiento']; ?></p>
    </li>
  </ul>

  <p><?php echo $propiedad['descripcion']; ?></p>

</div>
<a href="anuncios.php" class="boton boton-verde">Volver</a>
<?php endwhile;?> 

<?php 
      //cerrar la conexion
      mysqli_close($db);

    ?>
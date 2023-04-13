<?php 
//escribir primero que todo el session_start();
//session_start();

require '../includes/funciones.php';//una ../ porque de esta forma sale solo de una carpeta
$auth = estaAutenticado();

if(!$auth){
  header('Location: /');
}

echo"<pre>";
var_dump($_SESSION);
echo"</pre>"; 

//$auth = $_SESSION['login']; //como la variable no existe la creamos aqui y le asignamos el _SESSION


// IMPORTAR LA CONEXION
require '../includes/config/database.php';
$db = conectarDB();

//ESCRIBIR EL QUERY
$query = "SELECT * FROM propiedades";

//CONSULTAR LA BD
$resultadoConsulta = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null; // en caso de que no exista la variable resultado, entonces se sobrescribe como null, de manera que esta no altera la funcionalidad de la pagina, es como un isset().

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //var_dump($_POST);
    if($id){
    //var_dump($_POST);

    //ELIMINAR EL ARCHIVO IMAGEN
      $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
      $resultado = mysqli_query($db, $query);
      $propiedad = mysqli_fetch_assoc($resultado);

      unlink('../imagenes/' . $propiedad['imagen']);
      

    //ELIMINAR LA PROPIEDAD
      $query = "DELETE FROM propiedades WHERE id = ${id}";
      $resultado = mysqli_query($db, $query);
    }

      if($resultado) {
        header('location: /admin?resultado=3');
      }
   

}

incluirTemplate('header');
  
?>
  
  <main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <!--condicion if() para mostrar una alerta en caso de que se haya enviado todo correctamente-->
    <?php if(intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif(intval($resultado) === 2) : ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php elseif(intval($resultado) === 3) : ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente</p>  
    <?php endif; ?>
 
 
    <a href="admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
      
    <table class="propiedades">
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <!--MOSTRAR LOS RESULTADOS-->
      <tbody>
        <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
          <tr>
            <td><?php echo $propiedad['id'];?></td>
            <td><?php echo $propiedad['titulo'];?></td>
            <td><img src="/imagenes/<?php echo $propiedad['imagen'];?>" class="imagen-tabla" alt=""></td>
            <td><?php echo $propiedad['precio'];?></td>
            <td>
                <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Actualizar</a>
             <form method="POST" class="w-100"> 
                <input type="submit" class="boton-rojo-block" value="Eliminar">
                <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
             </form> 
            </td>

          </tr>
        <?php endwhile; ?>
      </tbody>

      
    </table>
  
  
  </main>

  <?php 

//CERRAR LA BD
mysqli_close($db);

  
  incluirTemplate('footer');
  
  ?>
<?php 

require '../../includes/funciones.php';//dos ../ porque de esta forma sale dos veces de carpetas
$auth = estaAutenticado();

if(!$auth){
  header('Location: /');
}


//BASE DE DATOS
require '../../includes/config/database.php';
$db = conectarDB();

//Consulta para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

  //Arreglo para imprimir mensajes de error
     $errores = [];


  // variables definidas sin valor para que al momento de que se les asigne un valor en el formulario, estas se guarden por decir "en el cache" y no se borre la info, tambien en cada campo del formulario hay que agregar value= "<?php echo $titulo; ?"  
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    // le asignamos el valor indivudual de _POST a una variable para poder usarla después.
    //AGREGAMOS Filtros de Validacion para proteger nuestra BD.
    $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
    $precio = mysqli_real_escape_string( $db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string( $db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedorId']);
    $creado = date('Y/m/d');
    //Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    //VALIDACIONES DEL FORMULARIO EN CASO DE QUE UN CAMPO ESTE VACIO
    if (!$titulo) {
      $errores[] = 'El título es Obligatorio';
    }

    if (!$precio || strlen($precio) > 10) {
      $errores[] = 'El precio es Obligatorio y debe contener menos de 10 dígitos';
    }

    if (strlen($descripcion) < 50) {
      $errores[] = 'La descripcion es Obligatoria y debe contener al menos 50 caracteres';
    }

    if (!$habitaciones) {
      $errores[] = 'El número de habitaciones es Obligatoria';
    }

    if (!$wc) {
      $errores[] = 'El numero de baños es Obligatorio';
    }

    if (!$estacionamiento) {
      $errores[] = 'El número de estacionamientos es Obligatorio';
    }

    if (!$vendedores_id) {
      $errores[] = 'Elige un vendedor';
    }

    if (!$imagen['name'] || $imagen['error']) {
      $errores[] = 'Es necesario que subas una Imagen';
    }
    //Validar la imagen de acuerdo a su tamaño(1mb como maximo):
    $medida = 1000 * 1000; //forma para modificar a kilobytes.

    if ($imagen['size'] > $medida) {
      $errores[] = 'La imagen es muy grande';
    }

   

    //echo "<pre>";
    //var_dump($errores);
    //echo "</pre>";

    //CONDICION PARA QUE NO SE EJECUTE EL CODIGO SQL SI EL ARRAY $errores TIENE UNO O MAS CAMPOS ACTIVOS
    if(empty($errores)) {

    //echo "<pre>";
    //var_dump($_FILES);
    //echo "</pre>";

      //Proceso para subir archivos (files) al disco duro:
      // 1. Crear carpeta en la raiz del proyecto
      $carpetaImagenes = '../../imagenes/';

      //2. Creamos la condicion que permita crear la carpeta si no ha sido creada anteriormente:
      if(!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
      }
      
      //3. Generar codigo unico "nombre" de la imagen:
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

      //4. Subir la imagen al disco duro(primero es seleccionar el nombre temporal de la imagen, despues el destino a donde se ira la imagen, despues el nombre que se le va a dar):
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

      //ESCRIBIR EL CODIGO SQL en donde agregamos en values la variable que estará cambiando conforme se agreguen nuevos datos.
    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id')";

    //echo $query;

    //OBTENER LOS RESULTADOS
    $resultado = mysqli_query($db, $query);

      if($resultado) {
        //echo "insertado correctamente"; utilizado para redireccionar al usuario una vez que haya enviado los datos completos a la base de datos.

        //Crear un queryString que va a permitirnos saber si nuestros datos se enviaron correctamente (resultado=1, que puede variar, incluso puede ponerse un mensaje)
        header('Location: /admin?resultado=1');
      }

    }
    
}
incluirTemplate('header');

?>
  
  <main class="contenedor seccion">
    <h1>CREAR</h1>

    <?php 
      foreach($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error;?>
    </div>  
    <?php endforeach; ?>
    

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data"> 
                            <!--method: GET retorna informacion en la url, por lo que no es segura, pero sirve cuando quieres compartir la url de algo. como un producto
                                el metodo POST es mas seguro ya que muestra los datos solo con el SUPERGLOBAL _POST 
                                La superglobal _SERVER nos imprime toda la informacion del server
                                action: toda la info que sea almacenada va a ser procesada por ese mismo archivo,
                                lo que conlleva que si hay un error, ahi mismo se muestre.
                              -->
      <fieldset>
        <legend>Información General</legend>

        <label for="titulo" >Título</label>
        <input type="text" id="titulo" name="titulo" placeholder="Título de la propiedad" value= "<?php echo $titulo; ?>" >

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" placeholder="Precio de la Propiedad" value= "<?php echo $precio; ?>">

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/jpeg image/png" name="imagen">

        <label for="descripcion">Descripción:</label>
        <textarea  id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
      </fieldset>

      <fieldset>
      <legend>Detalles de la Propiedad</legend>

      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" name="habitaciones" placeholder="Número de habitaciones" min="1" max="9" value= "<?php echo $habitaciones; ?>">

      <label for="wc">Baños:</label>
      <input type="number" id="wc" name="wc" placeholder="Número de baños" min="1" max="9" value= "<?php echo $wc; ?>">

      <label for="estacionamiento">Estacionamientos:</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Número de estacionamiento" min="1" max="9" value= "<?php echo $estacionamiento; ?>">
      </fieldset>
      
      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedorId">
          <option value="">--- Seleccione ---</option>

      <!--Codigo para insertar vendedores y nuevos vendedores desde la base de datos.-->
          <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?> <!-- se agregan : para que el codigo no finalice en } si no con endwhile-->
            <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php  echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
          <?php endwhile; ?>

        </select>
      </fieldset>

      <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

    <a href="/admin" class="boton boton-verde">Volver</a>

  </main>

  <?php 
  
  incluirTemplate('footer');
  
  ?>


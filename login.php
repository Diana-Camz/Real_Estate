<?php 
//importar conexion a base de datos
require 'includes/config/database.php';
$db = conectarDB();

$errores = []; //se hace un array con string vacio para mostrar errores.

//Autenticando el usuario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //var_dump($_POST);

  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if(!$email){
    $errores[] = "El Email no es válido"; 
  }

  if(!$password) {
    $errores[] = "El Password es obligatorio";
  }

  if(empty($errores)) {
    //revisar si el usuario existe o no
    $query = "SELECT * FROM usuarios WHERE email = '${email}'";
    $resultado = mysqli_query($db, $query);

    if($resultado->num_rows) { //num_rows recordemos que es un objeto que arroja la consulta de $db para saber si exite en la BD o no
         //si es correcto el email, primero validar si el password es correcto
        $usuario = mysqli_fetch_assoc($resultado);
      //var_dump($usuario['password']); permite que veamos unicamente el password

      $auth = password_verify($password, $usuario['password']);//funcion que ya permite saber si el password es correcto
      var_dump($auth);
        if($auth) {
          //el usuario esta autenticado. TENEMOS QUE GUARDAR QUE EL USUARIO ESTA AUTENTICADO HASTA QUE CIERRE SESION
          session_start(); //Es importante que vaya primero antes 

          //llenar el arreglo de la sesion con la superGlobal $_SESSION.
          $_SESSION['login'] = true; //se agrega 'login' y se le asigna un true. porque se supone que ya esta autenticado
          
          header('location: /admin');//si esta autenticado redirecciona al index del admin


        } else {
          $errores[] = "El Password es incorrecto";
        }

    } else {
      $errores[] = "El usuario no existe";
    }

  }
}

//Incluyendo el header
require 'includes/funciones.php';
incluirTemplate('header');
  
?>
  
  <main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="error alerta">
          <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" > <!--novalidate para no permitir que valide el navegador-->
      <fieldset>
          <legend>Email y Password</legend>

          <label for="email">E-mail</label>
          <input type="email" name="email" placeholder="Tu Email" id="email" required> <!--required es usado para validar desde el navegador con html5-->

          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Tu Password" id="password" required>
      </fieldset>

      <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

    </form>
  </main>

  <?php 
  
  incluirTemplate('footer');
  
  ?>
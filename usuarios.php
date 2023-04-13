<?php
/*  
//CODIGO PARA HASHEAR PASSWORDS CON PASSWORD_HASH DE PHP
//importar la conexion
include 'includes/config/database.php';
$db = conectarDB();

//crear las variables
$email = 'correo@correo.com';
$password = '123456';
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//query para crear el usuario
$query = "INSERT INTO usuarios (email, password)  VALUES ('${email}', '${passwordHash}');";

//enviarla a la base de datos
$resultado = mysqli_query($db, $query);

if($resultado) {
  echo "usuario enviado correctamente";
}

*/

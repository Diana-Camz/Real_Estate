<?php

function conectarDB() : mysqli { //retornará una conexion de mysqli
    $db = mysqli_connect('localhost', 'root', 'dcampos21', 'bienesraices_crud'); // al parecer si tiene contraseña

    if (!$db) {
      echo "Error en la conexión";
      exit; // si existe un error de conexion no se ejecuta el siguiente codigo.
    }

    return $db;
}
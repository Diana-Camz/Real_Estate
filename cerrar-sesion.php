<?php

session_start(); //iniciar sesion antes que nada.


$_SESSION = []; //existen funciones php que nos permiten cerrar sesion (session_unset y _destroy, pero al parecer es mejor sobrescribir/reiniciar el array $_SESSION con un arreglo vacío)

header('location: /'); //posteriormente se redirecciona a home
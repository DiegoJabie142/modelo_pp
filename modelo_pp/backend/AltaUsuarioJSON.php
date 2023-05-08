<?php

require_once "./clases/usuario.php";

$correo = isset($_POST["correo"]) ? $_POST["correo"] : NULL;
$clave = isset($_POST["clave"]) ? $_POST["clave"] : NULL;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : NULL;

$usuario = new Usuario($nombre, $correo, $clave);

var_dump($usuario->GuardarEnArchivo());

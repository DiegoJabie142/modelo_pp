<?php

require_once "./backend/clases/usuario.php";

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : NULL;
$obj_json = isset($_POST["obj_json"]) ? $_POST["obj_json"] : NULL;

$obj = json_decode($obj_json);

$usuario = new Usuario($obj->nombre, $obj->correo, $obj->clave);

switch($opcion){
    case "alta":
        var_dump($usuario->GuardarEnArchivo());
        break;
    default:
        echo "Opcion no valida";
        break;
}
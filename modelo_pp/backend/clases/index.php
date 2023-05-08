<?php

require_once "usuario.php";

$user = new Usuario(1, "Diego", "correo@correo.com", "clavefalsa123", 1 , "diego142");

var_dump(Usuario::TraerTodosJSON());
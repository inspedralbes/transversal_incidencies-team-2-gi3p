<?php
$host = "labs.inspedralbes.cat";
$usuario = "a20pedgarguz_root";
$contrasenia = "Aa123456789";
$base_de_datos = "a20pedgarguz_Incidencies";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
return $mysqli;
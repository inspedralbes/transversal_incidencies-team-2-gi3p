<?php
$mysqli = include_once "conectar.php";
$departament = $_POST["departament"];
$descripcio = $_POST["descripcio"];
$sentencia = $mysqli->prepare("INSERT INTO INCIDENCIA
(departament, descripcio)
VALUES
(?, ?)");
$sentencia->bind_param("ss", $departament, $descripcio);
$sentencia->execute();
header("Location: mostrarIdIncidencia.php")
?>
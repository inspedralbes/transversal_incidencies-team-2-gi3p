<?php
$mysqli = include_once "conectar.php";
$id_incidencia = $_POST["idInc"];
$tempsInvrt = $_POST["tempsInv"];
$descripcio = $_POST["descripcio"];
$actuacioVisible = $_POST["visible"];
$sentencia = $mysqli->prepare("INSERT INTO ACTUACIO
(incidencia, tempsInvrt, descripcio, visible)
VALUES
(?, ?, ?, ?)");
$sentencia->bind_param("iisi", $id_incidencia, $tempsInvrt, $descripcio, $actuacioVisible);
$sentencia->execute();
header("Location: gestionarIncidencia.php?idInc=$id_incidencia");
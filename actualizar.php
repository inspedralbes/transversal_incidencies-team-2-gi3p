<?php
$mysqli = include_once "conectar.php";
$id = $_POST["idInc"];
$tipus = $_POST["tipus"];
$tecnic = $_POST["tecnic"];
$prioritat = $_POST["prioritat"];
$sentencia = $mysqli->prepare("UPDATE INCIDENCIA SET
tipus = ?,
tecnic = ?,
prioritat = ?
WHERE idInc = ?");
$sentencia->bind_param("iisi", $tipus, $tecnic, $prioritat, $id);
$sentencia->execute();
header("Location: llistat_incidencies_p.php");
?>
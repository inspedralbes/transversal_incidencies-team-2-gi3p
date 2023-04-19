<?php
$mysqli = include_once "conectar.php";
$id = $_POST["idInc"];
$dataFinal = date('Y-m-d H:i:s');
$sentencia = $mysqli->prepare("UPDATE INCIDENCIA SET 
dataFi = ? 
WHERE idInc = ?");
$sentencia->bind_param("si", $dataFinal, $id);
$sentencia->execute();
header("Location: llistat_admin.php");
?>
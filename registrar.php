<?php
$mysqli = include_once "conectar.php";
$email = $_POST["correu"];
$nom = $_POST["nom"];
$cognom1 = $_POST["cg1"];
$cognom2 = $_POST["cg2"];
$pass = hash('sha256',$_POST["contrasenya"]);

$sentencia = $mysqli->prepare("INSERT INTO USUARI
(correu, nom, cognom1, cognom2, contrasenya)
VALUES
(?, ?, ?, ?, ?)");
$sentencia->bind_param("sssss", $email, $nom, $cognom1, $cognom2, $pass);
$sentencia->execute();
header("Location: index.php")
?>
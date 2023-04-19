<?php
$mysqli = include_once "conectar.php";

//obtencio de dades
$username = $_POST["user"];
$pwd = hash('sha256',$_POST["password"]);

//busqueda de usuari
$user_buscat_sentencia = $mysqli->prepare("SELECT correu, contrasenya, permis FROM USUARI WHERE correu = ? AND contrasenya = ?");
$user_buscat_sentencia->bind_param("ss", $username, $pwd);
$user_buscat_sentencia->execute();
$user_buscat_resultat = $user_buscat_sentencia->get_result();
$user = $user_buscat_resultat->fetch_assoc();
if (!$user){
    header("Location: mensajeerror.php");
}
session_start();
//guardar la informacio en session
$_SESSION['correu'] = $user["correu"];
$_SESSION['permisos'] = $user["permis"];


header("Location: index.php");
?>
<?php
$mysqli = include_once "conectar.php";
$sentencia = $mysqli->prepare("SELECT MAX(idInc) AS idIncc FROM INCIDENCIA");
$sentencia->execute();
$resultado = $sentencia->get_result();
$id = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="incidencia.css">
    <?php include("includes.php")?>

    <title>Document</title>
</head>
<body>
    <?php include("headernav.php")?>
    <div class="contenidor">
                <img style="width:80px;padding-bottom:29px;" class="check" src="check.png" alt="">
                <br>
                <h5 style="margin-left:25px;margin-right:25px;">Gràcies per enviar la incidència, la resoldrem el més aviat que ens sigui possible.</h5>
                <br>
                <br>
                <i style="color:#767676;">*Si us plau recorda l'ID de la teva incidència</i>
                <p style="font-size:25px;margin-top:25px;">L' id de la teva incidència es #<strong><?php echo $id["idIncc"]?></strong></p>
    </div>
    <?php include("footer.php")?>
</body>
</html>
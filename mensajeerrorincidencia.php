<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="incidencia.css">
    <?php include("includes.php")?>
    <link rel="stylesheet" href="mensajeerror.css">
    <title>Error!!</title>
</head>
<body>
    <?php include("headernav.php")?>
    <div class="contenidor">
        <img class="check" src="error.png" alt="">
        <br>
        <h5 >Error!!!</h5>
        <br>
        <p class="text"><b>L'id introduït no existeix!</b></p>
    </div>
    <?php include("footer.php")?>
</body>
</html>
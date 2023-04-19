<?php
   session_start();
   $mysqli = include_once "conectar.php";
   $resultado = $mysqli->query("SELECT idInc,departament,prioritat,descripcio,data,dataFi FROM INCIDENCIA");
   $incidencies = $resultado->fetch_all(MYSQLI_ASSOC);
   if (isset($_SESSION["correu"]) && $_SESSION["permisos"]==3) {?>
<!DOCTYPE html>
<html lang="ca">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="llista.css">
      <?php include("includes.php")?>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
      <title>Llista d'incidencies</title>
   </head>
   <body>
      <?php include("headernav.php")?>
      <br>
      <div class="grid1">
         <div class="grid2" id="head">
            <div class="id">
               <p>ID</p>
            </div>
            <div class="aula">
               <p>AULA</p>
            </div>
            <div class="desc">
               <p>DESC</p>
            </div>
            <div class="data">
               <p>DATA</p>
            </div>
         </div>
      </div>
      <div class="grid1">
         <?php foreach ($incidencies as $incidencia) {?>
            <?php if ($incidencia["dataFi"] == NULL) {?>
            <div class="grid2" id="g">
               <div class="id">
                  <?php echo $incidencia["idInc"] ?>
               </div>
               <div class="aula">
                  <?php echo $incidencia["departament"] ?>
               </div>
               <div class="desc"  id="desc">
                  <?php echo $incidencia["descripcio"] ?>
               </div>
               <div class="data">
                  <?php echo $incidencia["data"] ?>
               </div>
            <?php } ?>   
            </div>
         <?php } ?>
      </div>
   </body>
</html>
<?php } else{
   header("Location: errorpermisos.php");
}?>





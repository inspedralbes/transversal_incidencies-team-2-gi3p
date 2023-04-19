<?php
    session_start();
    if (!isset($_SESSION["correu"])) {
        header("Location: login.php");
    }
?>    
<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portada</title>
    <link rel="stylesheet" href="index.css">    
    <?php include("includes.php")?>
    
</head>
<body>
    <?php include("headernav.php")?>
    <h1 class="titulo">INCIDENCIES GI3P 2023</h1>
    <br>
    <br>
    <div id="graella">
    <?php
        if ($_SESSION["permisos"] == 1){?>
            <div class="center"><button onclick="location.href='llistat_admin.php'" type="button" class="btn btn-outline-dark">Llistat d'incidencies <br></button></a></div>
            <div class="center"><button onclick="location.href='informeDepartaments.php'" type="button" class="btn btn-outline-dark">Informe Departaments <br></button></a></div>
            <div class="center"><button onclick="location.href='informeTecnic.php'" type="button" class="btn btn-outline-dark">Informe Tecnics <br></button></a></div>
        <?php }
        else{
            if($_SESSION["permisos"] == 2){ ?>
                <div class="center"><button onclick="location.href='llistat_admin.php'" type="button" class="btn btn-outline-dark">Llistat d'incidencies <br></button></a></div>
            <?php }
            if($_SESSION["permisos"] == 3){ ?>
                <div class='center'><button onclick= "location.href= 'insertarincidencia.php'" type='button' class='btn btn-outline-dark'> Insertar Incidencia </button></a></div>
                <div class="center"><button onclick="location.href='llista.php'" type="button" class="btn btn-outline-dark">Llistat d'incidencies</button></a></div>
                <div class="center"><button onclick="location.href='incidenciaID.php'" type="button" class="btn btn-outline-dark">Buscar Incidencia per ID</button></a></div>

            <?php }
            
        }?>
    </div>
    <?php include("footer.php")?>
</body>
</html>
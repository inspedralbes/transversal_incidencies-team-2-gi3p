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
        <div class="center"><button onclick="location.href='insertarincidencia.php'" type="button" class="btn btn-outline-dark">Insertar Incidencia</button></a></div>
        <div class="center"><button onclick="location.href='llista.php'" type="button" class="btn btn-outline-dark">Mostrar Incidencia</button></a></div>
        <div class="center"><button onclick="location.href='incidenciaID.php'" type="button" class="btn btn-outline-dark">Buscar Incidencia per ID</button></a></div>
        <div class="center"><button onclick="location.href='llistat_admin.php'" type="button" class="btn btn-outline-dark">Mostrar Incidencia <br>(Administrador)</button></a></div>

        
    </div>
    <?php include("footer.php")?>
</body>
</html>
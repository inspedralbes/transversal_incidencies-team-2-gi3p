<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar incidencia per ID</title>
    <?php include ("includes.php")?>
    <link rel="stylesheet" href="incidenciaID.css">
</head>
<body>
    <?php include("headernav.php")?>
    <h1>Buscar incidencia per ID</h1>
    <form action="mostrarIncidencia.php" method="get">
        <div class="id">
            <input type="text" name="IdIncidencia" id="IdInc">
        </div>
    </form>
    <footer><?php include("footer.php")?></footer>
    
</body>
</html>
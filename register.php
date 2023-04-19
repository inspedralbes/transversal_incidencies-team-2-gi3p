<?php
    session_start();
?>  
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari d'incidencia</title>
    <?php include("includes.php")?>
    <link rel="stylesheet" href="incidencia.css">
</head>
<body>
    <?php include("headernav.php")?>
    <form action="registrar.php" method="post">
        <div class="contenidor">
            <div>
                <h1>Registra't</h1>
                <label for="nom" class="form-label mt-4">Introdueix el teu nom</label>
                <div class="block">
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <label for="cg1" class="form-label mt-4">Introdueix el teu primer cognom</label>
                <div class="block">
                    <input type="text" class="form-control" id="cognom1" name="cg1" required>
                </div>
                <label for="cg2" class="form-label mt-4">Introdueix el teu segon cognom</label>
                <div class="block">
                    <input type="text" class="form-control" id="cognom2" name="cg2" required>
                </div>
                <div class="form-group">
                    <label for="correu" class="form-label mt-4">Correu Electronic</label>
                    <input type="email" class="form-control" id="correu" name="correu" aria-describedby="emailHelp" placeholder="Introdueix el teu correu" required>
                    <small id="emailHelp" class="form-text text-muted">Mai compartirem el teu correu amb algú.</small>
                </div>
                <div class="form-group">
                    <label for="contra" class="form-label mt-4">Contrasenya</label>
                    <input type="password" class="form-control" id="contra" placeholder="Contrasenya" name="contrasenya" required="" minlength="8">
                </div>
                <br>
                <input type="submit" value="Envia">
                
                </div>
        </div>
    </form>
    <?php include("footer.php")?>
</body>
</html>
<?php
$mysqli = include_once "conectar.php";
$resultado_departament = $mysqli->query("SELECT idDep, nomDep FROM DEPARTAMENT");
$departament = $resultado_departament->fetch_all(MYSQLI_ASSOC);
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
    <form action="insertar.php" method="post">
        <div class="contenidor">
            <div>
                <h1>Incidències</h1>
                <label for="dpt" class="form-label mt-4">Selecciona un departament</label>
                <select class="form-select" id="departament" name="departament">
                    <?php
                        foreach ($departament as $departament) { ?>
                        <option value=<?php echo $departament["idDep"] ?> > <?php echo $departament["nomDep"] ?></option>
                    <?php } ?>
                </select>
                <label for="desc" class="form-label mt-4">Descripció: </label>
                <textarea class="form-control" id="desc" name ="descripcio" rows="5"></textarea>
                <br>
                <input type="submit" value="Envia">
                
                </div>
        </div>
    </form>
    <?php include("footer.php")?>
</body>
</html>
<?php
$mysqli = include_once "conectar.php";
$id = $_GET["IdIncidencia"];
$sentencia = $mysqli->prepare("SELECT idInc, data, prioritat, descripcio, resolt, TIPOLOGIA.nomTip, TECNIC.nomTec, DEPARTAMENT.nomDep FROM INCIDENCIA 
LEFT JOIN TIPOLOGIA 
ON TIPOLOGIA.idTip = INCIDENCIA.tipus
LEFT JOIN TECNIC
ON TECNIC.idTec = INCIDENCIA.tecnic
LEFT JOIN DEPARTAMENT
ON DEPARTAMENT.idDep = INCIDENCIA.departament 
WHERE idInc = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
$resultado = $sentencia->get_result();
$incidencia = $resultado->fetch_assoc();

$sentencia_actuacio = $mysqli->prepare("SELECT idAct, data, descripcio, tempsInvrt FROM ACTUACIO WHERE visible = 1 AND incidencia = ?");
$sentencia_actuacio->bind_param("i", $id);
$sentencia_actuacio->execute();
$resultat_actuacio = $sentencia_actuacio->get_result();
$actuacio = $resultat_actuacio->fetch_all(MYSQLI_ASSOC);

if (!$incidencia) {
    exit("No hay resultados para ese ID");
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar incidencia</title>
    <?php include ("includes.php")?>
    <link rel="stylesheet" href="mostarIncidencia.css">
</head>
<body>
    <?php include("headernav.php")?>
    <h1>Incidencia per ID</h1>
    <div class="contenedor">
        <div class="form-group">
            <h2><label for="id" class="form-label mt-4">ID</label></h2>
            <input type="text" class="form-control" id="id" size="20" value="<?php echo $incidencia["idInc"] ?>" readonly>
            <h2><label for="departament" class="form-label mt-4">Departament</label></h2>
            <input type="text" class="form-control" id="departament" value="<?php echo $incidencia["nomDep"] ?>" readonly>
            <h2><label for="descripcio" class="form-label mt-4">Descripció</label></h2>
            <textarea class="form-control" id="descripcio" rows="3" readonly><?php echo $incidencia["descripcio"] ?></textarea> 
        </div>
    </div>
    <div class="accordion" id="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Actuacions
                </button>
            </h2>
            <?php
            foreach ($actuacio as $actuacio) { ?>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $actuacio["descripcio"]?>  </p>
                           
                    </div>
            <?php } ?>
        
    </div>
  </div>
    </div>
    
    <footer>
        <?php include("footer.php")?>
    </footer>
    
</body>
</html>
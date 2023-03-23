<?php
$mysqli = include_once "conectar.php";
$id = $_GET["idInc"];
$sentencia = $mysqli->prepare("SELECT idInc, data, prioritat, descripcio, TIPOLOGIA.nomTip, TECNIC.nomTec, DEPARTAMENT.nomDep FROM INCIDENCIA 
LEFT JOIN TIPOLOGIA 
ON TIPOLOGIA.idTip = INCIDENCIA.tipus
JOIN TECNIC
ON TECNIC.idTec = INCIDENCIA.tecnic
JOIN DEPARTAMENT
ON DEPARTAMENT.idDep = INCIDENCIA.departament 
WHERE idInc = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
$resultado = $sentencia->get_result();
$incidencia = $resultado->fetch_assoc();

$sentencia_actuacio = $mysqli->prepare("SELECT idAct, data, descripcio, tempsInvrt FROM ACTUACIO WHERE incidencia = ?");
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
    <title>Prueba</title>
</head>
<body>

    <h1>Dades Incidencia</h1>

    <h2>Id Incidencia:</h2>
    <?php echo $incidencia["idInc"]?>
    
    <h2>Departament</h2>
    <?php echo $incidencia["nomDep"]?>
    
    <h2>Descripció</h2>
    <?php echo $incidencia["descripcio"]?>

    <table>
        <tr>
            <th>ID_ACTUACIO</th>
            <th>DATA</th>
            <th>TEMPS_INVERT</th>
            <th>DESCRIPCIO</th>
        </tr>
        <?php
            foreach ($actuacio as $actuacio) { ?>
                <tr>
                    <td><?php echo $actuacio["idAct"]?></td>
                    <td><?php echo $actuacio["data"]?></td>
                    <td><?php echo $actuacio["tempsInvrt"]?></td>
                    <td><?php echo $actuacio["descripcio"]?></td>
                </tr>
        <?php } ?>
    </table>

    <h1>Registrar Actuacio</h1>
    <form action="registrarActuacio.php" method="POST">
        <!--ID INCIDENCIA-->
        <input type="hidden" name="idInc" value="<?php echo $incidencia["idInc"] ?>">

        <!--TEMPS INVERTIT-->
        <label for="tempsInv">Temps invertit:</label><br>
        <input type="number" name="tempsInv" id="tempsInv" max="99999" required><br>

        <!--DESCRIPCIO-->
        <label for="descripcio">Descripció:</label><br>
        <textarea placeholder="Descripció" name="descripcio" id="descripcio" cols="30" rows="10" required></textarea>

        <!--ACTUACIO VISIBLE-->
        <p>Actuació visible:</p>
        <input type="radio" id="visibleSI" name="visible" value=1>
        <label for="visibleSI">SI</label><br>
        <input type="radio" id="visibleNO" name="visible" value=0 checked="checked">
        <label for="visibleNO">NO</label><br>

        <input type="submit" value="Submit">

    </form>
    <form action="tancarIncidencia.php" method="POST">
        <!--ID INCIDENCIA-->
        <input type="hidden" name="idInc" value="<?php echo $incidencia["idInc"] ?>">

        <input type="submit" value="Tancar Incidencia">
    </form>


</body>
</html>
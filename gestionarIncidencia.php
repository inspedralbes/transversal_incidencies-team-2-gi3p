<?php
    session_start();
    if (isset($_SESSION["correu"]) && $_SESSION["permisos"]==2) {
        
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
            header("Location:mensajeerrorincidencia.php");
        }
    ?>

    <!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba</title>
        <?php include("includes.php")?>
        <link rel="stylesheet" href="gestionarincidencia.css">
    </head>
    <body> 
        <?php include("headernav.php")?>    
        <div class="contenidor1">
        <img style="width:80px;padding-bottom:29px;" class="check" src="informacionlogo.png" alt="">
            <div class="lista">
                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5>Id Incidencia</h5>
                    <span class="badge bg-primary rounded-pill"><?php echo $incidencia["idInc"]?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5>Departament</h5>
                    <span ><?php echo $incidencia["nomDep"]?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5>Descripció</h5>
                    <span ><?php echo $incidencia["descripcio"]?></span>
                </li>
                </ul>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID_ACTUACIO</th>
                        <th scope="col">DATA</th>
                        <th scope="col">TEMPS_INVERT</th>
                        <th scope="col">DESCRIPCIO</th>
                    </tr>
                </thead>
                <?php
                    foreach ($actuacio as $actuacio) { ?>
                        <tr class="table-active">
                            <td><?php echo $actuacio["idAct"]?></td>
                            <td><?php echo $actuacio["data"]?></td>
                            <td><?php echo $actuacio["tempsInvrt"]?></td>
                            <td><?php echo $actuacio["descripcio"]?></td>
                        </tr>
                <?php } ?>
            </table>
        </div>
        <div class="contenidor">
            <h1>Registrar Actuacio</h1>
            <form action="registrarActuacio.php" method="POST">
                <!--ID INCIDENCIA-->
                <input type="hidden" name="idInc" value="<?php echo $incidencia["idInc"] ?>">

                <!--TEMPS INVERTIT-->
                <label for="tempsInv">Temps invertit:</label><br>
                <input type="number" name="tempsInv" id="tempsInv" max="99999" required><br>

                <!--DESCRIPCIO-->
                <div class="form-group">
                    <label for="descripcio" class="form-label mt-4">Descripció: </label>
                    <textarea class="form-control" placeholder="Descripció" name="descripcio" id="descripcio" cols="30" rows="10" required></textarea>
                </div>   

                <!--ACTUACIO VISIBLE-->
                <p>Actuació visible:</p>
                <div class="form-check">
                    <label class="form-check-label" for="visibleSI"><input class="form-check-input" type="radio" id="visibleSI" name="visible" value=1>Si</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="visibleNO"><input class="form-check-input" type="radio" id="visibleNO" name="visible" value=0 checked="checked">No</label><br>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Registrar Actuacio">
            </form>
        </div>
        <form action="tancarIncidencia.php" method="POST">
            <!--ID INCIDENCIA-->
            <input type="hidden" name="idInc" value="<?php echo $incidencia["idInc"] ?>">
                <br>
                <div class="botontancar">
                    <input style="width:85%;" class="btn btn-primary" type="submit" value="Tancar Incidencia">
                </div>
        </form>
        <br>
        <?php include("footer.php")?>   
    </body>
    </html>
<?php } else{
        header("Location: errorpermisos.php");
    }
?>

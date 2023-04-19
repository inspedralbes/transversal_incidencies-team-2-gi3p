<?php
session_start();
if (isset($_SESSION["correu"]) && $_SESSION["permisos"] == 2) { ?>
    <!DOCTYPE html>
    <html lang="ca">
    <?php
    include_once "includes.php";
    ?>
    <link rel="stylesheet" href="estileditar.css">
    <?php
    $mysqli = include_once "conectar.php";
    $id = $_GET["idInc"];
    $sentencia = $mysqli->prepare("SELECT idInc, data, prioritat, descripcio, dataFi, tipus, tecnic, departament, TIPOLOGIA.nomTip, TECNIC.nomTec, DEPARTAMENT.nomDep FROM INCIDENCIA 
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

    $resultado_prioritat = $mysqli->query("SELECT idPrio, nomPrio FROM PRIORITAT");
    $prioritats = $resultado_prioritat->fetch_all(MYSQLI_ASSOC);

    $resultado_tecnics = $mysqli->query("SELECT idTec, nomTec FROM TECNIC");
    $tecnics = $resultado_tecnics->fetch_all(MYSQLI_ASSOC);

    $resultado_tipus = $mysqli->query("SELECT idTip, nomTip FROM TIPOLOGIA");
    $tipus = $resultado_tipus->fetch_all(MYSQLI_ASSOC);

    ?>

    <div>
        <div class="centrat">
            <h1>Actualizar incidencia</h1>
            <form action="actualizar.php" method="POST">
                <!--ID INCIDENCIA-->
                <input type="hidden" name="idInc" value="<?php echo $incidencia["idInc"] ?>">

                <!--PRIORITAT-->
                <div>
                    <label for="prioritat">Prioritat</label>
                    <select class="form-select" name="prioritat" id="prioritat">
                        <?php

                        if ($incidencia["prioritat"] == NULL) { ?>
                            <option value="" selected>---</option>
                        <?php } else { ?>
                            <option value="">---</option>
                        <?php }

                        foreach ($prioritats as $prioritats) { ?>
                            <?php if ($incidencia["prioritat"] == NULL) { ?>
                                <option value=<?php echo $prioritats["idPrio"] ?>> <?php echo $prioritats["nomPrio"] ?></option>
                            <?php } else {
                                if ($prioritats["idPrio"] == $incidencia["prioritat"]) { ?>
                                    <option value=<?php echo $prioritats["idPrio"] ?> selected> <?php echo $prioritats["nomPrio"] ?>
                                    </option>
                                <?php } else { ?>
                                    <option value=<?php echo $prioritats["idPrio"] ?>> <?php echo $prioritats["nomPrio"] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <!--TIPO-->
                <div>
                    <label for="tipus">Tipus:</label>
                    <select class="form-select" name="tipus" id="tipus">

                        <?php
                        if ($incidencia["tipus"] == NULL) { ?>
                            <option value="" selected>---</option>
                        <?php } else { ?>
                            <option value="">---</option>
                        <?php }

                        foreach ($tipus as $tipus) { ?>
                            <?php if ($incidencia["tipus"] == NULL) { ?>
                                <option value=<?php echo $tipus["idTip"] ?>> <?php echo $tipus["nomTip"] ?></option>
                            <?php } else {
                                if ($tipus["idTip"] == $incidencia["tipus"]) { ?>
                                    <option value=<?php echo $tipus["idTip"] ?> selected> <?php echo $tipus["nomTip"] ?></option>
                                <?php } else { ?>
                                    <option value=<?php echo $tipus["idTip"] ?>> <?php echo $tipus["nomTip"] ?></option>
                                <?php } ?>
                            <?php } ?>

                        <?php } ?>

                    </select>
                </div>
                <br>
                <!--TECNIC-->
                <div>
                    <label for="tecnic">Tecnic:</label>

                    <select class="form-select" name="tecnic" id="tecnic">

                        <?php
                        if ($incidencia["tecnic"] == NULL) { ?>
                            <option value="" selected>---</option>
                        <?php } else { ?>
                            <option value="">---</option>
                        <?php }

                        foreach ($tecnics as $tecnics) { ?>
                            <?php if ($incidencia["tecnic"] == NULL) { ?>
                                <option value=<?php echo $tecnics["idTec"] ?>> <?php echo $tecnics["nomTec"] ?></option>
                            <?php } else {
                                if ($tecnics["idTec"] == $incidencia["tecnic"]) { ?>
                                    <option value=<?php echo $tecnics["idTec"] ?> selected> <?php echo $tecnics["nomTec"] ?></option>
                                <?php } else { ?>
                                    <option value=<?php echo $tecnics["idTec"] ?>> <?php echo $tecnics["nomTec"] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                    </select>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Envia">

            </form>

        </div>
    </div>
    </html>

<?php } else {
  header("Location: errorpermisos.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="llistat_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Llista_Admin</title>
</head>
<?php
    $mysqli = include_once "conectar.php";
    $resultado = $mysqli->query("SELECT idInc, data, prioritat, descripcio, resolt, TIPOLOGIA.nomTip, TECNIC.nomTec, DEPARTAMENT.nomDep FROM INCIDENCIA 
        LEFT JOIN TIPOLOGIA 
        ON TIPOLOGIA.idTip = INCIDENCIA.tipus
        LEFT JOIN TECNIC
        ON TECNIC.idTec = INCIDENCIA.tecnic
        LEFT JOIN DEPARTAMENT
        ON DEPARTAMENT.idDep = INCIDENCIA.departament");
    $incidencies = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<body>
    <div class="titol">
        <h1>Incidències</h1>
    </div>
    <div class="grid1" id="sticky">
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
            <div class="prio">
                <p>PRIO</p>
            </div>
            <div class="resolt">
                <p>RESOLT</p>
            </div>
            <div class="tipus">
                <p>TIPUS</p>
            </div>
            <div class="tecnic">
                <p>TÈCNIC</p>
            </div>
            <div class="editar">
                <p></p>
            </div>
        </div>
    </div>
    <div class="grid1">
        <?php
            foreach ($incidencies as $incidencies) { ?>
            <div class="grid2" id="g">
                <div class="id">
                    <p><?php echo $incidencies["idInc"] ?></p>
                </div>
                <div class="aula">
                    <p><?php echo $incidencies["nomDep"] ?></p>
                </div>
                <div class="desc"  id="desc">
                    <p><?php echo $incidencies["descripcio"] ?></p>
                </div>
                <div class="data">
                    <p><?php echo $incidencies["data"] ?></p>
                </div>
                <div class="prio">
                    <p><?php echo $incidencies["prioritat"] ?></p>
                </div>
                <div class="resolt">
                    <p><?php
                        if($incidencies["resolt"]==1){
                            echo "SI";
                        } else {
                            echo "NO";
                        }?></p>
                    </div>
                <div class="tipus">
                    <p><?php echo $incidencies["nomTip"] ?></p>
                </div>
                <div class="tecnic">
                    <p><?php echo $incidencies["nomTec"] ?></p>
                </div>
                <div class="editar">
                    <p>
                        <a href="editar.php?idInc=<?php echo $incidencies["idInc"] ?>">Editar</a>
                        <br>
                        <a href="gestionarIncidencia.php?idInc=<?php echo $incidencies["idInc"] ?>">Gestionar</a>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>

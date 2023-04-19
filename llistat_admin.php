<?php
   session_start();
   if (isset($_SESSION["correu"]) && $_SESSION["permisos"]==2 || $_SESSION["permisos"]==1) { ?> 
    <!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="llistat_admin.css">
        <?php include("includes.php")?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <title>Llistat d'incidencies d'administradors i tecnics</title>
    </head>
    <?php
        $mysqli = include_once "conectar.php";
        $resultado = $mysqli->query("SELECT idInc, data, PRIORITAT.nomPrio, descripcio,dataFi, TIPOLOGIA.nomTip, TECNIC.nomTec, DEPARTAMENT.nomDep FROM INCIDENCIA 
            LEFT JOIN PRIORITAT
            ON PRIORITAT.idPrio = INCIDENCIA.prioritat
            LEFT JOIN TIPOLOGIA
            ON TIPOLOGIA.idTip = INCIDENCIA.tipus
            LEFT JOIN TECNIC
            ON TECNIC.idTec = INCIDENCIA.tecnic
            LEFT JOIN DEPARTAMENT
            ON DEPARTAMENT.idDep = INCIDENCIA.departament
            ORDER BY PRIORITAT.idPrio");
        $incidencies = $resultado->fetch_all(MYSQLI_ASSOC);
    ?>
    <body>
        <?php include("headernav.php")?>
        <br>
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
            $clasColor=NULL;
                foreach ($incidencies as $incidencia) { 

                    if($incidencia["nomPrio"] == "ALTA"){

                        $clasColor="red";

                    } elseif($incidencia["nomPrio"] == "MITJA"){

                        $clasColor="yellow";

                    } elseif($incidencia["nomPrio"] === "BAIXA") {

                        $clasColor="green";

                    } else{
                        $clasColor="white";
                    }?>
                    <?php if ($incidencia["dataFi"] == NULL) {?>
                    <div class="grid2 <?php echo $clasColor ?>" id="g">
                        <div class="id">
                            <p><?php echo $incidencia["idInc"] ?></p>
                        </div>
                        <div class="aula">
                            <p><?php echo $incidencia["nomDep"] ?></p>
                        </div>
                        <div class="desc"  id="desc">
                            <p><?php echo $incidencia["descripcio"] ?></p>
                        </div>
                        <div class="data">
                            <p><?php echo $incidencia["data"] ?></p>
                        </div>
                        <div class="prio">
                            <p><?php echo $incidencia["nomPrio"] ?></p>
                        </div>
                        <div class="resolt">
                            <p><?php if($incidencia["dataFi"]==NULL){
                                echo "NO";
                            } else {
                                echo "SI";
                            }?></p>
                        </div>
                        <div class="tipus">
                            <p><?php echo $incidencia["nomTip"] ?></p>
                        </div>
                        <div class="tecnic">
                            <p><?php echo $incidencia["nomTec"] ?></p>
                        </div>
                        <div class="editar">
                            <?php if(isset($_SESSION["correu"]) && $_SESSION["permisos"]==1){?>
                                <a href="editar.php?idInc=<?php echo $incidencia["idInc"] ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                            <?php } else { ?>
                                <a href="gestionarIncidencia.php?idInc=<?php echo $incidencia["idInc"] ?>"><button type="button" class="btn btn-primary btn-sm">Gestionar</button></a>
                            <?php } ?>
                            <br>
                        </div>
                    </div>
                <?php } ?>
                <?php } ?>
            </div>   
        </body>
    </html>
<?php } else{
    header("Location: errorpermisos.php");
} ?>
    


<?php
    $mysqli = include_once "conectar.php";
    $resultado = $mysqli->query("SELECT idInc,departament,prioritat,descripcio,data FROM INCIDENCIA");
    $incidencies = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="llista.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="titol">
        <h1>Incidències</h1>
    </div>
    <div class="grid1">
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
        </div>
    </div>
    <div class="grid1">
        <?php foreach ($incidencies as $incidencies) { ?>
            <div class="grid2" id="g">
                <div class="id">
                    <?php echo $incidencies["idInc"] ?>
                </div>
                <div class="aula">
                    <?php echo $incidencies["departament"] ?>
                </div>
                <div class="desc"  id="desc">
                    <?php echo $incidencies["descripcio"] ?>
                </div>
                <div class="data">
                    <?php echo $incidencies["data"] ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
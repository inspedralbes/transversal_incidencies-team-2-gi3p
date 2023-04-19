<?php
session_start();
if (isset($_SESSION["correu"]) && $_SESSION["permisos"] == 1) { ?>
    <!DOCTYPE html>
    <html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="informeDepartaments.css">
        <?php include("includes.php") ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <title>Informe tecnics</title>
    </head>
    <?php
    $mysqli = include_once "conectar.php";
    $tecnics = $mysqli->query("SELECT * FROM informeTecnic");

    $nomTec = [];
    $numIncidenArray = [];
    $tempsInv = [];
    ?>
    <body>
        <?php include("headernav.php")?>
        <h1>Informe de tecnics</h1>
        <div class="bs-component">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Incidencies Asig.</th>
                        <th>Temps inv.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tecnics as $tecnic) {
                        if ($tecnic['nomTec'] == null) {
                            $nomTec[] = "No asignades";
                        } else {
                            $nomTec[] = $tecnic['nomTec'];
                        }
                        $numIncidenArray[] = $tecnic['incidenciesAsig'];

                        $tempsInv[] = $tecnic['temps'];

                        ?>
                        <tr>
                            <td>
                                <?php
                                if ($tecnic['nomTec'] == null) {
                                    echo "No asignades";
                                } else {
                                    echo $tecnic['nomTec'];
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $tecnic['incidenciesAsig']; ?>
                            </td>
                            <td>
                                <?php
                                if ($tecnic['temps'] == null) {
                                    echo 0;
                                } else {
                                    echo $tecnic['temps'];
                                }
                                ?>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </body>
    <?php include("footer.php")?>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        <?php
        $arrayNTec = json_encode($nomTec);
        $arrayInci = json_encode($numIncidenArray);
        ?>
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo $arrayNTec ?>,
                datasets: [{
                    label: ' incidencies',
                    data: <?php echo $arrayInci ?>,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>

<?php } else {
    header("Location: errorpermisos.php");
} ?>
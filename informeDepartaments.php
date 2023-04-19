<?php
session_start();
if (isset($_SESSION["correu"]) && $_SESSION["permisos"] == 1) { ?>
  <!DOCTYPE html>
  <html lang="cat">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="informeDepartaments.css">
    <?php include("includes.php") ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Informe Departaments</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <?php
  $mysqli = include_once "conectar.php";
  $departaments = $mysqli->query("SELECT * FROM InformeDepartament");

  $nomDepArray = [];
  $numIncidenArray = [];
  $tempsInv = [];
  ?>

  <body>
    <?php include("headernav.php") ?>
    <div class="bs-component">
    <h1>Informe de departaments</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Departament</th>
            <th>Num Incidencies</th>
            <th>Temps inv.</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($departaments as $departament) {
            $nomDepArray[] = $departament['nomDepartament'];
            $numIncidenArray[] = $departament['nombreIncidencies'];
            if ($departament['temps'] == null) {
              $tempsInv[] = "0";
            } else {
              $tempsInv[] = $departament['temps'];
            }
            ?>
            <tr>
              <td>
                <?php echo $departament['nomDepartament']; ?>
              </td>
              <td>
                <?php echo $departament['nombreIncidencies']; ?>
              </td>
              <td>
                <?php if ($departament['temps'] == null) {
                  echo "0";
                } else {
                  echo $departament['temps'];
                }?>
                
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <?php
    $arrayDeps = json_encode($nomDepArray);
    $arrayInci = json_encode($numIncidenArray);
    $arrayTemps = json_encode($tempsInv);
    ?>

    <div>
      <canvas id="myChart"></canvas>
    </div>
    <!--<div class="canvas">
    <canvas id="myChart1"></canvas>
    </div>-->
    <?php include "footer.php" ?>
  </body>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: <?php echo $arrayDeps ?>,
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

  <script>
    const ctx = document.getElementById('myChart1');

    <?php
    $arrayDeps = json_encode($nomDepArray);
    $arrayTemps = json_encode($tempsInv);
    ?>
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo $arrayDeps ?>,
        datasets: [{
          label: ' Temps Inv.',
          data: <?php echo $arrayTemps ?>,
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
        indexAxis: 'y',
        scales: {
          y: {
            ticks: {
              beginAtZero: true
            }
          }
        }
      }
    });
  </script>
  <?php include("footer.php")?>

<?php } else {
  header("Location: errorpermisos.php");
} ?>
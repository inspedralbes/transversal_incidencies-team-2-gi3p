<?php
    session_start();
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
    <form action="iniciasessio.php" method="post">
        <div class="contenidor">
                <h1>Incidències</h1>
                <br>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="user" placeholder="name@example.com">
                    <label style="margin-left:100px;" for="floatingInput">Email address</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label style="margin-left:100px;" for="floatingPassword">Password</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Inicia Sessió</button>
</div>
    </form>
    <?php include("footer.php")?>
</body>
</html>




<nav style = "top:0px;position:sticky;z-index:2;" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">TEAM2 G3P</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
            
            <?php if (isset($_SESSION["correu"])){ ?>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Inici</a>
                </li>
                <?php if ($_SESSION["permisos"] == 3) {?>
                    <li class="nav-item">
                        <a class="nav-link active" href="insertarincidencia.php">Insertar Incidencies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="llista.php">Llistat d'incidencies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="incidenciaID.php">Buscar incidencia</a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION["permisos"] == 2) {?>
                    <li class="nav-item">
                        <a class="nav-link active" href="llistat_admin.php">Llistat d'incidencies</a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION["permisos"] == 1) {?>
                    <li class="nav-item">
                        <a class="nav-link active" href="llistat_admin.php">Llistat d'incidencies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="informeDepartaments.php">Informe de departaments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="informeTecnic.php">Informe de tecnics</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="logout.php" class= "nav-link active"> Tancar Sessió</a>
                </li>
            <?php }
                else { ?>
                    <li class="nav-item">
                        <a class= "nav-link active" href="login.php">Inicia Sessió</a>
                    </li>
                    <li class="nav-item">
                        <a class= "nav-link active" href="register.php">Registra't</a>
                    </li>
                <?php }
            ?>
            

            
            
            
        </ul>
        </div>
    </div>
</nav>
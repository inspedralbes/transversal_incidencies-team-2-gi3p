<?php
include_once "includes.php";
?>
<link rel="stylesheet" href="estileditar.css">
<?php
$mysqli = include_once "conectar.php";
$id = $_GET["idInc"];
$sentencia = $mysqli->prepare("SELECT idInc, data, prioritat, descripcio, resolt, tipus, tecnic, departament FROM INCIDENCIA WHERE idInc = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
$resultado = $sentencia->get_result();
# Obtenemos solo una fila, que será el videojuego a editar
$incidencia = $resultado->fetch_assoc();

$resultado_tecnics = $mysqli->query("SELECT idTec, nomTec FROM TECNIC");
$tecnics = $resultado_tecnics->fetch_all(MYSQLI_ASSOC);

$resultado_tipus = $mysqli->query("SELECT idTip, nomTip FROM TIPOLOGIA");
$tipus = $resultado_tipus->fetch_all(MYSQLI_ASSOC);

if (!$incidencia) {
    exit("No hay resultados para ese ID");
}

?>
<div>
    <div class="centrat">
        <h1>Actualizar incidencia</h1>

        <form class="formcentrat" action="actualizar.php" method="POST">

            <!--ID INCIDENCIA-->
            <input type="hidden" name="idInc" value="<?php echo $incidencia["idInc"] ?>">
            
            <!--PRIORITAT-->
            <div>
                <label class="" for="prioritat">Prioritat</label>
                <select class="form-select" name="prioritat" id="prioritat">
                    <option value="-">-----</option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baixa">Baixa</option>
                </select>
            </div>
            <br>
            <!--TIPO-->
            <div>
                <label for="tipus">Tipus:</label>
                <select class="form-select" name="tipus" id="tipus">
                    <option value="-">-----</option>
                <?php
                    foreach ($tipus as $tipus) { ?>
                    <option value=<?php echo $tipus["idTip"] ?> > <?php echo $tipus["nomTip"] ?></option>
                <?php } ?>

                </select>
            </div>
            <br>
            <!--TECNIC-->
            <div>
                <label for="tecnic">Tecnic:</label>

                <select class="form-select" name="tecnic" id="tecnic">
                    <option value="-">-----</option>
                <?php
                    foreach ($tecnics as $tecnics) { ?>
                    <option value=<?php echo $tecnics["idTec"] ?> > <?php echo $tecnics["nomTec"] ?></option>
                <?php } ?>

                </select>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Envia">

        </form>

    </div>
</div>
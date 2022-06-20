<?php
$alert = '';
$IMG   = '';
include 'conexion.php';
session_start();
$id_ = $_SESSION['usuarioo'];

if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
} else {
    if (isset($_POST['buscar'])) {
        $ID_        = $_POST['iD'];
        $query      = "SELECT * from  agu_SolicitudesImagen where sol_id=$ID_";
        $resultadoo = sqlsrv_query($con, $query);
        while ($fila = sqlsrv_fetch_array($resultadoo)) {
            $IMG = $fila['sol_Descipcion'];

        }
        /* header("Location: Imagen.php?imagenes=" . urlencode($IMG));

        echo $IMG;*/

        sqlsrv_close($con);
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'includes/head.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" media="all" href="css/estilo.css">
    <?php include "includes/scriptes.php";?>
    <title>IMagenes</title>

</head>
<body>
   <div class="container container-form-lg" style="background-color: white">
        <h3 class="titulo">Imagenes</h3>


        <form  method="POST" id="formulario" action="Mostrar.php" >
            <div class="form-row">
                <div class="col form-group col-md-3" id="" >
                    <label>ID A Buscar:</label>
                </div>
                <div class="col form-group " id="" >
                     <input type="text" name="iD" id="iD" style="width: 300px;height: 28px;font-size: 12px"  class="form-control" id=""  placeholder="" value="" >
                </div>
            </div>

             <img src="<?php echo ($IMG); ?>">
            <button type="submit" name="buscar" id="buscar">Buscar</button>
</form>

    </div>
</body>
</html>

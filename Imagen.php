<?php
$alert = '';
$IMG   = '';
include 'conexion3.php';
session_start();
$id_       = $_SESSION['usuarioo'];
$idImagen_ = $_GET['imagenes'];
if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
}
echo "$idImagen_";
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


        <form  method="POST" id="formulario"  >

            <img src="<?php echo ($idImagen_;) ?>">

?>


</form>

    </div>
</body>
</html>

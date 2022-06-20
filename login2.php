<?php
$alert = '';
session_start();

if (isset($_POST['insert'])) {

    if ($_POST['rol'] == 'rol2') {
        include "conexion.php";

        $user = $_POST['usuario'];
        $clav = $_POST['pass'];

        $query = "SELECT * from tblPlomeros where PLO_ID = '$user'";
        $stmt  = sqlsrv_query($con, $query);
        $ID    = "";
        if ($stmt > 0) {
            while ($fila = sqlsrv_fetch_array($stmt)) {
                $ID = $fila['plo_id'];
            }

            if ($ID == $clav) {
                $_SESSION['active']   = true;
                $_SESSION['usuarioo'] = $user;
                header('Location: Servicio.php');
                die();
            } else {
                $alert = 'Usuario o Contraseña INCORRECTOS';
                session_destroy();
            }

        } else {
            $alert = 'Usuario o Contraseña INCORRECTOS';
            session_destroy();
        }
    } else if ($_POST['rol'] == 'rol1') {
        header('Location: Detalle.php');
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include "includes/scriptes.php";?>
<title>Login /  Sistema Plomeros</title>
<link href="css/font-roboto" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/font-awesome.css">
<style type="text/css">

*{
    margin: 0;
    padding: 0;
}
body{
  background: rgba(168, 160, 159, 0.8);
    line-height: 18px;
    background-image: url(imagenfondo.jpg);
  margin: 0 auto;
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center ;
}
.form-group::before{
    font-family: "Font Awesone\ 5 free";
}

.form-group#user-group::before{
    content: "\f007";
}
.form-group#pass-group::before{
    content: "\f023";
}
</style>


</head>
<body>
  <div class= "container container-form">
       <center><img src="gotita.png" width="200px"></center>
        <h3 class="titulo">Ingreso Sistema</h3>
         <br><br>
         <form class="form needs-validation" id="formulario" name="formulario" novalidate method="POST" action="login2.php">

                <div id="Ingresar" >
                   <div class="col form-row " id="" >
          <label><input type="radio"  name="rol" id="rol1" value="rol1" required> Encargado</label>&nbsp;&nbsp;
          <label><input type="radio"  name="rol" id="rol2" value="rol2"  required> Plomero</label></center></div>
  <div class="form-group" >
                 <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="user-group" class="form-control" placeholder="Usuario" value="" required  >
        <div class="invalid-feedback">
                   Ingrese su usuario
                </div>
      </div>
      <div class="form-group">
                <label for="usuario">Contraseña:</label>
        <input type="password" name="pass" id="pass-group" class="form-control"  placeholder="Contraseña" value="" required  >
        <div class="invalid-feedback">
                   Ingrese su contraseña
                </div>
      </div>
            <div class="form-group alert"> <?php echo isset($alert) ? $alert : ''; ?></div>

      <div class="form-group">
        <button type="submit" id="insert" name="insert" class="btn btn-primary btn-block"><span class = "fa fa-arrow-right"></span>  Ingresar <br />
      </div></div>
    </form>
  </div>
  </div>
  <!---------------------------------------Mostrar div con radio Button-----------------------------
  <script type="text/javascript">
        function toggle(elemento) {
          if(elemento.value=="encargado") {
              document.getElementById("Ingresar").style.display = "block";
           }
            }
</script>-->

<!--------------------------------------enviar button seleccionado--------------------------------------->
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
    {
    $("#insert").click(function () {
      $('input:radio[name=rol]:checked').val();
      $("#formulario").submit();
      });
     });
</script>
<?php include "includes/fooder.php";?>
</body>
</html>
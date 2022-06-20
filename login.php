<?php
$alert = '';

session_start();

if (isset($_POST['insertt'])) {

    include "conexion.php";

    $user = $_POST['usuario'];
    $clav = $_POST['pass'];

    $query = "SELECT * from SEG_GRUPO where ID_USU_ENC=$user";
    $stmt  = sqlsrv_query($con, $query);
 
    
        while ($fila = sqlsrv_fetch_array($stmt)) {
            $ID_USU_ENC_ = $fila['ID_USU_ENC'];
        }
     

        if ($user=='381' || $user=='380') {
           if ($ID_USU_ENC_ == $clav) {
            $_SESSION['active']   = true;
            $_SESSION['usuarioo'] = $user;
            $Var=1;
            header("Location: Servicio.php?var=$Var");
            die();
          }
        } else {

            $_SESSION['active']   = true;
            $_SESSION['usuarioo'] = $user;
            $Var=2;
            $consultarGRUPO="SELECT  a.ID_USU_ENC ,b.NOMBRE_USU, (select count(*) from SEG_PLOMEROSPORENCARGADO a
            left join SEG_USUARIOS b on a.ID_USU_ENC = b.ID_USU
            where a.PLO_ID='$user' and a.ID_USU_ENC in(380,381))as total  from SEG_PLOMEROSPORENCARGADO a
            left join SEG_USUARIOS b on a.ID_USU_ENC = b.ID_USU
            where a.PLO_ID='$user' and a.ID_USU_ENC in(380,381)";
            $resultadogrupo= sqlsrv_query($con, $consultarGRUPO);
            while($datos=sqlsrv_fetch_array($resultadogrupo)){
              $encargado=$datos['ID_USU_ENC'];
              $total=$datos['total'];
            }
              if (isset($encargado)) {
             
            if ($total==2) {
            header("Location: Servicio_Grupos.php?var=$Var");
            }else{
            header("Location: Servicio.php?var=$Var");
            }}else
            {

              $alert="El usuario no existe";
            }
            
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
    <form class="form needs-validation" novalidate method="POST" action="login.php">
      <div class="form-group">

        <label for="usuario">Usuario:</label>

        <input type="text" name="usuario" id="usuariou" class="form-control" placeholder="Usuario" value="" required  >
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
        <button type="submit" id="click" name="insertt" class="btn btn-primary btn-block"><span class = "fa fa-arrow-right"></span>  Ingresar <br />
      </div>
    </form>
  </div>
  </div>
<?php include "includes/fooder.php";
      


?>

</body>
</html>
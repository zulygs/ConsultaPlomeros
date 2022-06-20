<?php
$alert = '';
include "conexion.php";
session_start();

if (isset($_POST['inserttt'])) {

    

    $user = $_POST['usuario'];
    $clav2 = $_POST['pass'];
    setcookie ("user", "$user", time () + 604800);
    setcookie ("clav", "$clav2", time () + 604800);

   

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
            echo "$user";
            }else{
           echo "$user";
            }
            }else
            {

              $alert="El usuario no existe";
              session_destroy();
            }
           
            
        

    

    if($_COOKIE['clav']<>"")
{
  $user=$_COOKIE['user'];
$clav=$_COOKIE['clav'];
  
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
            echo "$user";
            }else{
            echo "$user";
            }
            }else
            {

              $alert="El usuario no existe";
            }
           
            
        }

    }else{
$archivoActual = $_SERVER['PHP_SELF'];
header("refresh:1;url=" + $archivoActual );
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
    <form class="form needs-validation" novalidate method="POST" action="pruebalogin.php">
      <div class="form-group">

        <label for="usuario">Usuario:</label>

        <input type="text" name="usuario" id="usuariou" class="form-control" placeholder="Usuario" value="<?php
        if(isset($_COOKIE['user'])){
          echo($_COOKIE['user']) ;}?>" required  >
        <div class="invalid-feedback">
                   Ingrese su usuario
                </div>
      </div>
      <div class="form-group">
                <label for="usuario">Contraseña:</label>
        <input type="password" name="pass" id="pass-group" class="form-control"  placeholder="Contraseña"   value="<?php 
        if(isset($_COOKIE['clav'])){
          echo($_COOKIE['clav']) ;
        }?>" required  >
        <div class="invalid-feedback">
                   Ingrese su contraseña
                </div>
      </div>
      
            <div class="form-group alert"> <?php echo isset($alert) ? $alert : ''; ?></div>

      <div class="form-group">
        <button type="submit" id="click" name="inserttt" class="btn btn-primary btn-block"><span class = "fa fa-arrow-right"></span>  Ingresar <br />
      </div>
    </form>
  </div>
  </div>
<?php include "includes/fooder.php";
      


?>

</body>
</html>
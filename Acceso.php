<?php 
include 'conexion.php';
session_start();
$id_ = $_SESSION['usuarioo'];

$sol_id_ = $_GET['sol_ID'];
 $lote=$_REQUEST['lote'];
    $Servicio=$_REQUEST['Servicios'];
      date_default_timezone_set('America/Guatemala');
        $fechahora=date("Y-m-d H:i:s");
if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
}else{

 $Asignado="SELECT  plo_id from agu_SolicitudesDeServicio where sol_id='$sol_id_'";
  $result=sqlsrv_query($con,$Asignado);
  while($row=sqlsrv_fetch_array($result)){
    $plo_id_=$row['plo_id'];

  }
   if ($plo_id_=='' || $plo_id_=='0') {//ASIGNADA Y EN RUTA
    $insertEST="INSERT into EstadoSolicitud (sol_id,plo_id,estado1,hora1,estado2,hora2,estado3,hora3,estado4,hora4) values('$sol_id_','$id_',1,'$fechahora',0,'',0,'',0,'')";
    $resuEST=sqlsrv_query($con, $insertEST);
          $update="UPDATE agu_SolicitudesDeServicio set plo_id='$id_', ploest=1 where sol_id='$sol_id_'";
          $resu=sqlsrv_query($con, $update);
        if ($resu) { 
          header("Location: Resultado.php?sol_ID=$sol_id_&%20id_=$id_&%20lote=$lote&%20Servicios=$Servicio");
             }     
            
   }else{
     if($plo_id_==$id_){//ENTRA SOLO SI ESTA ASIGNADA

  header("Location: Resultado.php?sol_ID=$sol_id_&%20id_=$id_&%20lote=$lote&%20Servicios=$Servicio ");


  }else{//LA ASIGNACION ES DIFERENTE A LA SESION
  echo "  <script type='text/javascript'>
  alert('Esto ya esta Asignado a otro plomero');
  window.history.back();
  </script>";

  }
   }
 

            
}
            /*if ($total==2) {
                echo "string";
            //header("Location: Servicio_Grupos.php?var=$Var");
            }else{
                echo "2";
            //header("Location: Servicio.php?var=$Var");
            }*/




























            /*  <?php
session_start();
$id_ = $_SESSION['usuarioo'];
include 'conexion.php';
if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
} else {
    //********************GUARDAR REGISTROS**************************
   // $sol_id__         = $_GET['sol_id_'];
    $sol_id__         = '235828';
    $det_Lectura_     = $_POST['det_Lectura'];
    $det_Descripcion_ = $_POST['det_Descripcion'];
    
    $det_usuario_     = $id_;
    $det_concepto_    = $_POST['det_concepto'];
    $det_Fecha_       = $_POST['det_FechaResolvio'];
    date_default_timezone_set("America/Guatemala");
    $fechaRegistro = date("Y-m-d H:i:s");
    $hora          = date("H:i:s");

    //-----------------si esta checkeado es 1 de lo contario 2-------
   /* if (isset($_POST['det_Recibido'])) {
        $Recibido = 1;
    } else {
        $Recibido = 2;
    }
    if (isset($_POST['PlomeroAsignado'])) {
       $plo_id_          = $_POST['IdPlomero'];
    } else {
        $plo_id_          = $id_;
    }*/
   

    //---------------si es SI es 1 de lo contrario 2-----------------
    /*if ($_REQUEST['Completada']) {
        $Completo = $_POST['Completada'];
    }*/
   /* echo "solicitud: $sol_id__
    ";
    echo "lectura: $det_Lectura_
    ";
    echo "descripcion: $det_Descripcion_
    ";
    echo "usuario: $det_usuario_
    ";
    echo "concepto: $det_concepto_
    ";
    echo "fecha: $det_Fecha_
    ";
    echo "fecha de registro: $fechaRegistro
    ";
    echo "si firmo: $Recibido
    ";
    echo "id del plomero: $plo_id_
    ";
    echo "se realizo: $Completo
    ";
*/
    

   /* $sql = "INSERT INTO Agu_DetSolicitudesDeServicio (sol_id, det_Lectura,det_Descripcion,det_Fecha,plo_id,det_Recibido,det_usuario,det_concepto,det_FechaResolvio) VALUES ('$sol_id__', '$det_Lectura_','$det_Descripcion_','$det_Fecha_ $hora','$plo_id_','$Recibido','$plo_id_','$det_concepto_','$fechaRegistro')";
  
    sqlsrv_query($con, $sql);

   
   if (isset($_REQUEST['check'])) {
  
        $nombreImgn = $_FILES['imagen']['name'];

       $nombreImg = $_FILES['imagen']['name']="$sol_id__";
        $archivo   = $_FILES['imagen']['tmp_name'];
        $typo= explode('.', $nombreImgn);
        $extension=array_pop($typo);
        $junto=$nombreImg.'.'.$extension;

        
        $ruta      = "img";
        $ruta      = $ruta . "/" . $junto;
        move_uploaded_file($archivo, $ruta);

        if (!$con) {
            die("Error: " . sqlsrv_connect_error());
        }
        echo "$ruta";
   
       // $queryY = "INSERT into agu_SolicitudesImagen(sol_id,sol_Descripcion) values('$sol_id__', '$ruta')";
      /*  $queryY = "update  agu_SolicitudesImagen set sol_Descripcion = '$ruta'";
        sqlsrv_query($con, $queryY);*/
        /* if($queryY){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } */

  // }
   /* $Query = "UPDATE agu_SolicitudesDeServicio SET sol_Estado=$Completo,sol_Resultado=$Completo  WHERE sol_id=$sol_id__";
    sqlsrv_query($con, $Query);*/
    //*************************CERRAMOS CONEXION************************************
   //sqlsrv_close($con);
   /* echo "<script>
    alert('¡El Resultado Ha Sido Guardado!');
    javascript:window.history.back();
    </script>";*/
//}

    ?>
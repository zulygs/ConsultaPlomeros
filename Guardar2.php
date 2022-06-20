  <?php
session_start();
$id_ = $_SESSION['usuarioo'];
include 'conexion.php';
if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
} else {
    //--------------------GUARDAR REGISTROS----------------------------
    $sol_id__         = $_GET['sol_id_'];
    $RadioLC_         = $_POST['RadioLC'];
    $det_Descripcion_ = $_POST['det_Descripcion'];
    $det_usuario_     = $id_;
    $det_Fecha_       = $_POST['det_FechaResolvio'];
    date_default_timezone_set("America/Guatemala");
    $fechaRegistro = date("Y-m-d H:i:s");
    $hora          = date("H:i:s");
    //--------------------verificar si trae concepto o lectura----------
    if ($RadioLC_==1) {
        $det_Lectura_     = $_POST['det_Lectura'];
        $det_concepto_    = 0;
    } else {
        $det_Lectura_     = 0;
        $det_concepto_    = $_POST['det_concepto'];
    }
    //--------------------si esta checkeado es 1 de lo contario 2-------
    if (isset($_POST['det_Recibido'])) {
        $Recibido = 1;
    } else {
        $Recibido = 2;
    }
    if (isset($_POST['PlomeroAsignado'])) {
       $plo_id_          = $_POST['IdPlomero'];
    } else {
        $plo_id_          = $id_;
    }
    //--------------------si es SI es 1 de lo contrario 2----------------
    if ($_REQUEST['Completada']) {
        $Completo = $_POST['Completada'];
    }
    //--------------------Insert Agu_DetSolicitudesDeServicio------------
    $sql = "INSERT INTO Agu_DetSolicitudesDeServicio (sol_id, det_Lectura,det_Descripcion,det_Fecha,plo_id,det_Recibido,det_usuario,det_concepto,det_FechaResolvio,det_HoraResolvio,det_tipo) VALUES ('$sol_id__', '$det_Lectura_','$det_Descripcion_','$det_Fecha_' ,'$plo_id_','$Recibido','$plo_id_','$det_concepto_','$fechaRegistro','$hora','Web')";


      
    sqlsrv_query($con, $sql);
    //---------------------INSERT almacenamos las propiedades de las imagenes-------------------------
   if (isset($_REQUEST['check'])) {
    $name_array     = $_FILES['imagen']['name'];
    $tmp_name_array = $_FILES['imagen']['tmp_name'];
    $type_array     = $_FILES['imagen']['type'];
    $size_array     = $_FILES['imagen']['size'];
    $error_array    = $_FILES['imagen']['error'];
    $j=0;
    for($i = 0; $i < count($tmp_name_array); $i++){//recorremos el array de imagenes para subirlas al simultaneo
        $j++;
        $typo= explode('.', $name_array[$i]);
        $extension=array_pop($typo);
        $imagencompel= $name_array[$i]="$sol_id__".$j.'.'.$extension;
         $imagencompell= $name_array[$i]="$sol_id__".$j.'.'.$extension;
       
        if(move_uploaded_file($tmp_name_array[$i], "img/".$name_array[$i])){
           $queryY = "INSERT into agu_SolicitudesImagen(sol_id,sol_Descripcion) values('$sol_id__', '$imagencompel')";
           sqlsrv_query($con, $queryY);
       }
   }
}
    
    $fechahora=date("Y-m-d H:i:s");
    //----------------------------------------UPDATE  agu_SolicitudesDeServicio guardado------------------------------------------
    $Query = "UPDATE agu_SolicitudesDeServicio SET sol_Estado=$Completo,sol_Resultado=$Completo,ploest=4  WHERE sol_id=$sol_id__";
    sqlsrv_query($con, $Query);
    //---------------------------------------UPDATE EstadoSolicitud EstadoSolicitud guardado -------------------------------------
     $Queryyr = "UPDATE EstadoSolicitud set estado4=4,hora4='$fechahora' where sol_id=$sol_id__";
    sqlsrv_query($con, $Queryyr);
    //*************************CERRAMOS CONEXION************************************
   sqlsrv_close($con);
    echo "<script>
    alert('¡El Resultado Ha Sido Guardado!');
    javascript:window.history.go(-2);
    </script>";
}

?>
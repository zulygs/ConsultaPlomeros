<?php  
include("conexion.php");
$sol_id_=$_GET['solicitud'];
date_default_timezone_set('America/Guatemala');
$fechahora=date("Y-m-d H:i:s");
if ($_GET['cambio']==0) {//DESASIGNAR Y ESTADO 0
	
	 $update="UPDATE agu_SolicitudesDeServicio set plo_id=0, ploest='0' where sol_id=$sol_id_";
            sqlsrv_query($con, $update);
     $update4="DELETE  from  EstadoSolicitud  where sol_id=$sol_id_";
     sqlsrv_query($con, $update4);

}else if($_GET['cambio']==2){//EN Ruta
     $update2="UPDATE agu_SolicitudesDeServicio set ploest=2 where sol_id=$sol_id_";
            sqlsrv_query($con, $update2);
     $update22="UPDATE EstadoSolicitud set estado2=2,hora2='$fechahora' where sol_id=$sol_id_";
     sqlsrv_query($con, $update22);
}else if($_GET['cambio']==3){//EN CAMINO
	 $update3="UPDATE agu_SolicitudesDeServicio set ploest=3 where sol_id=$sol_id_";
            sqlsrv_query($con, $update3);
     $update33="UPDATE EstadoSolicitud set estado3=3,hora3='$fechahora' where sol_id=$sol_id_";
     sqlsrv_query($con, $update33);
}


 ?> 
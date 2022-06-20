<?php 
//239961
//239918
include(
"conexion.php");
$querys="SELECT COUNT(*)as total  from EstadoSolicitud where sol_id=239961";

  $resultt=sqlsrv_query($con,$querys);
 

  while ($filas=sqlsrv_fetch_array($resultt)) {
 	//print_r( $filas);

  }

$va="2021-06-21 16:32:32.000";


//echo "$va";


$created_at = "2021-06-21 16:32:32.000";
echo date('H:i:s',strtotime($created_at));
 ?>
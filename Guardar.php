<?php

include "conexion.php";

$sql = "INSERT INTO prueba_guardarResultado (det_i,sol_i, det_Lectur,det_Descripcio,det_Fech,plo_i,det_Recibid,det_usuari,det_concept,det_FechaResolvi,det_HoraResolvi) VALUES (1,1, 1,'det_Descripcion','2020-02-01',1,1,1,2,'2020-02-01','10:00:00')";
echo "$sql";
sqlsrv_query($con, $sql);
sqlsrv_close($con);

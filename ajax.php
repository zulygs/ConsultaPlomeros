<?php
include "conexion.php";
session_start();

if (empty($_POST)) {
} else {
    
        
        if ($_POST['action'] == 'searchLot2') {

            if ($_POST['inm_idd']) {
                $id_m = $_POST['inm_idd'];
             
                $ejeqlote = sqlsrv_query($con, "SELECT * from tblPlomeros where plo_id like '$id_m' and plo_estado=0");
                $fila = 0;

                while ($fila = sqlsrv_fetch_array($ejeqlote)) {
                    
                    echo json_encode($fila, JSON_UNESCAPED_UNICODE);
                }
            exit;
        }  }
  
    
    

   
   
    exit;
}
exit;

?>

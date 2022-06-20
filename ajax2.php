<?php
include "conexion.php";


    
        
     

         
                echo"hola";
                $IdUsuario = $_POST['IdUsuario'];
             
                $consultaGrupo = sqlsrv_query($con, "SELECT distinct a.sect_Id,a.sect_Nombre  from tblSectores a
left join SEG_ENCARGADOSECTORES b
on a.sect_Id = b.SECT_ID
where b.ID_USU_ENC='381'");
              
                $fila = 0;
          
$data = array();   
while($row = sqlsrv_fetch_array($consultaGrupo)) {
   $data[] = array(
    "sect_Id" => $row["sect_Id"],
      
      "sect_Nombre" => $row["sect_Nombre"]

   );
   //print_r($row);
   
}

header("Content-type: application/json");
echo json_encode(array("data" => $data));
  
    
   



   
   
 



?>

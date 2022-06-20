<?php
include("conexion.php");

$category=$_POST["category"];


$query="SELECT distinct a.sect_Id,a.sect_Nombre  from tblSectores a
left join SEG_ENCARGADOSECTORES b
on a.sect_Id = b.SECT_ID
where b.ID_USU_ENC='$category'";
$result = sqlsrv_query($con,$query);


while ($fila = sqlsrv_fetch_array($result)) {
    echo '<option value="'.$fila["sect_Id"].'">'.$fila["sect_Nombre"].'</option>';
}



  




/*$query="SELECT * from usuarios";
$result = sqlsrv_query($con,$query);


while ($fila = sqlsrv_fetch_array($result)) {
    echo '<option value="'.$fila["idusuario"].'">'.$fila["nombre"].'</option>';
}*/

 ?>
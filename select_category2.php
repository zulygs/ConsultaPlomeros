<?php
include("conexion.php");

$category=$_POST["category"];


$query="SELECT distinct a.are_Id,a.are_Nombre  from tblareas a
left join SEG_ENCARGADOSECTORES b
on a.are_Id = b.ARE_ID
where b.ID_USU_ENC='$category'";
$result = sqlsrv_query($con,$query);


while ($fila = sqlsrv_fetch_array($result)) {
    echo '<option value="'.$fila["are_Id"].'">'.$fila["are_Nombre"].'</option>';
}



  




/*$query="SELECT * from usuarios";
$result = sqlsrv_query($con,$query);


while ($fila = sqlsrv_fetch_array($result)) {
    echo '<option value="'.$fila["idusuario"].'">'.$fila["nombre"].'</option>';
}*/

 ?>
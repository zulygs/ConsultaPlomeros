<?php

 

include'conexion.php';
session_start();
$id_ = $_SESSION['usuarioo'];
$id_=$_REQUEST["id_"];
$cual=$_REQUEST["cual"];
$EsPlomero=$_REQUEST["EsPlomero"];

//echo "string";
if ($EsPlomero==2) {
  if ($cual==1 ) {
  $Sector_Select=$_REQUEST["Sector_Select"];
  $result = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.PLO_ID='$id_' and c.sect_Id ='$Sector_Select'
        order by a.sol_id desc";
$e=sqlsrv_query($con,$result);
}
 else if ($cual==2 ) {
  $Area_Select=$_REQUEST["Area_Select"];
  $result = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.PLO_ID='$id_' and c.are_id ='$Area_Select'
        order by a.sol_id desc";
$e=sqlsrv_query($con,$result);
}
else if ($cual==3) {
 
  $Area_Select=$_REQUEST["Area_Select"];
  $Sector_Select=$_REQUEST["Sector_Select"];
  $result = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.PLO_ID='$id_' and c.are_id ='$Area_Select' and c.sect_Id='$Sector_Select'
        order by a.sol_id desc";
$e=sqlsrv_query($con,$result);
}
}
else{ 

if ($cual==1 ) {
  $Sector_Select=$_REQUEST["Sector_Select"];
  $result = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='$id_' and c.sect_Id ='$Sector_Select'
        order by a.sol_id desc";
$e=sqlsrv_query($con,$result);
}
 else if ($cual==2 ) {
  $Area_Select=$_REQUEST["Area_Select"];
  $result = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='$id_' and c.are_id ='$Area_Select'
        order by a.sol_id desc";
$e=sqlsrv_query($con,$result);
}
else if ($cual==3) {
 
  $Area_Select=$_REQUEST["Area_Select"];
  $Sector_Select=$_REQUEST["Sector_Select"];
  $result = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='$id_' and c.are_id ='$Area_Select' and c.sect_Id='$Sector_Select'
        order by a.sol_id desc";
$e=sqlsrv_query($con,$result);
}

}
 
 

$data = array();   
while($row = sqlsrv_fetch_array($e)) {
   $data[] = array(
   	"sol_id" => $row["sol_id"],
      "sol_fecha" => date_format($row["sol_fecha"],"Y-m-d H:i:s"),
      "sol_Descripcion" => $row["sol_Descripcion"],
      "inm_id" => $row["inm_id"],
      "lote" => $row["lote"],
      "ser_id" => $row["ser_id"],
      "are_id" => $row["servicio"],
      "r" => '<td><center>
                     <a href="Acceso.php?sol_ID='.$row['sol_id'].'&id_='.$id_.'&lote='.$row["lote"].'&Servicios='.$row["servicio"].'"  data-toggle="tooltip" title="Servicio" class="btn btn-sm btn-info">Asignar</a></td></center>'

   );
   
}

header("Content-type: application/json");
echo json_encode(array("data" => $data));

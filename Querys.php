
    <?php  
$sql2="SELECT sect_Id,sect_Nombre from tblSectores";
    $result2 = sqlsrv_query($con,$sql2);
 
 $userData = array();
 
 while($row=$result2->fetch(PDO::FETCH_ASSOC)){
  
  $userData['sect_Id'][] = $row;
 }
 
 echo json_encode($userData);
//solo sector
 
//solo area
/*include 'conexion.php';
$q     = $_POST['q'];
$resultadoConsulta = '';
$msg = 'El pais recibido en segundo plano ahora es ';

*/


            //$epalee     = $_POST['q'];
/*$epalee=intval($_GET['q']);
$id_='380';
echo "$epalee";*/
/*$sql2="SELECT sect_Id,sect_Nombre from tblSectores";
    $result2 = sqlsrv_query($con,$sql2);
    



   $data=$result2->fetch(PDO::FETCH_ASSOC);
  header('Content-Type: application/json');
        echo json_encode($arrResultado);*/
/*

    $sql3="SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='$id_' and c.are_id =1
        order by a.sol_id desc";
//area y sector
    $result3 = sqlsrv_query($con,$sql3);

    $sql4="SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio,c.are_id 
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='$id_' and  c.are_id =2 and  c.sect_Id =2
        order by a.sol_id desc";

$result4 = sqlsrv_query($con,$sql4);
*/

?>



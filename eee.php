<?php
    $alert = '';
 
   include('conexion.php');
    session_start();
    

    if (!isset($_SESSION['active'])) {
        echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
    } else{ 
      $where = "";
  
  if(!empty($_POST))
  {
    $valor = $_POST['campo'];
    if(!empty($valor)){
      $where = "";
    }
  }
   
  $query = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio
from agu_SolicitudesDeServicio a 
left join tblInmuebles b
on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
left join tblDetalleUbicacionInmueble c
on b.det_id = c.det_Id
left join SEG_PLOMEROSPORSECTOR d
on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID where d.PLO_ID=46
order by a.sol_id desc";
 $resultado=sqlsrv_query($con,$query);
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body>
         <div class="container" >
       <center><h2>Servicios <img src="gotita.png" width="100px"></h2></center>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th >ID</th>
              <th >FECHA</th>
              <th >DESCRIPCION</th>
              <th >INMUEBLE</th>
              <th >LOTE</th>
              <th >ID SERVICIO</th>
              <th >SERVICIO</th>
              <th >ACCIÓN</th>
            </tr>
        </thead>
         <tbody>
            <?php while($row = sqlsrv_fetch_array($resultado)) { ?>
              <tr>
                <td><?php echo $row['sol_id']; ?></td>
                <?php $VA=$row['sol_fecha'];
                $va1=$VA->format('Y/m/d');?>
                <td><?php echo $va1 ?></td>
                <td><?php echo $row['sol_Descripcion']; ?></td>
                <td><?php echo $row['inm_id']; ?></td>
                <td><?php echo $row['lote']; ?></td>
                <td><?php echo $row['ser_id']; ?></td>
                <td><?php echo $row['servicio']; ?></td>
            
                <td><a href="modificar.php?id=<?php echo $row['sol_id']; ?>">
                  <span class="codigo"> 

<input type=image src="images/edit.ico" width="25" height="15"> 

                  editar</span></a></td>
              </tr>
            <?php } ?>
           </tbody>
        
       
    </table></div>
    </body>
    <script type="text/javascript">
       $(document).ready(function () {

            $('#example').DataTable({
                language: {

                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
              
            });
        });
    </script>
</html>
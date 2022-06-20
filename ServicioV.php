
<?php
$alert = '';
//$user_=$_SESSION['user'];
include 'conexion.php';

$mostrar=0;

$fechanow=date("Y-m-d");
if (isset($_POST['buscar'])) {
$fecha=$_POST["fechas"];
//echo "$fecha";

  $query="SELECT sol_id,dbo.alote(inm_id) as lote,sol_fecha,sol_Descripcion,dbo.devuelveNombreServicio(ser_id) as servicio, 
   dbo.recuperaNombreUsuario(ser_usuario) as usuario,ser_TelefonoOtroSolicitante,plo_id,dbo.recuperaNombrePlomero(plo_id) as nombreplo
   from agu_SolicitudesDeServicio where  sol_Estado=2 and CAST(sol_fecha as date) ='$fecha' 
   order by sol_id asc";
   $result=sqlsrv_query($con,$query);
 
   $mostrar=1;
}
 /* date_default_timezone_set("America/Guatemala");
    $fechaRegistro = date("Y-m-d H:i:s");
    $hora          = date("H:i:s");
    echo "$fechaRegistro";*/
  
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php';?>
  <?php //include 'Querys.php';?>
  <title>Servicios</title>
</head>
<body>
  <div class="container">
    <center>
      <h2>
       Vania De Leon
        <img src="gotita.png" width="100px">
      </h2>
    </center>
    <div>
      <center>
        <h5>
      </h5>
    </center>
  </div>
  <form class="form needs-validation" novalidate method="POST" action="ServicioV.php">
  <div class="col row  col-md-6" style="width:600px">
    <div class="">
     <input type="date" name="fechas" class="form-control" value="<?php echo($fechanow) ?>">
    </div>
    &nbsp;&nbsp;
    <br>
    <div class="col form-group col-md-3"> 
      <center> 
    <button type="" name="buscar" class="btn btn-primary " id="buscar"  style="height: 40px">Buscar</button>

    </center>
  </div>




<br> 
<br> 
    </div>
  </form> 
     
    <br> 

<br>
<?php if ($mostrar==1) {

 ?>
<div  id="tabla">
  <table id="tablax" class="table table-striped table-bordered table-responsive table table-striped table-bordered" style="width:100%" >
    <title>tabla principal</title>
    <thead>
      <tr>
        <th data-dynatable-column="rank"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID</a></th>
        <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">FECHA</a></th>
        <th data-dynatable-column="us-$"    class="dynatable-head"><a class="dynatable-sort-header" href="#">DESCRIPCION</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">LOTE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID Plomero</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">Plomero Asignado</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">Tel. Solicitante</a></th>
      </tr>
    </thead>
    <tbody>
      <?php
     

      while ($row = sqlsrv_fetch_array($result)) {?>
        <tr>
          <?php $VA = $row['sol_fecha'];
          $va1= $VA->format('Y/m/d H:i:s');?>
          <td><?php echo $row['sol_id']; ?></td>
          <td><?php echo $va1 ?></td>
          <td><?php echo $row['sol_Descripcion']; ?></td>
          <td><?php echo $row['lote']; ?></td>
          <td><?php echo $row['servicio']; ?></td>
           <td><?php echo $row['plo_id']; ?></td>
            <td><?php echo $row['nombreplo']; ?></td>
          <td><?php echo $row['ser_TelefonoOtroSolicitante']; ?></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
</div>

 <?php  }?>
    

 <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
     <script>
      $(document).ready(function () {
        $('#tablax').DataTable({
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

                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
              });
      });
    </script>
 


</body>
</html>
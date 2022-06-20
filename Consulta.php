<?php
$alert = '';

include 'conexion.php';
session_start();

if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
} else {
    $where = "";

    if (!empty($_POST)) {
        $valor = $_POST['campo'];
        if (!empty($valor)) {
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
    $resultado = sqlsrv_query($con, $query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="http://www.dynatable.com">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/reset.css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/bootstrap-2.3.2.min.css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/application.css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/project.css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/pygments.css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/share.css">
    <link href="//fonts.googleapis.com/css?family=Nunito:300" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/dynatable-docs.css">
    <!-- resources for project demos //-->
    <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css"></head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=" http://jspkg.com/packages/dynatable/package.json">


    <title>Servicios</title>
</head>
<body>
    <div class="container" style="margin-top: 25px;padding: 10px">
       <center><h2>Servicios <img src="gotita.png" width="100px"></h2></center>
    <table id="tablax" class="table table-striped table-bordered table-responsive" >
         <thead>
            <tr>
              <th>ID</th>
              <th>FECHA</th>
              <th>DESCRIPCION</th>
              <th>INMUEBLE</th>
              <th>LOTE</th>
              <th>ID SERVICIO</th>
              <th>SERVICIO</th>
              <th>ACCIÓN</th>

            </tr>
          </thead>

          <tbody>
            <?php while ($row = sqlsrv_fetch_array($resultado)) { ?>
              <tr>
                <td><?php echo $row['sol_id']; ?></td>
                <?php $VA = $row['sol_fecha'];
                $va1 = $VA->format('Y/m/d');?>
                <td><?php echo $va1 ?></td>
                <td><?php echo $row['sol_Descripcion']; ?></td>
                <td><?php echo $row['inm_id']; ?></td>
                <td><?php echo $row['lote']; ?></td>
                <td><?php echo $row['ser_id']; ?></td>
                <td><?php echo $row['servicio']; ?></td>

                <td><a href="modificar.php?id=<?php echo $row['sol_id']; ?>"><span class="glyphicon glyphicon-pencil">editar</span></a></td>
              </tr>
            <?php }?>
           </tbody>
    </table>
</div>


    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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
                scrollY: 400,
                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });
    </script>
</body>
</html>
<?php
$alert = '';

//$user_=$_SESSION['user'];
include 'conexion.php';
session_start();
$id_ = $_SESSION['usuarioo'];
$Var_ = $_GET['var'];
//echo($Var_);
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
    if ($Var_==1) {
       $query = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.PLO_ID='$id_' and d.ARE_I=4
        order by a.sol_id desc";
       }else{
        
         $query = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='$id_'
        order by a.sol_id desc";
       } 
    
    
    $resultado = sqlsrv_query($con, $query);

    $queryy     = "SELECT * from tblPlomeros where PLO_ID=$id_";
    $resultadoo = sqlsrv_query($con, $queryy);
    while ($fila = sqlsrv_fetch_array($resultadoo)) {
        $Nombre   = $fila['plo_nombres'];
        $Apellido = $fila['plo_apellidos'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php';?>
    <title>Servicios</title>
</head>
<body>
  <div class="container">
      <center>
        <h2>
          <?php if ($Var_==1) {
         echo("Encargado");
       }else{
         echo("Plomero");

       } ?>
       <img src="gotita.png" width="100px">
     </h2>
   </center>
   <div >
    <center>
      <h5><?php  if ($Var_==1) {
         echo(""); 
       }else{
         echo $Nombre . " " . $Apellido ;

       }?>
         
       </h5>
     </center>
   </div>

    <div class="col form-row  table-bordered " style="width:auto">
      <div class="col form-group col-md-3"> 
      <input type="checkbox" id="Sector" name="Sector" value="Sector" onchange="showUser(this.value)">
      <label for="Sector"> Sector</label><input type="" name="sec" id="sec" class="form-control" style="width:70%;display: none" >
      </div>
      <div class="col form-group col-md-3"> 
      <input type="checkbox" id="Area" name="Area" value="Area" onchange="showUser(this.value)">
      <label for="Area">Area</label><input type="" name="are" id="are" class="form-control" style="width:70%;display: none"><br>
      </div>
      <br> 
      <button>Buscar</button>
    </div>
    <br> 
  


</form>
<br>


    <table id="tablax" class="table table-striped table-bordered table-responsive table table-striped table-bordered" style="width:100%" >

          <thead>
            <tr>
              <th data-dynatable-column="rank"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID</a></th>
              <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">FECHA</a></th>
              <th data-dynatable-column="us-$"    class="dynatable-head"><a class="dynatable-sort-header" href="#">DESCRIPCION</a></th>
              <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">INMUEBLE</a></th>
              <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">LOTE</a></th>
              <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID SERVICIO</a></th>
              <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">SERVICIO</a></th>
              <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ACCIÓN</a></th>


            </tr>
          </thead>

          <tbody id="wenas">
          <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("wenas").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("wenas").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getlist.php?q="+$vart,true);
    xmlhttp.send();
  }
}
</script>
           </tbody>
    </table>
</div>
 <div>
           <center><button class="btn btn-info btn-group-lg "> <a href="salir.php"><font color="white">Cerrar Sesión</font></a></button></center>
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

                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });
    </script>
  <script type="">
    

               $(document).ready(function(){
  $('#Sector').on('change',function(){
    if (this.checked) {
     $("#sec").show();
     $vart=1;
    } else {
     $("#sec").hide();
    }  
  })
   $('#Area').on('change',function(){
    if (this.checked) {
     $("#are").show();
     $vart=2;
    } else {
     $("#are").hide();
    }  
  })
});</script>

</body>
</html>
/************************************************************************************************************************************/
<?php
$alert = '';
//$user_=$_SESSION['user'];
include 'conexion.php';
session_start();
$id_ = $_SESSION['usuarioo'];
$Var_ = $_GET['var'];
//echo($Var_);
$vart=0;
$vart2=0;
if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
} else {
  $where = "";
  $consultar="SELECT sect_Id,sect_Nombre from tblSectores order by sect_Id,sect_Codigo";
  $resultadoos = sqlsrv_query($con, $consultar);
  $consultar2="SELECT are_id,are_Nombre from tblareas";
  $resultadoos2 = sqlsrv_query($con, $consultar2);
  if (!empty($_POST)) {
    $valor = $_POST['campo'];
    if (!empty($valor)) {
      $where = "";
    }
  }
  if ($Var_==2) {// plomero o encargado
    $query = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.PLO_ID='$id_' 
        order by a.sol_id desc";
        $resultado = sqlsrv_query($con, $query);
      }else{
        $query = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio
        from agu_SolicitudesDeServicio a
        left join tblInmuebles b
        on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
        left join tblDetalleUbicacionInmueble c
        on b.det_id = c.det_Id
        left join SEG_SECTORESPORENCARGADOS d
        on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID 
    left join SEG_PLOMEROSPORENCARGADO e
    on e.ID_USU_ENC = d.ID_USU_ENC   
    where  e.ID_USU_ENC='380'
        order by a.sol_id desc";
        $resultado = sqlsrv_query($con, $query);
      }
      $queryy     = "SELECT * from tblPlomeros where PLO_ID=$id_";
      $resultadoo = sqlsrv_query($con, $queryy);
      while ($fila = sqlsrv_fetch_array($resultadoo)) {
        $Nombre   = $fila['plo_nombres'];
        $Apellido = $fila['plo_apellidos'];
      }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'includes/head.php';?>
  <?php //include 'Querys.php';?>
  <title>Servicios</title>
</head>
<body>
  <div class="container">
    <center>
      <h2>
        <?php if ($Var_==1) {
          echo("Encargado"."$id_");
        }else{
          echo("Plomero");
        } ?>
        <img src="gotita.png" width="100px">
      </h2>
    </center>
    <div>
      <center>
        <h5><?php  if ($Var_==1) {
          echo("");
        }else{
          echo $Nombre . " " . $Apellido ;
        }?>
      </h5>
    </center>
  </div>
  <div class="col form  col-md-6 table-bordered " style="width:600px">
    <div class="col form-group col-md-3">
      <input type="checkbox" id="Sector" name="Sector" value="Sector" onchange="showUser(this.value)" >
      <label for="Sector">Sector</label>
      <select name="sec" id="sec" class="form-control selectpicker" onChange="" style="display: none">
      <?php
        while($Filas=sqlsrv_fetch_array($resultadoos)) {
        echo "<option value='".$Filas['sect_Id']."' >".$Filas['sect_Nombre']."</option>";
        } 
      ?>
      </select>
    </div>
    <div class="col form-group col-md-3"> 
      <input type="checkbox" id="Area" name="Area" value="Area" onchange="showUser(this.value)" >
      <label for="Area"> Area</label>
      <select name="are" id="are" class="form-control selectpicker" style="display: none">
      <?php
        while($Filas2=sqlsrv_fetch_array($resultadoos2)) {
        echo "<option value='".$Filas2['are_id']."' >".$Filas2['are_Nombre']."</option>";
        } 
      ?>
      </select>
    </div>
    <button type="" name="buscar" class="btn btn-primary " id="buscar" onclick="myFunction()" >Buscar</button>
<p id="demo"></p>
<p id="demo2"></p>
<p id="demo3"></p>
<p id="demo4"></p>
<p id="wenas"></p>



<br> 
<br> 
    </div>
     
    <br> 

<br>
<div  id="tabla">
  <table id="tablax" class="table table-striped table-bordered table-responsive table table-striped table-bordered" style="width:100%" >
    <title>tabla principal</title>
    <thead>
      <tr>
        <th data-dynatable-column="rank"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID</a></th>
        <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">FECHA</a></th>
        <th data-dynatable-column="us-$"    class="dynatable-head"><a class="dynatable-sort-header" href="#">DESCRIPCION</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">INMUEBLE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">LOTE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ACCIÓN</a></th>
      </tr>
    </thead>
    <tbody>
      <?php
     

      while ($row = sqlsrv_fetch_array($resultado)) {?>
        <tr>
          <?php $VA = $row['sol_fecha'];
          $va1= $VA->format('Y/m/d');?>
          <td><?php echo $row['sol_id']; ?></td>
          <td><?php echo $va1 ?></td>
          <td><?php echo $row['sol_Descripcion']; ?></td>
          <td><?php echo $row['inm_id']; ?></td>
          <td><?php echo $row['lote']; ?></td>
          <td><?php echo $row['ser_id']; ?></td>
          <td><?php echo $row['servicio']; ?></td>
          <td><a href="Resultado.php?sol_ID=<?php echo $row['sol_id']; ?>"><span class="codigo">Resultado</span></a></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
</div>
<div style="display: none" id="tabla2">
<table id="tablax2" class="table table-striped table-bordered table-responsive table table-striped table-bordered" style="width:100%">
   <caption>tabla sector</caption>
  <thead>
    
    <tr>
      <th data-dynatable-column="rank"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID</a></th>
      <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">FECHA</a></th>
      <th data-dynatable-column="us-$"    class="dynatable-head"><a class="dynatable-sort-header" href="#">DESCRIPCION</a></th>
      <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">INMUEBLE</a></th>
      <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">LOTE</a></th>
      <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID SERVICIO</a></th>
      <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">SERVICIO</a></th>
      <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ACCIÓN</a></th>
    </tr>
  </thead>
  <tbody >
  </tbody>
</table>
</div>
<div style="display: none" id="tabla3">
  <table id="tablax3" class="table table-striped table-bordered table-responsive table table-striped table-bordered" style="width:100%">
     <caption>tabla Area</caption>
    <thead>
      
      <tr>
        <th data-dynatable-column="rank"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID</a></th>
        <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">FECHA</a></th>
        <th data-dynatable-column="us-$"    class="dynatable-head"><a class="dynatable-sort-header" href="#">DESCRIPCION</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">INMUEBLE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">LOTE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ACCIÓN</a></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
<div style="display: none" id="tabla4">
  <table id="tablax4" class="table table-striped table-bordered table-responsive table table-striped table-bordered" style="width:100%">
     <caption>tabla area sector</caption>
    <thead>
      
      <tr>
        <th data-dynatable-column="rank"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID</a></th>
        <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">FECHA</a></th>
        <th data-dynatable-column="us-$"    class="dynatable-head"><a class="dynatable-sort-header" href="#">DESCRIPCION</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">INMUEBLE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">LOTE</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ID SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">SERVICIO</a></th>
        <th data-dynatable-column="year"    class="dynatable-head"><a class="dynatable-sort-header" href="#">ACCIÓN</a></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</div>
<div>
  <center><button class="btn btn-info btn-group-lg "> <a href="salir.php"><font color="white">Cerrar Sesión</font></a></button></center>
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

                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
       /* $('#tablax2').DataTable({
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
            });*/
      
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script> 

  <script type="">
    

  $(document).ready(function(){
  var x = document.getElementById('tabla');
x.style.display = 'block'; 
  $('#Sector').on('change',function(){
    if (this.checked) {
     $("#sec").show();
     //$vart=1;
    } else {
     $("#sec").hide();
    // $vart=2;
    }  
  })
   $('#Area').on('change',function(){
    if (this.checked) {
     $("#are").show();
     //$vart2=1;

    } else {
     $("#are").hide();
     //$vart2=2;
    
    }  

  })

/*var table = $('#tablax').DataTable();
$('#buscar').on( 'click', function () {
    table.destroy();
} );*/

 
});
 
 

    

function myFunction() {
  var ComboSector = document.getElementById("Sector").checked;
  var ComboArea = document.getElementById("Area").checked;
  var tablaPrincipal = document.getElementById('tabla');
  var tablaSector = document.getElementById('tabla2');
  var tablaArea = document.getElementById('tabla3');
  var tablaJunto = document.getElementById('tabla4');
  var idd=<?php echo "$id_"; ?>; 
  
 

/*-------------------------------------------------------------------------------------*/
  if (ComboSector==true && ComboArea==false) {
   var x='1'; 
   var cual='1'; 
   var Sector_Select=$("#sec").val(); 
   $("#tablax2").dataTable().fnDestroy();
    $('#tablax2').DataTable({
      'serverMethod': 'post',
      'ajax': {
        'url':'Cc.php?Sector_Select='+Sector_Select+'&id_='+idd+'&cual='+cual
      },
      'columns': [
      { data: 'sol_id' },
      { data: 'sol_fecha'},
      { data: 'sol_Descripcion'},
      { data: 'inm_id'},
      { data: 'lote'},
      { data: 'ser_id'},
      { data: 'are_id'}
      ]
 
    });
   
   //document.getElementById("demo").innerHTML = x;
   tablaPrincipal.style.display = 'none';
   tablaSector.style.display = 'block';
   tablaArea.style.display = 'none';
   tablaJunto.style.display = 'none';
 }else{
  var x='2'; 
  document.getElementById("demo").innerHTML = x;
 }

/*-------------------------------------------------------------------------------------*/
if (ComboSector==false && ComboArea==true) {
  var x2='3'; 
  var cual='2';
  var Area_Select=$("#are").val(); 
  $("#tablax3").dataTable().fnDestroy();
   $('#tablax3').DataTable({
      'serverMethod': 'post',
      'ajax': {
        'url':'Cc.php?Area_Select='+Area_Select+'&id_='+idd+'&cual='+cual
      },
      'columns': [
      { data: 'sol_id' },
      { data: 'sol_fecha'},
      { data: 'sol_Descripcion'},
      { data: 'inm_id'},
      { data: 'lote'},
      { data: 'ser_id'},
      { data: 'are_id'}
      ]
    });
   document.getElementById("demo2").innerHTML = x2;
   tablaPrincipal.style.display = 'none';
   tablaSector.style.display = 'none';
   tablaArea.style.display = 'block';
   tablaJunto.style.display = 'none';
 }else{
  var x2='4'; 
   document.getElementById("demo2").innerHTML = x2;
 }
 /*-------------------------------------------------------------------------------------*/
  if (ComboSector==true && ComboArea==true ) {
  var x3='5';
  var cual='3';
 var Area_Select=$("#are").val();
 var Sector_Select=$("#sec").val();  
 $("#tablax4").dataTable().fnDestroy();  
  $('#tablax4').DataTable({
      'serverMethod': 'post',
      'ajax': {
        'url':'Cc.php?Area_Select='+Area_Select+'&id_='+idd+'&cual='+cual+'&Sector_Select='+Sector_Select
      },
      'columns': [
      { data: 'sol_id' },
      { data: 'sol_fecha'},
      { data: 'sol_Descripcion'},
      { data: 'inm_id'},
      { data: 'lote'},
      { data: 'ser_id'},
      { data: 'are_id'}
      ]
    });
   document.getElementById("demo3").innerHTML = x3;
   tablaPrincipal.style.display = 'none';
   tablaSector.style.display = 'none';
   tablaArea.style.display = 'none';
   tablaJunto.style.display = 'block';
 }else{
  var x3='6'; 
   document.getElementById("demo3").innerHTML = x3;
 }
 /*-------------------------------------------------------------------------------------*/
/* if (ComboSector==false && ComboArea==false ) {
  var Area_SectorNo='7';
  $("#tablax").dataTable().fnDestroy();
   $("#tablax").dataTable();
   document.getElementById("demo3").innerHTML = Area_SectorNo;
   tablaPrincipal.style.display = 'block';
   tablaSector.style.display = 'none';
   tablaArea.style.display = 'none';
   tablaJunto.style.display = 'none';
 }else{
  var Area_SectorNo='8'; 
   document.getElementById("demo4").innerHTML = Area_SectorNo;
 }*/
  
  
}

 

</script>

</body>
</html>
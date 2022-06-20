
<?php
$alert = '';
include 'conexion.php';
session_start();
$id_     = $_SESSION['usuarioo'];
$sol_id_ = $_GET['sol_ID'];
  
date_default_timezone_set("America/Guatemala");

if (!isset($_SESSION['active'])) {
    echo "<script>alert('Inicie Sesion Para Continuar'); window.location='index.html';</script>";
} else {


    $lote=$_REQUEST['lote'];
    $Servicio=$_REQUEST['Servicios'];

    $query = "SELECT a.sol_id,a.sol_fecha,sol_Descripcion,a.inm_id,dbo.alote(a.inm_id) as lote, a.ser_id,dbo.devuelveNombreServicio(a.ser_id) as servicio
    from agu_SolicitudesDeServicio a
    left join tblInmuebles b
    on a.inm_id = b.inm_id and a.sol_Estado=2 and a.sol_Resultado=2
    left join tblDetalleUbicacionInmueble c
    on b.det_id = c.det_Id
    left join SEG_PLOMEROSPORSECTOR d
    on c.are_id = d.ARE_ID and c.sect_Id = d.SECT_ID where d.PLO_ID=$id_
    order by a.sol_id desc";
    $resultado = sqlsrv_query($con, $query);
    while ($filaa = sqlsrv_fetch_array($resultado)) {
        $ID = $filaa['sol_id'];
        $lote_ = $filaa['lote'];
        $servicio_ = $filaa['servicio'];
        
    }

    $queryy     = "SELECT * from tblPlomeros where PLO_ID=$id_";
    $resultadoo = sqlsrv_query($con, $queryy);
    while ($fila = sqlsrv_fetch_array($resultadoo)) {
        $Nombre   = $fila['plo_nombres'];
        $Apellido = $fila['plo_apellidos'];

    }
     
    $queryEst="SELECT  * from agu_SolicitudesDeServicio where sol_id=$sol_id_";
    $resultadoEST = sqlsrv_query($con, $queryEst);
    while ($filaEst = sqlsrv_fetch_array($resultadoEST)) {
     
        $estado_ = $filaEst['ploest'];
    }
}

  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'includes/head.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" media="all" href="css/estilo.css">
    <?php include "includes/scriptes.php";?>

    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Resultado</title>
</head>
<body>

    <div class="container container-form-lg" style="background-color: white">
        <h3 class="titulo">Resultado</h3>
        <?php /*if ($estado_=='2') {
          echo " <input type='checkbox' name='hola'  id='toggleButton' class='' value='1' checked>En el lugar";
        }else{
        echo " <input type='checkbox' name='hola'  id='toggleButton' class='' value='1'>En el lugar";
        } */?>
        <input type="checkbox" name="hola"  id="toggleButton" class="" value="1">En el lugar
       
        <input type="checkbox" name="hola"  id="Desasignar" class="" value="2">Desasignar
        
    <ul class="timeline" id="timeline">
 
  <li class="li complete">
  <br>
    <div class="status">
         <br>
      <h5>Asignada</h5>
    </div>
  </li>
  <li class="li complete" >
  <br>
    <div class="status" >
         <br>
      <h5>En el lugar</h5>
    </div>
  </li>
 
 </ul>      
  <div id="ver" style="display: none">
        <form  method="POST" id="formulario" action="Guardar2.php?sol_id_=<?php echo $_GET['sol_ID']; ?>" enctype='multipart/form-data'  >
            <div class="form-row">
                <div class="col form-group col-md-8" id="">
                    <label style="font-size: 20px;text-align: TOP"><b>ID:</b></label>
                    <label style="font-size: 20px" ><input type="" style="border: 0; background-color: white;" name="sol_id_" id="sol_id_" value="<?php echo $sol_id_; ?>" disabled></label>
                    <label style="font-size: 20px;text-align: TOP"><b>Lote:</b></label>
                    <label style="font-size: 20px" ><input type="" style="border: 0; background-color: white;" name="loteL" id="loteL" value="<?php echo $lote; ?>" disabled></label>
                    <label style="font-size: 20px" ><input type="" style="border: 0; background-color: white;" name="Servicio_" id="Servicio_" value="<?php echo $Servicio; ?>" disabled></label>
                </div>
                <img src="gotita.png" width="100" height="100" srcset="gotita.png 17x"  class="">
            </div>
            <div class="form-row">
                <div class="col form-group col-md-3" id="" >
                    <label>Descripcion Del Resultado:</label>
                </div>
                <div class="col form-group " id="" >
                    <textarea class="" name="det_Descripcion" id="det_Descripcion" rows="4" cols="" style="width: 300px;font-size: 12px"></textarea>
                </div>
            </div>


             <div class="form-row">
                <div class="col form-group col-md-4" id="" >
                    
                </div>
                <div class="col form-group " id="" >
                    <div class="col form-row " id="" >
                        <label><input type="radio" name="RadioLC" id="RL" value="1" required> Lectura</label>&nbsp;&nbsp;
                        <label><input type="radio" name="RadioLC" id="RC" value="2" required> Concepto</label>
                    </div>
                </div>
            </div>







            <div class="form-row" id="DivLectura" style="display: none">
                <div class="col form-group col-md-3" id="" >
                    <label>Lectura:</label>
                </div>
                <div class="col form-group " id="" >
                     <input type="number" name="det_Lectura" id="det_Lectura" style="width: 300px;height: 28px;font-size: 12px"  class="form-control" id=""  placeholder="" value="" >
                </div>
            </div>
            <div class="form-row" id="DivConcepto" style="display: none">
                <div class="col form-group col-md-3" id="" >
                    <label>Concepto:</label>
                </div>
                <div class="col form-group " id="" >
                    <select name="det_concepto" id="det_concepto" style=",width: 300px;">
                        <?php
                        $Consulta = "SELECT * from agu_ConceptosLecturas";
                        $R        = sqlsrv_query($con, $Consulta);
                        while ($Fila = sqlsrv_fetch_array($R)) {
                            echo "<option value='" . $Fila['cl_id'] . "'>" . $Fila['cl_Nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group col-md-2" id="" >
                    <label>Plomero:</label>
                </div>
                <div class="form-row">
                    <div class="col form-group " id="" >
                        <input type="text" name="plo_id" id="plo_id"  style="width: 40px;height: 28px;font-size: 12px"  class="form-control"  placeholder="" value="<?php echo $id_ ?>"  disabled>
                        <input type="text" name="" style="width: 300px;height: 28px;font-size: 12px"  class="form-control" id=""  placeholder="" value="<?php echo $Nombre . " " . $Apellido ?>" disabled>
                    </div>
                </div>
            </div>
            <?php  if ($Servicio=="Reconexion" || $Servicio=="reconexion") {
            ?>
             <div class="form-row">
                <div class="col form-group col-md-4" id="" >
                    <label>Ingresar Plomero Asignado:</label>
                </div>
                <div class="col form-group " id="" >
                    <div class="col form-row " id="" >
                    <input type="checkbox" id="PlomeroAsignado" name="PlomeroAsignado" value="0" onchange="" >
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col form-group col-md-3" id="" >
                            <input type="" name="IdPlomero" id="IdPlomero" class="form-control" style="display: none;" >
                        </div>
                        <div class="col form-group col-md-7" id="" >
                            <input type="" name="NombrePlomero" id="NombrePlomero" class="form-control" style="display: none;"  value="" disabled>
                        </div>
                        <div class="col form-group col-md-10" id="" >
                            <input type="" name="ApellidoPlomero" id="ApellidoPlomero" class="form-control" style="display: none;" value="" disabled="">
                        </div>
                    </div>
                </div>
            </div>
            <?php    
            } ?>
            <div class="form-row">
                <div class="col form-group col-md-3" id="" >
                    <label>Fecha:</label>
                </div>
                <div class="col form-group " id="" >
                    <input type="date" name="det_FechaResolvio" id="det_FechaResolvio" style="width: 300px;height: 28px;font-size: 12px"  class="form-control" id=""  placeholder="" value="<?php echo date("Y-m-d") ?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group col-md-4" id="" >
                    <label>Completada:</label>
                </div>
                <div class="col form-group " id="" >
                    <div class="col form-row " id="" >
                        <label><input type="radio" name="Completada" id="1" value="1" required> SI</label>&nbsp;&nbsp;
                        <label><input type="radio" name="Completada" id="2" value="2" required> NO</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group " id="" >
                    <center> 
                        <label>
                            <input type="checkbox" name="det_Recibido" id="det_Recibido"  placeholder="" value="1" >Firmo de recibido el usuario?
                        </label>
                    </center>
                </div>
            </div>
            <div class="form-group">
                <center>
                    <label>Agregar Imagen</label>
                    <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                    <div id="content" style="display: none;">
                        <input type="file" style="height: 50px" class="form-control" id="imagen" name="imagen[]" multiple>
                    </div>
                </center>
            </div>
            <div>
            <center> 
                <button class="btn btn-info btn-group-lg" type="" name="guar" id="guar" onclick="" > 
                    <a><font color="white">Guardar</font></a>
                </button>
                
                <input onClick="javascript:window.history.back();" type="button" class="btn btn-info btn-group-lg " name="Submit" value="Regresar" />
            </center>
        </div>
        </form>
        </div>
        

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
         $(document).ready(function(){

            $('#RL').on('change',function(){
                if (this.checked) {
                    $("#DivLectura").show();
                    $("#DivConcepto").hide();
                  
                } else {
                    $("#DivLectura").hide();
                   
                }
            })
             $('#RC').on('change',function(){
                if (this.checked) {
                    $("#DivConcepto").show();
                    $("#DivLectura").hide();
                  
                } else {
                    $("#DivConcepto").hide();

                   
                }
            })

            $("#guar").click(function () {
                if (document.getElementById('PlomeroAsignado').checked && $('#NombrePlomero').val().length == 0) {
                    alert('Campo Vacio De Plomero Asignado');
                    return false;
                }
                marcado=false;
                if( $("#formulario input[name='Completada']:radio").isset(':checked')) {
                    alert("Selecciona El Radio por favor!!!");
                    return false;
                }
                $('input:radio[name=Completada]:checked').val();
                $('input:checkbox[name=det_Recibido]:checked').val();
                $('input:radio[name=RadioLC]:checked').val();
            });
           

            $('#PlomeroAsignado').on('change',function(){
                if (this.checked) {
                    $("#NombrePlomero").show();
                    $("#ApellidoPlomero").show();
                    $("#IdPlomero").show();
                } else {
                    $("#NombrePlomero").hide();
                    $("#ApellidoPlomero").hide();
                    $("#IdPlomero").hide();
                }
            })
//------------------------------------------------------------Poner En Ruta-------------------------------------------------------
            function mensaje(){
                $.ajax({
                    url: 'Updates.php?solicitud=<?php echo($sol_id_)?>&%20cambio=2',
                    type:  'GET',
                    beforeSend: function () {},
                    success:  function (response) { 
                    //alert("funciono");
                },
                error:function(){
                    alert("error");
                }
            });
            }
            setTimeout(mensaje,10);

//----------------------------------------------------------------------------------------------------------------------------------


            });

            function showContent() {
                element = document.getElementById("content");
                check = document.getElementById("check");
                if (check.checked) {
                    element.style.display='block';
                }
                else {
                    element.style.display='none';
                }
            }

            function Plomerof() {
                if (document.getElementById('PlomeroAsignado').checked && $('#NombrePlomero').val().length == 0) {
                    alert('Campo Vacio De Plomero Asignado');
                    return false;
                }else{
                    document.getElementById("formulario").submit();
                }
            }
            function myFunction() {
                var x = document.getElementById("Completada").required;
                document.getElementById("demo").innerHTML = x;
            }
            /*******************************************BARRA DE PROGRESO*******************************************************/

            var completes = document.querySelectorAll(".complete");
var toggleButton = document.getElementById("toggleButton");


  var lastComplete = completes[completes.length - 1];
  lastComplete.classList.toggle("complete");

function toggleComplete() {
  var lastComplete = completes[completes.length - 1];
  lastComplete.classList.toggle("complete");
}

toggleButton.onclick = toggleComplete;

/*******************************************DESASIGNAR*******************************************************/
var checkbox = document.getElementById('Desasignar');
checkbox.addEventListener('change', function() {
    if(this.checked) {
        if (!confirm('Esta Seguro De Desasignar?')) {
            return;
        }else{
           // alert("<?php echo($sol_id_) ?>");

            $.ajax({
        url: 'Updates.php?solicitud=<?php echo($sol_id_) ?>&%20cambio=0',
        type:  'GET',
        beforeSend: function () {},
            success:  function (response) {    
                 window.history.back();
           // $(".salida").html(response);
        },
        error:function(){
            alert("error")
        }
        });

           
        }
    }
});
/*******************************************DESASIGNAR*******************************************************/
var checkbox2 = document.getElementById('toggleButton');

checkbox2.addEventListener('change', function() {
    
    if(this.checked) {
        


        
         $.ajax({
        url: 'Updates.php?solicitud=<?php echo($sol_id_) ?>&%20cambio=3',
        type:  'GET',
        beforeSend: function () {},
            success:  function (response) {    
                $('#ver').show(); 
           
        },
        error:function(){
            alert("error")
        }
        });

       
           
        
    }else{
        $('#ver').hide(); 
    }
  
});

  
</script>




    </div>
    <script src="funciones.js"></script>
</body>
</html>

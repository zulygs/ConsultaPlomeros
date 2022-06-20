 <meta charset='utf-8'>
 <?php 
    $mostrar=0;
    $estado1=0;
    $hora1=0;
    $estado2=0;
    $hora2=0;
    $estado3=0;
    $hora3=0;
    $estado4=0;
    $hora4=0;
    $alert="";
    $sol_id="";
    $sol_Estado_="";
    $inm_id_="";
    $h=0;
    include("conexion.php");

    if (isset($_POST['btnRSolicitud'])) {

      function pingDomain($domain){
        $starttime = microtime(true);
        $file      = @fsockopen ($domain, 80, $errno, $errstr, 10);
        $stoptime  = microtime(true);
        $status    = 0;
        if (!$file){ 
          $status = -1;  // Site is down
        }else {
          fclose($file);
          $status = ($stoptime - $starttime) * 1000;
          $status = floor($status);
        }
        return $status;
      }

      $domainbase = (isset($_POST['domainname'])) ? $_POST['domainname'] : '';
      $domainbase = str_replace("http://","","http://190.113.88.158:3000/api/SeguimientoSol");
      $status = pingDomain($domainbase);
      if ($status != -1) {
      
        //--------------------------------------------------------------------CONEXION WEB SERVICE-------------------------------------
        $inm_idd_  = $_POST['inm_id'];
        $sol_idd_ = $_POST["sol_idp"];
        $ApiSolurl = "http://190.113.88.158:3000/api/SeguimientoSol2?inm_id=$inm_idd_&sol_id_=$sol_idd_";
        $jsonSol = file_get_contents($ApiSolurl);
        $someObjectSol = json_decode($jsonSol);
        $someArraySol = $someObjectSol;
        foreach ($someArraySol as $keySol => $valueSol) {
          $sol_Estado_ = $valueSol->sol_Estado;
          $inm_id_ = $valueSol->inm_id;
          $sol_id = $valueSol->sol_id;
          $servicio_ = $valueSol->servicio;
          $miFecha = $valueSol->sol_fecha;
          $NOMBRE_ = $valueSol->NOMBRE;
        }
        if ($sol_Estado_==1) {
          $alert=2;
          $mostrar=2;
        }else{
          if ($sol_id==$sol_idd_ && $inm_id_==$inm_idd_) {
            $mostrar=1;
          }else{
            $alert=1;
          }
        }
        function fechaCastellano ($fecha) {
          $fecha = substr($fecha, 0, 10);
          $numeroDia = date('d', strtotime($fecha));
          $dia = date('l', strtotime($fecha));
          $mes = date('F', strtotime($fecha));
          $anio = date('Y', strtotime($fecha));
          $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
          $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
          $nombredia = str_replace($dias_EN, $dias_ES, $dia);
          $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
          $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
          return $nombredia.", ".$numeroDia." de ".$nombreMes." de ".$anio;
        }
        $ApiEstadourl = "http://192.168.0.9:3000/api/SeguimientoSol/$sol_idd_";
        $jsonEstado = file_get_contents($ApiEstadourl);
        $someObject = json_decode($jsonEstado);
        $someArray = $someObject; 

        foreach ($someArray as $key => $value) {
          $estado1 = $value->estado1;
          $hora1 = $value->hora1;
          $estado2 = $value->estado2;
          $hora2_ = $value->hora2;
          $estado3 = $value->estado3;
          $hora3_ = $value->hora3;
          $estado4 = $value->estado4;
          $hora4_ = $value->hora4;
        }
        $h=2;
        }else {
          $h=1;
          
  
}




       
 

}

        ?>
<!DOCTYPE html>
<html>
<head>
  <title>Rastreo De Solicitud</title>
  <link rel="stylesheet" media="all" href="estilolinea.css">
  <link rel="stylesheet" media="all" href="estilolinea2.css">
   <?php include "includes/scriptes.php";?>

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
  <div class= "container container-form" style="width: 800px">
    <div id="busqueda_area" class="busqueda_area">
      <div class="resultArea">
        <div id="" style="display: block;">
          <div id="stl" class="divR  delivered">
            <div class="formArea">
              <form id="formm" action="prueba.php" method="post">
              <div class="form">
                <div class="col form-group col-md-5">
                  <input type="number" name="inm_id" id="inm_id" class="form-control" placeholder="ID Inmueble" required>
                </div>
                <div class="col form-group col-md-5">
                  <input type="number" name="sol_idp" id="sol_idp" class="form-control"  placeholder="Codigo De Solicitud" required>
                </div>
                <div class="">
                  <input type="submit" id="btnRSolicitud" name="btnRSolicitud" class="boton rojo" value="Ver Estado" src="https://img.icons8.com/color/20/000000/google-maps-new.png">
                </div>
              </div>
              <br>
              
                <center>
                  <div class="">
                    <font color="black">

                      <?php
                        if ($h==1) {
                          echo  ' <div class="alert alert-warning alert-dismissible" role="alert">Estamos presentando problemas por favor comunicarse a nuestro PBX 24764000
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>';
                        }

                       if ($alert==1) {?>
                        <div class="alert alert-danger alert-dismissible" role="alert">Solicitud No Encontrada!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                      <?php } else if($alert==2){?>
                        <p class="alert alert-success alert-dismissible" role="alert" >
                          <font color="#3c763d">¡La solicitud 
                            <font color="black"><?php echo ($sol_idd_); ?></font> 
                            se resolvio el <?php echo fechaCastellano($hora4_); ?>!
                          </font>
                        </p>
                      <?php } ?>
                    </font>
                  </div>
                </center>
              </form>
              <div class="fdt_alert" style=""></div>
            </div>
            <?php if ($mostrar==1 || $mostrar==2) {?>
              <div class="stl_header">
                <div class="titleArea">
                  <div class="title">ID Solicitud </div>
                  <div class="guide">
                    <div class="content">
                      <span class="serie"><?php echo "$sol_id"; ?></span>
                    </div>
                  </div>
                </div>
                <div class="customerArea">
                   <div class="theEnd">
                    <span class="label">Fecha de Solicitud:</span>
                    <span class="FechaSol"><?php echo fechaCastellano($miFecha);  ?></span>
                  </div>
                  <div class="locationsArea">
                  </div>
                  <div class="title">
                    <span class="fullname"><?php echo "$NOMBRE_"; ?></span>
                  </div>
                 
                </div>
              </div>
              <div class="stl_body">
                <div class="stl_timeline">
                  <div class="stl_events">
                    <div class=" stl_event done event-1 first">
                      <div class="soliDia"><?php echo fechaCastellano($miFecha);  ?></div>
                      <div class=" time" title=""></div>
                      <div class="iconArea">
                        <div class="icon"> <img src="https://img.icons8.com/fluent/20/000000/google-maps-new.png"/></div>
                      </div>
                      <div class="text">
                        <div class="title">Solicitado</div>
                        <div class="desSol">Solicitud <strong><?php echo "$servicio_"; ?></strong> ingresada.
                          <div class="stl_attachments">
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  if ($estado1==1) {?>
                    <div class=" stl_event done event-2">
                        <div class=" time" title=""><?php echo "$hora1"; ?></div>
                        <div class="iconArea">
                          <div class="icon"><img src="https://img.icons8.com/fluent/20/000000/google-maps-new.png"/></div>
                        </div>
                        <div class="text">
                          <div class="title">Asignado a plomero</div>
                          <div class="desSol">La solicitud de <strong><?php echo "$servicio_"; ?> </strong> ha sido asignada al plomero.
                            <div class="stl_attachments">
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } 
                    if ($estado2==2) {?>
                      <div class=" stl_event done event-3">
                        <div class=" time" title=""><?php echo "$hora2_"; ?></div>
                        <div class="iconArea">
                          <div class="icon"><img src="https://img.icons8.com/fluent/20/000000/google-maps-new.png"/></div>
                        </div>
                        <div class="text">
                          <div class="title">En ruta</div>
                          <div class="desSol">
                            El plomero ya se encuentra en ruta.
                            <div class="stl_attachments">
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }
                    if ($estado3==3) {?>
                      <div class=" stl_event done event-4">
                        <div class=" time" title=""><?php echo "$hora3_"; ?></div>
                        <div class="iconArea">
                          <div class="icon"><img src="https://img.icons8.com/fluent/20/000000/google-maps-new.png"/></div>
                        </div>
                        <div class="text">
                          <div class="title">En el lugar</div>
                          <div class="desSol">
                            El plomero ya se encuentra en el lugar para resolver la solicitud.
                            <div class="stl_attachments">
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } 
                    if ($estado4==4) {?>
                      <div class=" stl_event done event-5 last">
                        <div class=" time" title=""><?php echo "$hora4_"; ?></div>
                        <div class="iconArea">
                          <div class="icon"><img src="https://img.icons8.com/fluent/20/000000/google-maps-new.png"/></div>
                        </div>
                        <div class="text">
                          <div class="title">Resuelto</div>
                          <div class="desSol">
                            ¡La solicitud ha sido resuelta exitosamente!.
                            <div class="stl_attachments">
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php  } ?>
            <img src="images/mascotas2.jpeg" width="200px" height="200px" align="right">
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
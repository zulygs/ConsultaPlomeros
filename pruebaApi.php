  <?php   header('Content-Type: text/html; charset=ISO-8859-1');
  session_start();
   $_SESSION['usuarioo'] = $user;
   /* require_once('includes/nusoap.php');

    //Variables
    $slengua = "C";
    $scurso = "2011-12";
    $scoddep = "B142";
    $scodest = "";
    
    //url del webservice que invocaremos
    $wsdl="http://190.113.88.158:3000/api/SeguimientoSol/239918";
    
    //instanciando un nuevo objeto cliente para consumir el webservice
    $client=new nusoap_client($wsdl,'wsdl');


    //¿ocurrio error al llamar al web service?
    if ($client->fault) { // si
        $error = $client->getError();
    if ($error) { // Hubo algun error
            echo 'Error:' . $error;
            echo 'Error2:' . $error->faultactor;
            echo 'Error3:' . $error->faultdetail;
            echo 'Error:  ' . $client->faultstring;
        }
        
        die();*/
      

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body><button>
  </button>
  
   <input  type="button" onclick="document.location.reload();" value="Recargar">
    </body>
    </html>
  
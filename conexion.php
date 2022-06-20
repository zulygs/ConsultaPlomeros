<?php
$serverName = "192.168.0.10";
$connectionInfo = array( "Database"=>"CONTROLTOTAL(AGUAS)", "UID"=>"Hardsys", "PWD"=>'$$sascim', "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect( $serverName, $connectionInfo);

if( $con ) {
     echo "";
}else{
     echo "Conexión no se pudo estableceerer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
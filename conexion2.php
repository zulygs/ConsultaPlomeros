<?php
$servidor = "192.168.0.10";
$vaina = array( "Database"=>"CONTROLTOTAL(AGUAS)", "UID"=>"Hardsys", "PWD"=>'$$sascim', "CharacterSet"=>"UTF-8");
$con2 = sqlsrv_connect( $servidor, $vaina);

if( $con2 ) {
     echo "";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
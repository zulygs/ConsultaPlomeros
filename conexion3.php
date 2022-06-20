<?php
$serverName     = "192.168.0.20";
$connectionInfo = array("Database" => "CONTROLTOTAL(AGUAS)", "UID" => "Hardsys", "PWD" => '$$sascim', "CharacterSet" => "UTF-8");
$conn           = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
    echo "";
} else {
    echo "Conexión no se pudo establecer.<br />";
    die(print_r(sqlsrv_errors(), true));
}

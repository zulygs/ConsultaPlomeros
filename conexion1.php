<?php

    $host = '192.168.0.9';
    $user = 'root';
    $password = '';
    $db = 'test';

    $con = @mysqli_connect($host,$user,$password,$db);

    if (!$con) {
        echo "Error en la conexion ";
    }

?>
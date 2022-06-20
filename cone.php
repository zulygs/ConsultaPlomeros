<?php 
class Conexion{	  
    public static function Conectar() {        
        define('servidor', '192.168.0.10');
        define('nombre_bd', 'CONTROLTOTAL(AGUAS)');
        define('usuario', 'Hardsys');
        define('password', '$$sascim');					        
        $opciones = array(PDO::SQLSRV_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("sqlsrv:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}
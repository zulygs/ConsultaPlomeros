<?php 
	date_default_timezone_set('America/Guatemala'); 
	function fechaC(){
		$mes = array("","Enero", 
					  "Febrero", 
					  "Marzo", 
					  "Abril", 
					  "Mayo", 
					  "Junio", 
					  "Julio", 
					  "Agosto", 
					  "Septiembre", 
					  "Octubre", 
					  "Noviembre", 
					  "Diciembre");
		return date('d')." de ". $mes[date('n')] . " de " . date('Y');
	}



	function saldo($idgenera){
		include("conexion.php");
		$jquery = "SELECT (SUM(DEBE) - SUM(HABER) ) AS resultado FROM ecuenta WHERE id_genera = '$idgenera'";
		$ejequery = $con->query($jquery);
        while($datos=$ejequery->fetch_array()){
            $saldo = ($datos["resultado"]);
        }
		return $saldo;
	}

	function msector($seccodigo){
		include("conexion.php");
		$jquery = "SELECT * FROM sector WHERE sec_codigo = $seccodigo";
		$ejequery = $con->query($jquery);
        while($datos=$ejequery->fetch_array()){
            $msector = ($datos["sec_nombre"]);
        }
		return $msector;
	}

	function idsector($seccodigo){
		include("conexion.php");
		$jquery = "SELECT * FROM sector WHERE sec_codigo = $seccodigo";
		$ejequery = $con->query($jquery);
        while($datos=$ejequery->fetch_array()){
            $isector = ($datos["idsector"]);
        }
		return $isector;
	}


	function mservi($idservi){
		include("conexion.php");
		$jquery = "SELECT * FROM servicio WHERE idser = $idservi";
		$ejequery = $con->query($jquery);
        while($datos=$ejequery->fetch_array()){
            $mservi = ($datos["servi"]);
        }
		return $mservi;
	}

	function mforma($idservi){
		include("conexion.php");
		$jquery = "SELECT * FROM servicio WHERE idser = $idservi";
		$ejequery = $con->query($jquery);
        while($datos=$ejequery->fetch_array()){
            $mforma = ($datos["formato"]);
        }
		return $mforma;
	}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form  method="POST" id="formulario" action="Guardar2.php">
	<input type="checkbox" id="PlomeroAsignado" name="PlomeroAsignado" value="0" onchange="" >
	<div class="form-row">
                    <div class="col form-group col-md-3" id="" >
                    <input type="" name="IdPlomero" id="IdPlomero" class="form-control" style="" >
                </div>
                <div class="col form-group col-md-7" id="" >
                    <input type="" name="NombrePlomero" id="NombrePlomero" class="form-control" style=""  value="" >
                </div>
                <div class="col form-group col-md-10" id="" >
    <input type="" name="ApellidoPlomero" id="ApellidoPlomero" class="form-control" style="" value="" disabled="">
</div>
</div>



<label for="test">
  <input type="checkbox" name="test" id="test">
  Pincha aquí
</label>

<input type="button" name=""  onclick="contarSeleccionados()"> enviar</input>
</form>
<button onclick="contarSeleccionados()"></button>

 <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
function validar() {
  if ($('#NombrePlomero').val().length == 0) {
    alert('Ingrese rut');
    return false;
  }
}
    function contarSeleccionados()
	{
	  
	  if (document.getElementById('test').checked && $('#NombrePlomero').val().length == 0) 
	  {
		alert('Tiene que ingresar un nombre');
	  }else{

	  	alert('pase');
	  	document.getElementById("formulario").submit();
	  }
	  

	  
	}
</script>

</body>
</html>
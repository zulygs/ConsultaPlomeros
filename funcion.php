<?php  




 function validaForm(){
    // Campos de texto
    if(('#codlot').val() == ""){
        alert("El campo Nombre no puede estar vacío.");
            // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    return true;} // Si todo está correcto

    ?>
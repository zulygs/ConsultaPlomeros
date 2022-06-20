$(document).ready(function(){
    
    $('#codlot').on( "click", function(e){
    
   
        e.preventDefault();
        var idg = $(this).val();
        var action = 'searchLot';

        $.ajax({ 
            url: 'ajax1.php',
            type: 'POST',
            async : true,
            data: {action:action,lote:idg},

            success: function(response)
            {
                console.log(response);

                
                if (response == 0) {
                  $('#idinm').val("");
                  $('#idgen').val("");
                  $('#codlot').val("");
                  $('#id_').val("");
                  $('#nom_').val("");
                  $('#dir_').val("");
                  $('#est_').val("");
                  $('#nit_').val("");
                  $('#tel_').val("");
                  $('#sal_').val("");
                  $('#encar_').val("");
                  $('#conv_').val("");
                   $('#ar_').val("");
                  $('#sec_').val("");
                   $('#idP_').val("");
                  $('#nomP_').val("");
                  $('#colo_').val("");
                  $('#hora_').val("");
                  $('#telP_').val("");
                    $('#P_').val("");

                
                 
                 

                  $('#nombre').val("");
                  $('#direccion').val("");
                  $('#estado').val("");
                  $('#nit').val("");
                  $('#tel').val("");
                  $('#saldo').val("");
                  $('#encargado').val("");
                  $('#convenio').val("");
                   $('#area').val("");
                  $('#sector').val("");
                  $('#idPlomero').val("");
                  $('#nombre_Plomero').val("");
                  $('#colonia').val("");
                  $('#horarios').val("");
                  $('#telefono_P').val("");
                    $('#persona').val("");
                


                } else {
                     
               var data = $.parseJSON(response);
                  $('#idinm').val(data.inm_id);
                  $('#idgen').val(data.inm_IdGenerado);
                  $('#codlot').val(data.inm_IdGenerado);
                  $('#id_').val(data.inm_id);
                  $('#nom_').val(data.nombre);
                  $('#dir_').val(data.direccion);
                  $('#est_').val(data.estado);
                  $('#nit_').val(data.nit);
                  $('#tel_').val(data.inm_Telefono1);
                  $('#sal_').val(data.saldo);
                  $('#encar_').val(data.encargado);
                  $('#conv_').val(data.convenio);
                

                  $('#nombre').val(data.nombre);
                  $('#direccion').val(data.direccion);
                  $('#estado').val(data.estado);
                  $('#nit').val(data.nit);
                  $('#tel').val(data.inm_Telefono1);
                  $('#saldo').val(data.saldo);
                  $('#encargado').val(data.encargado);
                  $('#convenio').val(data.convenio);
                }
            },
        });
 });
//----------------------------------------------------------------------------------------------------------------------------------------- 

     $('#id_').click(function(e){
        e.preventDefault();
        var idi = $(this).val();
        var action = 'searchLot2';
       

        $.ajax({ 
            url: 'ajax1.php',
            type: 'POST',
            async : true,
            data: {action:action,idInmueble:idi},
            success: function(response)
            {
                console.log(response);
                if (response == 0) {
                  $('#idinm').val("");
                  $('#idgen').val("");
                  $('#codlot').val("");
                  $('#id_').val("");
                  $('#nom_').val("");
                  $('#dir_').val("");
                  $('#est_').val("");
                  $('#nit_').val("");
                  $('#tel_').val("");
                  $('#sal_').val("");
                  $('#encar_').val("");
                  $('#conv_').val("");
               

                  $('#nombre').val("");
                  $('#direccion').val("");
                  $('#estado').val("");
                  $('#nit').val("");
                  $('#tel').val("");
                  $('#saldo').val("");
                  $('#encargado').val("");
                  $('#convenio').val("");
                } else {
                     
               var data = $.parseJSON(response);
                  $('#idinm').val(data.inm_id);
                  $('#idgen').val(data.inm_IdGenerado);
                   $('#codlot').val(data.inm_IdGenerado);
                  $('#id_').val(data.inm_id);
                  $('#nom_').val(data.nombre);
                  $('#dir_').val(data.direccion);
                  $('#est_').val(data.estado);
                  $('#nit_').val(data.nit);
                  $('#tel_').val(data.inm_Telefono1);
                  $('#sal_').val(data.saldo);
                  $('#encar_').val(data.encargado);
                  $('#conv_').val(data.convenio);

                  $('#nombre').val(data.nombre);
                  $('#direccion').val(data.direccion);
                  $('#estado').val(data.estado);
                  $('#nit').val(data.nit);
                  $('#tel').val(data.inm_Telefono1);
                  $('#saldo').val(data.saldo);
                  $('#encargado').val(data.encargado);
                  $('#convenio').val(data.convenio);
                 
      //*   $('#mesb').val(data.mes);
//*                  $('#valor').val(data.cuotacli);

                }
            },
        });
      }); 
//-----------------------------------------------------------------------------------------------------------------
     $('#id_').click(function(e){
        e.preventDefault();
        var idi = $(this).val();
        var action = 'searchLot3';
        

        $.ajax({ 
            url: 'ajax1.php',
            type: 'POST',
            async : true,
            data: {action:action,idInmueble:idi},
            success: function(response)
            {
                console.log(response);
                if (response == 0) {
                  $('#idinm').val("");
                  $('#ar_').val("");
                  $('#sec_').val("");
                  $('#idP_').val("");
                  $('#nomP_').val("");
                  $('#colo_').val("");
                  $('#hora_').val("");
                  $('#telP_').val("");
                  $('#P_').val("");
                
                  $('#area').val("");
                  $('#sector').val("");
                  $('#idPlomero').val("");
                  $('#nombre_Plomero').val("");
                  $('#colonia').val("");
                  $('#horarios').val("");
                  $('#telefono_P').val("");
                  $('#persona').val("");

                } else {
                     
               var data = $.parseJSON(response);
                  $('#idinm').val(data.inm_id);
                  $('#ar_').val(data.area);
                  $('#sec_').val(data.sector);
                   $('#idP_').val(data.idPlomero);
                  $('#nomP_').val(data.nombre_Plomero);
                  $('#colo_').val(data.colonia);
                  $('#hora_').val(data.horarios);
                  $('#telP_').val(data.telefono_P);
                  $('#P_').val(data.persona);

                
                   $('#area').val(data.area);
                  $('#sector').val(data.sector);
                  $('#idPlomero').val(data.idPlomero);
                  $('#nombre_Plomero').val(data.nombre_Plomero);
                  $('#colonia').val(data.colonia);
                  $('#horarios').val(data.horarios);
                   $('#telefono_P').val(data.telefono_P);
                    $('#persona').val(data.persona);
      //*   $('#mesb').val(data.mes);
//*                  $('#valor').val(data.cuotacli);
                }
            },
        });
    });  
      
//----------------------------------------------------------------------------------------------------------------------------------
     $('#codlot').click(function(e){
        e.preventDefault();
        var idg = $(this).val();
        var action = 'searchLot4';
        $.ajax({ 
            url: 'ajax1.php',
            type: 'POST',
            async : true,
            data: {action:action,lote:idg},
            success: function(response)
            {
                console.log(response);
                
                if (response == 0) {
                  $('#idinm').val("");                  
                  $('#ar_').val("");
                  $('#sec_').val("");
                  $('#idP_').val("");
                  $('#nomP_').val("");
                  $('#colo_').val("");
                  $('#hora_').val("");
                  $('#telP_').val("");
                  $('#P_').val("");

                  $('#area').val("");
                  $('#sector').val("");
                  $('#idPlomero').val("");
                  $('#nombre_Plomero').val("");
                  $('#colonia').val("");
                  $('#horarios').val("");
                  $('#telefono_P').val("");
                  $('#persona').val("");

                } else {
                  
               var data = $.parseJSON(response);
                  $('#idinm').val(data.inm_id);       
                  $('#ar_').val(data.area);
                  $('#sec_').val(data.sector);
                  $('#idP_').val(data.idPlomero);
                  $('#nomP_').val(data.nombre_Plomero);
                  $('#colo_').val(data.colonia);
                  $('#hora_').val(data.horarios);
                  $('#telP_').val(data.telefono_P);
                  $('#P_').val(data.persona);

                  $('#area').val(data.area);
                  $('#sector').val(data.sector);
                  $('#idPlomero').val(data.idPlomero);
                  $('#nombre_Plomero').val(data.nombre_Plomero);
                  $('#colonia').val(data.colonia);
                  $('#horarios').val(data.horarios);
                  $('#telefono_P').val(data.telefono_P);
                  $('#persona').val(data.persona);
      //*   $('#mesb').val(data.mes);
//*                  $('#valor').val(data.cuotacli);
                }
            },
        });
    });  

    $('#sector').click(function(d){
      d.preventDefault();
      var sec = $(this).val();
      var action = 'searchSec';

      $.ajax({ 
          url: 'ajax1.php',
          type: 'POST',
          async : true,
          data: {action:action,sector:sec},

          success: function(response)
          {
              console.log(response);
              if (response == 0) {
              } else {
                  var data = $.parseJSON(response);
                  $('#codigo').val(data.codcli);
              }
          },
      });
  });

  $('#sobre').click(function(e){
    e.preventDefault();

    var sob = $(this).val();
    var action = 'searchsobre';

      $.ajax({ 
        url: 'ajax1.php',
        type: 'POST',
        async : true,
        data: {action:action,sobre:sob},

        success: function(response)
        {
            console.log(response);

          if(response == 1){
              $('#ocultac1').slideDown(); 
              $('#ocultac2').slideDown(); 
              $('#ocultac3').slideDown(); 
              $('#ocultac4').slideDown(); 
              $('#ocultaa1').slideUp(); 
              $('#ocultaa2').slideUp(); 
              $('#ocultaa3').slideUp(); 
              $('#ocultaa4').slideUp();
          } 
          if (response == 2)  {

              $('#ocultaa1').slideDown(); 
              $('#ocultaa2').slideDown(); 
              $('#ocultaa3').slideDown(); 
              $('#ocultaa4').slideDown();
              $('#ocultac1').slideUp(); 
              $('#ocultac2').slideUp(); 
              $('#ocultac3').slideUp(); 
              $('#ocultac4').slideUp(); 
          } 
        },


    });

  });

});
 
 


function printDiv(nombreDiv) {
  var contenido= document.getElementById(nombreDiv).innerHTML;
  var contenidoOriginal= document.body.innerHTML;

  document.body.innerHTML = contenido;

  window.print();

  document.body.innerHTML = contenidoOriginal;
}

function retornarFecha()
{
  var fecha
  fecha=new Date();
  var cadena=fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getYear();
  return cadena;
}

function retornarHora()
{
  var fecha
  fecha=new Date();
  var cadena=fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
  return cadena; 
}



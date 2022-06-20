$(document).ready(function(){

  
   
     $('#IdPlomero').keyup(function(e){
        e.preventDefault();
 
        var idi = $(this).val();
        var action = 'searchLot2';

        $.ajax({ 
            url: 'ajax.php',
            type: 'POST',
            async : true,
            data: {action:action,inm_idd:idi},

            success: function(response)
            {
                console.log(response);

                
                if (response == 0) {
          
                  

                  $('#NombrePlomero').val("");
                  $('#ApellidoPlomero').val("");
                 
                } else {
                     
               var data = $.parseJSON(response);
                 
                  
                  $('#IdPlomero').val(data.plo_id);
           
                  
                  $('#NombrePlomero').val(data.plo_nombres);
                  $('#ApellidoPlomero').val(data.plo_apellidos);
                
                }

            },


        });

    });

   



});






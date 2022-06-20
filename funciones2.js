<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
$(document).ready(function(){

  
   
     $('#usuariou').keyup(function(e){
        e.preventDefault();
 
        var idi = $(this).val();
        var action = 'buscar';

        $.ajax({ 
            url: 'ajax2.php',
            type: 'POST',
            async : true,
            data: {action:action,IdUsuario:idi},

            success: function(response)
            
              
                            {
                                $('epale').html(response).fadeIn();
                            }


        });

    });

   



});
</script>
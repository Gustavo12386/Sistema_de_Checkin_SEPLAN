$(function (){
	$('.formulario').submit(function(){		
	  $.ajax({
		 url: 'editar.php',
		 type: 'POST',
		 data: $('.formulario').serialize(),
		 success: function(data){			 			
			 $('.tela').html(data);			 
		 }
	  });
    return false;
  }); 
});

	
 

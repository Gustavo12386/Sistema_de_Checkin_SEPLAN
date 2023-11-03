$(function (){
	$('.form').submit(function(){		
	  $.ajax({
		 url: 'realizar_inscricao.php',
		 type: 'POST',
		 data: $('.form').serialize(),
		 success: function(data){			 			
			 $('.mostrar').html(data);			 
		 }
	  });
	  return false;
	}); 
 });
 

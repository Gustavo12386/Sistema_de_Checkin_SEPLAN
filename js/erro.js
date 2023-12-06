$(function (){
	$('.erro').submit(function(){		
	  $.ajax({
		 url: 'realizar_login.php',
		 type: 'POST',
		 data: $('.erro').serialize(),
		 success: function(data){			 			
			 $('.mensagem').html(data);	
             $('.erro')[0].reset();		 
		 }
	  });
	return false;
   }); 
});
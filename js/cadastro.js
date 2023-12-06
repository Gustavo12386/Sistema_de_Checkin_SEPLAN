$(function (){
	$('.cadastro').submit(function(){		
	  $.ajax({
		 url: 'realizar_cadastro.php',
		 type: 'POST',
		 data: $('.cadastro').serialize(),
		 success: function(data){			 			
			 $('.success').html(data);			 
		 }
	  });
    return false;
  }); 
});
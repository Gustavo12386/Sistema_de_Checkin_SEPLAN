$(function (){
    $('.form').submit(function(){		
      $.ajax({
      url: 'realizar_inscricao.php',
      type: 'POST',         
      data: $('.form').serialize(),
      success: function(data){                             
        $('.inscricao').html(data);             
        $('.form')[0].reset();				 
      }
      });
      return false;
    }); 
  });
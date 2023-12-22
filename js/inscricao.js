$(function (){
    $('.form').submit(function(){		
      $.ajax({
      url: 'realizar_inscricao.php',
      type: 'POST',         
      data: $('.form').serialize(),
      success: function(data){                             
        $('.inscricao').html(data);
              Swal.fire({
                  title: 'Inscricao Realizada com Sucesso!',
                  icon: 'success',
                  customClass: {
                      popup: 'ins', 
                  }
              });
              $('.form')[0].reset();				 
      }
      });
      return false;
    }); 
  });
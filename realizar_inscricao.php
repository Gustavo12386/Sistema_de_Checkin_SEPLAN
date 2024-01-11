<?php 
  include('config/pdo.php');    
  try
  {   
        
      $id_evento = $_POST['id'];
      $evento = $_POST['nome_evento'];
      $nome = $_POST['nome_participante'];      
      $cpf = $_POST['cpf'];  
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];   
      $orgao = $_POST['orgao'];
      $cargo = $_POST['cargo'];
     
      $sql = $conexao_pdo->prepare("INSERT INTO participantes (id, nome_evento, nome_participante, cpf, email, telefone, orgao, cargo) VALUES
      (:id,:nome_evento, :nome_participante, :cpf, :email, :telefone, :orgao, :cargo)");
      $sql->bindValue(':id', $id_evento);
      $sql->bindValue(':nome_evento', $evento);
      $sql->bindValue(':nome_participante', $nome); 
      $sql->bindValue(':cpf', $cpf);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':telefone', $telefone);
      $sql->bindValue(':orgao', $orgao);
      $sql->bindValue(':cargo', $cargo);
      $sql->execute();   
      
      if($sql->rowCount() > 0){
        echo '<script>';
        echo "$(document).ready(function(){
            Swal.fire({
              title: 'Inscricao Realizada com Sucesso!',
              icon: 'success',
              customClass: {
                  popup: 'ins', 
              }
          });
        });";
        echo'</script>';        
      }
      }
    
  catch(PDOException $e)
  {
    print "Erro: " . $e->getMessage();
  } 



?>
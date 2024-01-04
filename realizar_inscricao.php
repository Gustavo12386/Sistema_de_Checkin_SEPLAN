<?php 
  include('pdo.php');   
  function validarCPF($cpf){
    $cpf = preg_replace('/[^0-9]/', '', $cpf);    
    if (strlen($cpf) !== 11) {
        return false;
    }
  
    if (preg_match('/^(\d)\1+$/', $cpf)) {
        return false;
    }
    
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += intval($cpf[$i]) * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = $resto < 2 ? 0 : 11 - $resto;
   
    if (intval($cpf[9]) !== $digito1) {
        return false;
    }
  
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += intval($cpf[$i]) * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = $resto < 2 ? 0 : 11 - $resto;
   
    if (intval($cpf[10]) !== $digito2) {
        return false;
    }
    
    return true;
  }
 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';  
      $cpf = preg_replace('/[^0-9]/', '', $cpf);
      if (!validarCPF($cpf)) {
      echo '<script>alert("CPF Inválido! Sua inscrição não foi realizada.");</script>';     
      exit();
      }   
    try
      {      
      $id_evento = $_POST['id'];
      $evento = $_POST['nome_evento'];
      $nome = $_POST['nome_participante']; 
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
    json_encode(['status' => 'Erro: ' . $e->getMessage()]);
  } 
} 


?>
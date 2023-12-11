<?php
extract($_POST); // Transforma em variável
include('pdo.php');

$rows = $conexao_pdo->query("SELECT max(id) FROM evento")->fetch();
if(empty($rows))
{
  $keypass = md5(100);
}
else
{
  $keypass = md5($rows[0]);
}

// Prepara o Insert
$insere = $conexao_pdo->prepare("INSERT INTO evento(nome,data,inicio,fim,
   organizador,obs,keypass) 
	VALUES
	( ?, ?, ?, ?, ?, ?, ?)
");

// Insere
$status = $insere->execute(array($nome,$data,$inicio,$fim,$organizador,$obs,$keypass));

if($status)
{	
  echo 1;
  // Mata o script
  exit;	
}
else
{
  echo 'Erro ao enviar dados.';	
  // Mata o script
  exit;
}

$conexao_pdo = null;

?>
<?php

extract($_POST); // Transforma em variável
extract($_GET); // Transforma em variável


include "conexao.class.php"; 

/**
 * Classe Evento
 */

class evento
{
	var $id, $nome, $data, $inicio, $fim, $organizador, $obs;
	var $res;
	

public function __construct()	{


	$this->hr = date("H:i:s");
	$this->dt = date("Y-m-d");
	
	
}



function insere() {

$objCon = new conexao();


// Prepara o Insert
$insere = $objCon->$conexao_pdo->prepare("
	INSERT INTO `bd_cheking`.`evento` (
		`nome`,
		`data`,
		`inicio`,
		`fim`,
		`organizador`,
		`obs`,
		`keypass`
	) 
	VALUES
	( ?, ?, ?, ?, ?, ?, ? )
");

// Insere
$status = $insere->execute(
	array(
		$nome,
		$data,
		$inicio,
		$fim,
		$organizador,
		$obs,
		$keypass
		
	)
);

echo "AQUIIIIIIII";

if ($status) {
	
	echo $nome;
	// Mata o script
	exit;
	
} else {
	echo 'Erro ao enviar dados.';	
	// Mata o script
	exit;
}

	
}



function listar()
{
	$sql = "SELECT * 
			FROM evento";
			
	//echo "=====>".$sql;
	$objCon = new conexao();
	
	if ($objCon->executaquery($sql)) {
	
		$this->res = $objCon->result;
		return true;

	}
	else
	{	
	
		return false;
	}

	$objCon->conexao_pdo = null;

}
function retornar($id)
{
	$sql = "SELECT id, nome, data 
			FROM evento where id = $id";
			
	echo "=====>".$sql;
	$objCon = new conexao();
	
	if ($objCon->executaquery($sql)) {
	
		$this->res = $objCon->result;
		return true;

	}
	else
	{	
	
		return false;
	}

}

}	



?>
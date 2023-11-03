<?php

extract($_POST); // Transforma em variável


// Se n�o postar nada
if ( ! isset( $_POST ) || empty( $_POST ) ) {
	
	// Mensagem para o usu�rio
	echo 'Nada a publicar!';
	
	// Mata o script
	exit;
}


// Verifica se todas as vari�veis est�o definidas
if ( 
	   ! isset( $nome )  
	|| ! isset( $data ) 
	|| ! isset( $inicio )
	|| ! isset( $fim )
	|| ! isset( $campanha )
) {
	// Mensagem para o usu�rio
	echo 'Existem variáveis não definidas.';

	// Mata o script
	exit;
}

// Inclui o arquivo de conex�o
include('pdo.php');



$rows = $conexao_pdo->query("SELECT max(id) FROM evento")->fetch();

if ( empty($rows[0]) ) {
	$keypass = md5(1);
}
else {
	$keypass = md5($rows[0]);
}

// Prepara o Insert
$insere = $conexao_pdo->prepare("
	INSERT INTO `bd_cheking`.`evento` (
		`nome`,
		`data`,
		`inicio`,
		`fim`,
		`campanha`,
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
		$campanha,
		$obs,
		$keypass
		
	)
);

if ($status) {
	
	echo $nome;
	// Mata o script
	exit;
	
} else {
	echo 'Erro ao enviar dados.';	
	// Mata o script
	exit;
}


<?php

//if (isset($_GET['erro'])&&($_GET['erro']=="true")){error_reporting(E_ALL);} else {error_reporting(0);}

class conexao {

/* Variáveis PDO */

var $conexao_pdo = null;

var $result="";


public function __construct()	{

   	
    /* Concatenação das variáveis para detalhes da classe PDO */
    /*$detalhes_pdo  = "mysql:host=".$host_db;
    $detalhes_pdo .= ";dbname=".$base_dados;
    $detalhes_pdo .= ";charset=".$charset_db;*/

    $detalhes_pdo  = "mysql:host=localhost";
    $detalhes_pdo .= ";dbname=bd_cheking";
    $detalhes_pdo .= ";charset=utf8";
    // Tenta conectar
    try {
        // Cria a conexão PDO com a base de dados
        $this->conexao_pdo = new PDO($detalhes_pdo, "root", "");
        
    } catch (PDOException $e) {
        // Se der algo errado, mostra o erro PDO
        print "Erro: " . $e->getMessage() . "<br/>";
        
        // Mata o script
        die();
    }
    

} 

function executaquery ($sql){

     //echo $sql;   
     
     if ($this->result = $this->conexao_pdo->query($sql)) {
        return true;
     }
     else {
        return false;
     }
     
     /*     
     if ($this->result =$this->conexao_pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC)) {              
        return true;
     }
     else {
        return false;
     }
     */
       

}


}
?>
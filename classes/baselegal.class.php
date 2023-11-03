<?


if (is_file("../conf/mensagem.class.php")){	
include_once "../conf/mensagem.class.php"; 
include_once "../conf/conexao.class.php"; 
} 
else

{	include_once "conf/mensagem.class.php";
	include_once "conf/conexao.class.php"; 
}

/**
 * Classe Tipo Aчуo Relacionamento
 */

class baselegal
{
	var $id_bl, $tp_bl, $desc_bl, $file_bl;
	var $hr, $dt, $pessoa, $msg, $qtdErros, $res, $data, $sql, $qtd;
	

function baselegal()
{
	$this->hr = date("H:i:s");
	$this->dt = date("Y-m-d");
	//$this->pessoa=$ps;
	$this->msg="Favor verificar:\\n";
	$this->qtdErros=0;
	$this->objMSG = new mensagem();
}


function listar()
{
	$sql = "SELECT * 
			FROM baselegal
			ORDER BY id_bl ASC";
			
	//echo "=====>".$sql;
	
	$objCon = new conexao();

	if ($objCon->executa($sql))
	{	
		$this->res = $objCon->res;
		$this->qtd = $objCon->qtd;	
	}
	else
	{	
		$this->res=0;
	}

}	

function excluir($cod)

{

	$objCon = new conexao();


	$sql = "delete from baselegal where id_bl = $cod";

			echo "=====>".$sql;


	if ($objCon->executa($sql))

	{

		$result =1;

	}

	else

	{  

		$result =0;

	}

	return $result;

}


function dados()
{		
	if ($this->qtd==0)
	{ 
		return false;
	}
	if ($this->data = mysqli_fetch_array($this->res))
	{ 
		return true;
	} 
	else 
	{
		return false;
	}
}

function qtdErro()
{
	return $this->qtdErros;
}

	
}
?>
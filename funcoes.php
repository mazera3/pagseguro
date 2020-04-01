<?php

require("conexao.php");

$retorno = array();

if($_GET['acao'] == 'estado'){
	$sql = $conn->prepare("SELECT * FROM estado");
	$sql->execute();	
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();
	while($ln = $sql->fetchObject()){
		$retorno['estado'][$n]   = $ln->estado;
		$retorno['uf'][$n] 	 = $ln->uf;
                $retorno['id'][$n] 	 = $ln->id;
		$n++;
	}	
}

if($_GET['acao'] == 'cidade'){
	$uf = $_GET['uf'];
	$sql = $conn->prepare("SELECT * FROM cidade WHERE uf_id = :uf");
	$sql->bindValue(":uf", $uf, PDO::PARAM_STR);
	$sql->execute();
	$n = 0;
	$retorno['qtd'] = $sql->rowCount();

	while($ln = $sql->fetchObject()){
		$retorno['cidade'][$n]      = $ln->cidade;
		$retorno['id'][$n]          = $ln->id;
                $retorno['uf_id'][$n]       = $ln->uf_id;
		$n++;
	}	
}

die(json_encode($retorno));
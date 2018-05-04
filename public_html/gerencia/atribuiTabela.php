<?php
include "../Conexao.php";
$tipo = '';
$regiao = '';
$ref = '';
$e = '';

if(isset($_POST['tipo']))
	$tipo = $_POST['tipo'];
else{
	echo "<script>alert('Faltou algum dado TIPO');</script>";
	header('Location: index.php');
}

if(isset($_POST['regiao']))
	$regiao = $_POST['regiao'];
else{
	echo "<script>alert('Faltou algum dado REGIAO');</script>";
	header('Location: index.php');
}

if(isset($_POST['e']))
	$e = $_POST['e'];
else{
	echo "<script>alert('Faltou algum dado REGIAO');</script>";
	header('Location: index.php');
}

if(isset($_POST['ref']))
	$ref = $_POST['ref'];
else{
	echo "<script>alert('Faltou algum dado REF');</script>";
	header('Location: index.php');
}
$tabela = '';

$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$consulta = $c->STMTSemPrepare("SELECT id FROM tabela WHERE ref='$ref'", true);
$consulta->data_seek(0);
while ($row = $consulta->fetch_assoc()) 
	$tabela = $row['id'];


if($tipo=='estado'){
	$c->STMTSemPrepare("INSERT INTO EstadoHasTabela VALUES ('$regiao','$tabela')", false);
	echo "<script>alert('Tabela atribuída com sucesso!');</script>";
	$c->desconecta();
	header("Location: editaEstado.php?e=$e");
}else if($tipo=='regiao'){
	$c->STMTSemPrepare("INSERT INTO RegiaoHasTabela VALUES ('$regiao','$tabela')", false);
	echo "<script>alert('Tabela atribuída com sucesso!');</script>";
	$c->desconecta();
	header("Location: editaRegiao.php?e=$e");
}
	

?>

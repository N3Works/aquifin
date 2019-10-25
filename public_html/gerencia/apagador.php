<?php
include "../Conexao.php";
$tipo = '';
$id = '';

if(isset($_POST['tipo']))
	$tipo = $_POST['tipo'];
else{
	echo "<script>alert('Faltou algum dado');</script>";
	header("Location: index.php");
}

if(isset($_POST['id']))
	$id = $_POST['id'];
else{
	echo "<script>alert('Faltou algum dado');</script>";
	header("Location: index.php");
}

$c = new Conexao();;
if($tipo=='estado'){
	$c->STMTSemPrepare("DELETE FROM Estado WHERE id='$id' LIMIT 1;", false);
}else if($tipo=='regiao'){
	$c->STMTSemPrepare("DELETE FROM Regiao WHERE id='$id' LIMIT 1;", false);
}else if($tipo=='tabela'){
	$c->STMTSemPrepare("DELETE FROM tabela WHERE id='$id' LIMIT 1;", false);
}
$c->desconecta();
header("Location: index.php");
?>

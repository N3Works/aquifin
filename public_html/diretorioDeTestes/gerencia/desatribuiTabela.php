<?php
include "../Conexao.php";
$tipo = '';
$r = '';
$t = '';
$e = '';
  
if(isset($_GET['tipo']))
  $tipo = $_GET['tipo'];
else{
  echo "<script>alert('Faltou algum dado TIPO');</script>";
  header('Location: index.php');
}

if(isset($_GET['e']))
  $e = $_GET['e'];
else{
  echo "<script>alert('Faltou algum dado REGIAO');</script>";
  header('Location: index.php');
}

if(isset($_GET['r']))
  $r = $_GET['r'];
else{
  echo "<script>alert('Faltou algum dado REGIAO');</script>";
  header('Location: index.php');
}

if(isset($_GET['t']))
  $t = $_GET['t'];
else{
  echo "<script>alert('Faltou algum dado REF');</script>";
  header('Location: index.php');
}

$c = new Conexao();;


if($tipo=='Estado'){
  $c->STMTSemPrepare("DELETE FROM `EstadoHasTabela` WHERE `fkEstado`=$r AND `fkTabela`=$t LIMIT 1;", false);
  echo "<script>alert('Tabela desatribuída com sucesso!');</script>";
  $c->desconecta();
  header("Location: editaEstado.php?e=$e");
}else if($tipo=='Regiao'){
  $c->STMTSemPrepare("DELETE FROM `RegiaoHasTabela` WHERE `fkRegiao`=$r AND `fkTabela`=$t LIMIT 1;", false);
  echo "<script>alert('Tabela desatribuída com sucesso!');</script>";
  $c->desconecta();
  header("Location: editaRegiao.php?e=$e");
}
?>


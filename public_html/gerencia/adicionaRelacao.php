<?php
include "../Conexao.php";

$tabelaOrigem = '';
$tabelaFinal = '';
$anoInicial = '';
$anoFinal = '';

if(isset($_POST['tabelaOrigem']))
  $tabelaOrigem = $_POST['tabelaOrigem'];
if(isset($_POST['tabelaFinal']))
  $tabelaFinal = $_POST['tabelaFinal'];
if(isset($_POST['anoInicial']))
  $anoInicial = $_POST['anoInicial'];
if(isset($_POST['anoFinal']))
  $anoFinal = $_POST['anoFinal'];  

$c = new Conexao();;
$c->STMTSemPrepare("INSERT INTO `aquifinanciame`.`tabelasAnoProduto` (`fkTabelaOrigem`, `fkTabelaAlvo`, `anoInicial`, `anoFinal`) VALUES ('$tabelaOrigem', '$tabelaFinal', '$anoInicial', '$anoFinal')", false);
$c->desconecta();
header('Location: index.php');
?>


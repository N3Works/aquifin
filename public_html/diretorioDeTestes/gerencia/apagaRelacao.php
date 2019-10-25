<?php
include "../Conexao.php";
$o = '';
$f = '';

if(isset($_GET['o']))
  $o = $_GET['o'];
if(isset($_GET['f']))
  $f = $_GET['f'];

$c = new Conexao();;
  $c->STMTSemPrepare("DELETE FROM `tabelasAnoProduto` WHERE `fkTabelaOrigem`='$o' AND `fkTabelaAlvo`='$f'", false);
$c->desconecta();
  header("Location: index.php");
?>

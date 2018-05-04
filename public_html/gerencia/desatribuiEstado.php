<?php
include "../Conexao.php";
$tipo = '';
$r = '';
$t = '';
$e = '';
  
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
  echo "<script>alert('Faltou algum dado REGIAO');</script>";
  header('Location: index.php');
}  

  $c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');

  $c->STMTSemPrepare("DELETE FROM `RegiaoHasEstado` WHERE `fkRegiao`=$r AND `fkEstado`=$t LIMIT 1;", false);
  echo "<script>alert('Estado desatribuído com sucesso!');</script>";
  $c->desconecta();
  header("Location: editaRegiao.php?e=$e");

?>


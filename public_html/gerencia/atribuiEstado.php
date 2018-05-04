<?php
include "../Conexao.php";
$tipo = '';
$regiao = '';
$ref = '';
$e = '';

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

if(isset($_POST['uf']))
  $uf = $_POST['uf'];
else{
  echo "<script>alert('Faltou algum dado UF');</script>";
  header('Location: index.php');
}
$estado = '';

$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$consulta = $c->STMTSemPrepare("SELECT `id` FROM `Estado` WHERE `uf`='$uf'", true);
$consulta->data_seek(0);
while ($row = $consulta->fetch_assoc()) 
  $estado = $row['id'];
  $c->STMTSemPrepare("INSERT INTO `RegiaoHasEstado` VALUES ('$regiao','$estado')", false);
  echo "<script>alert('Estado atribuído com sucesso!');</script>";
  $c->desconecta();
  header("Location: editaRegiao.php?e=$e");

  

?>

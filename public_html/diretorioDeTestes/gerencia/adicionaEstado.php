<?php
include "../Conexao.php";

$nome = '';
$uf = '';

if(isset($_POST['nome']))
  $nome = $_POST['nome'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
if(isset($_POST['uf']))
  $uf = $_POST['uf'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}

$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$c->STMTSemPrepare("INSERT INTO Estado VALUES (NULL , '$nome', '$uf')", false);
echo "<script>alert('Estado adicionado com sucesso!');</script>";
$c->desconecta();
header('Location: index.php');
?>

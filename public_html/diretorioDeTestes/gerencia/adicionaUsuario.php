<?php
include "../Conexao.php";

$nome = '';
$uf = '';
$prioridade = '';

if(isset($_POST['user']))
  $user = $_POST['user'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
//  header('Location: adicionarTabela.php');
}
if(isset($_POST['ref']))
  $ref = $_POST['ref'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
if(isset($_POST['senha']))
  $pword = $_POST['senha'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
  
if(isset($_POST['nivel']))
  $level = $_POST['nivel'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}  

$c = new Conexao();;
$c->STMTSemPrepare("INSERT INTO `aquifinanciame`.`Usuarios` VALUES (NULL ,  '$user',  SHA1('$pword'),  '$level', '$ref')", false);
echo "<script>alert('Região adicionada com sucesso!');</script>";
$c->desconecta();
header('Location: index.php');
?>


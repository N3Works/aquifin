<?php
include "../Conexao.php";

$nome = '';
$uf = '';
$prioridade = '';

if(isset($_POST['nome']))
  $nome = $_POST['nome'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
//  header('Location: adicionarTabela.php');
}
if(isset($_POST['uf']))
  $uf = $_POST['uf'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
if(isset($_POST['prioridade']))
  $prioridade = $_POST['prioridade'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}

$c = new Conexao();;
$c->STMTSemPrepare("INSERT INTO `aquifinanciame`.`Regiao` (`id` ,`nome` ,`uf` ,`prioridade` ,`desc`) VALUES (NULL ,  '$nome',  '$uf',  '$prioridade', NULL)", false);
echo "<script>alert('Região adicionada com sucesso!');</script>";
$c->desconecta();
header('Location: index.php');
?>


<?php
include "../Conexao.php";

$nome = '';
$ref = '';
$tc = '';
$desc = '';

if(isset($_POST['nome']))
  $nome = $_POST['nome'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
if(isset($_POST['ref']))
  $ref = $_POST['ref'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
if(isset($_POST['tc']))
  $tc = $_POST['tc'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
if(isset($_POST['desc']))
  $desc = $_POST['desc'];
else{
  echo "<script>alert('Faltou algum dado');</script>";
  header('Location: index.php');
}
echo $nome . "<br />";
echo $ref . "<br />";
echo $tc . "<br />";
echo $desc . "<br />";

 
$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$c->STMTSemPrepare("INSERT INTO tabela VALUES (NULL , '$nome', '$ref', '$tc', '$desc')", false);
$c->desconecta();
header('Location: index.php');
?>
<?php include "checagem.php"; ?>
<?php
$tipo = '';
$id = '';
$obj = '';
$novoValor = '';
$wayback = 'index.php';

if(isset($_POST['tipo']))
  $tipo = $_POST['tipo'];
if(isset($_POST['id']))
  $id = $_POST['id'];  
if(isset($_POST['obj']))
  $obj = $_POST['obj'];
if(isset($_POST['novoValor']))
  $novoValor= $_POST['novoValor'];
if(isset($_POST['wayback']))
  $wayback = $_POST['wayback'];  
  
include "../Conexao.php";
$c = new Conexao();;
if($obj=='pword')
   $c->STMTSemPrepare("UPDATE `aquifinanciame`.`$tipo` SET `$obj` = SHA1('$novoValor') WHERE `$tipo`.`id` = $id",false); 
else 
   $c->STMTSemPrepare("UPDATE `aquifinanciame`.`$tipo` SET `$obj` = '$novoValor' WHERE `$tipo`.`id` = $id",false);
header("Location: $wayback");  
  
?>

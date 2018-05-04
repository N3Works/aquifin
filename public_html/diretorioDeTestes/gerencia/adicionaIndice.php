<?php
include "../Conexao.php";
$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');

$wayback = 'index.php';
$tabela = '';
$fator = '';
$fat = '';
$parcelas = '';
$par = '';  
$indice = '';

if(isset($_POST['wayback']))
  $wayback = $_POST['wayback'];
if(isset($_POST['tabela']))
  $tabela = $_POST['tabela'];  
if(isset($_POST['fator']))
  $fator = $_POST['fator'];
if(isset($_POST['fat']))
  $fat = $_POST['fat'];
if(isset($_POST['parcelas']))
  $parcelas = $_POST['parcelas'];
if(isset($_POST['par']))
  $par = $_POST['par'];
if(isset($_POST['indice']))
  $indice = $_POST['indice'];


if($fator=='outro'){
  $fatorRepetido = false;
  $consultaFatores = $c->STMTSemPrepare("SELECT * FROM `fator`  WHERE `nome`='$fat'",true);
  $consultaFatores->data_seek(0);
  while ($row = $consultaFatores->fetch_assoc()) {
    if($row['id']>0)
      $fatorRepetido = true;
  }
  if($fatorRepetido)
    header("Location: $wayback");
    
  $c->STMTSemPrepare("INSERT INTO `fator` VALUES (NULL ,'$fat')",false);
  $consultaFatores = $c->STMTSemPrepare("SELECT * FROM `fator`  WHERE `nome`='$fat'",true);
  $consultaFatores->data_seek(0);
  while ($row = $consultaFatores->fetch_assoc()) {
    $fator = $row['id'];
  }  
}else{
  $consultaFatores = $c->STMTSemPrepare("SELECT * FROM `fator`  WHERE `nome`='$fator'",true);
  $consultaFatores->data_seek(0);
  while ($row = $consultaFatores->fetch_assoc()) {
    $fator = $row['id'];
  }      
}   

if($parcelas=='outro'){
  $parcelasRepetido = false;
  $consultaParcelas = $c->STMTSemPrepare("SELECT * FROM `parcelas`  WHERE `valor`='$par'",true);
  $consultaParcelas->data_seek(0);
  while ($row = $consultaParcelas->fetch_assoc()) {
    if($row['id']>0)
      $parcelasRepetido = true;
  }
  if($parcelasRepetido)
    header("Location: $wayback");
    
  $c->STMTSemPrepare("INSERT INTO `parcelas` VALUES (NULL ,'$par')",false);
  $consultaParcelas = $c->STMTSemPrepare("SELECT * FROM `parcelas`  WHERE `valor`='$par'",true);
  $consultaParcelas->data_seek(0);
  while ($row = $consultaParcelas->fetch_assoc()) {
    $parcelas = $row['id'];
  }  
}else{
  $consultaParcelas = $c->STMTSemPrepare("SELECT * FROM `parcelas`  WHERE `valor`='$parcelas'",true);
  $consultaParcelas->data_seek(0);
  while ($row = $consultaParcelas->fetch_assoc()) {
    $parcelas = $row['id'];
  }      
}  
  echo "T: $tabela - F: $fator - P: $parcelas ";
$valorRepetido = false;
$consultaValores = $c->STMTSemPrepare("SELECT * 
                                       FROM `TabelaHasIndice` 
                                       WHERE `fkTabela`='$tabela' AND `fkFator`='$fator' AND `fkParcelas`='$parcelas'
                                       LIMIT 1",
                                      true);
  
$consultaValores->data_seek(0);
while ($row = $consultaValores->fetch_assoc()) {
  $valorRepetido = true;
}
if(!$valorRepetido)
  $c->STMTSemPrepare("INSERT INTO `aquifinanciame`.`TabelaHasIndice` VALUES ($tabela, $fator, $parcelas, $indice)", false);
$c->desconecta();  
header("Location: $wayback");
?>


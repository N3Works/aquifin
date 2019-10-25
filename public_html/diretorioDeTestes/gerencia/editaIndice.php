<?php include "checagem.php"; ?>
<?php
$idTabela = '';
$fator = '';
$parcelas = '';  
$novoValor = '';
$wayback = 'index.php';


if(isset($_POST['id']))
  $idTabela = $_POST['id'];  
if(isset($_POST['f']))
  $fator = $_POST['f'];  
if(isset($_POST['p']))
  $parcelas = $_POST['p'];
if(isset($_POST['novoValor']))
  $novoValor= $_POST['novoValor'];
if(isset($_POST['wayback']))
  $wayback = $_POST['wayback'];  

include "../Conexao.php";
$c = new Conexao();;
$c->STMTSemPrepare("UPDATE `aquifinanciame`.`TabelaHasIndice`
                   SET `Indice` = '$novoValor'
                   WHERE `fkTabela` = $idTabela
                   AND `fkFator` = $fator
                   AND `fkParcelas` = $parcelas",
                   false);
header("Location: $wayback");  
  
?>

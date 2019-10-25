<?php
include "../Conexao.php";
$wayback = '';
$idTabela = '';
$fator = '';
$parcelas = '';

if(isset($_GET['wayback']))
  $idTabela=$_GET['wayback'];
if(isset($_GET['t']))
  $idTabela=$_GET['t'];
if(isset($_GET['f']))
  $fator=$_GET['f'];
if(isset($_GET['p']))
  $parcelas=$_GET['p'];  

$c = new Conexao();;
$c->STMTSemPrepare("DELETE 
                    FROM `TabelaHasIndice`
                    WHERE `fkTabela`=$idTabela
                    AND `fkFator`=$fator
                    AND `fkParcelas`=$parcelas ", false);

$c->desconecta();
header("Location: $wayback");
?>

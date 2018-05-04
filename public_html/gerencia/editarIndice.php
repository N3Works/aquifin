<?php $voltar='sair'; ?>
<?php include "checagem.php"; ?>
<?php
$wayback='index.php';
$tipo = '';
$id = '';
$f = '';
$p = '';
$t = '';

if(isset($_GET['wayback']))
  $wayback = $_GET['wayback'];
if(isset($_GET['id']))
  $idTabela = $_GET['id'];
if(isset($_GET['f']))
  $fator = $_GET['f'];  
if(isset($_GET['p']))
  $parcelas = $_GET['p']; 
if(isset($_GET['t']))
  $tabela = $_GET['t'];    
  $tipo = 'indice';

  
include "../Conexao.php";
$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$dados = Array();
$consulta = $c->STMTSemPrepare("SELECT *
                                FROM `TabelaHasIndice`
                                WHERE `fkTabela`=$idTabela
                                AND `fkFator`=$fator
                                AND `fkParcelas`=$parcelas ", true);
$consulta->data_seek(0);
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Editar Índice</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <a href="<?php echo $wayback; ?>"><h3>Voltar</h3></a>
    <div class="gerencia">
      <h3>Editar Dado</h3>
      <center>
        <table width="400" border="1">
          <form name="editarIndice" method="post" action="editaIndice.php">
            <input type="hidden" name="id" value="<?php echo $idTabela; ?>" />
            <input type="hidden" name="f" value="<?php echo $fator; ?>" />
            <input type="hidden" name="p" value="<?php echo $parcelas; ?>" />
            <input type="hidden" name="wayback" value="<?php echo $wayback; ?>" />            
            <?php while ($linha = $consulta->fetch_assoc()){ ?>
            <tr>
              <th colspan='2'>Índice - <?php echo $tabela ?></th>
            </tr>
            <tr>
              <td>Valor atual</td>
              <td><?php echo $linha['Indice']; ?></td>
            </tr>
            <tr>
              <td>Novo valor</td>
              <td><input type="text" name="novoValor" /></td>
            </tr>  
            <?php } ?>
            <tr>
              <td>
                <?php echo "<a href='apagaIndice.php?t=$idTabela&f=$fator&p=$parcelas&wayback=$wayback'>Apagar</a>"; ?>
              </td>              
              <td class="adiciona"><input type="submit" value="Concluir" /></td>
            </tr>            
          </form>
        </table>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>    
  </body>
</html>
<?php $c->desconecta(); ?>
<?php $voltar='sair'; ?>
<?php include "checagem.php"; ?>
<?php

$e = '';
if(isset($_GET['e']))
  $e = $_GET['e'];
else
  header('Location: index.php');

include "../Conexao.php";

$c = new Conexao();;
$id = '';
$consulta = $c->STMTSemPrepare("SELECT * FROM tabela WHERE ref='$e'", true);
$consulta->data_seek(0);
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Editar Tabela</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>   
    <a href="index.php"><h3>Voltar</h3></a>
    <div class="gerencia">
      <h3>Editar Tabela</h3>
      <center>
        <table width="600" border="1">
          <?php
            while ($row = $consulta->fetch_assoc()) {
              $id = $row['id'];
          ?>

            <tr>
              <td>Nome</td>
              <td><?php echo $row['nome'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaTabela.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=tabela&obj=nome&Objeto=Nome">Editar</a></td>    
            </tr>
            <tr>
              <td>Ref</td>
              <td><?php echo $row['ref'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaTabela.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=tabela&obj=ref&Objeto=Ref">Editar</a></td>    
            </tr>
            <tr>
              <td>TC</td>
              <td><?php echo $row['tc'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaTabela.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=tabela&obj=tc&Objeto=TC">Editar</a></td>    
            </tr>
            <tr>
              <td>Descrição</td>
              <td><?php echo $row['desc'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaTabela.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=tabela&obj=desc&Objeto=Descrição">Editar</a></td>    
            </tr>
          <tr>
            <form name="apagarEstado" method="post" action="apagador.php">
              <input type="hidden" name="tipo" value="tabela" />
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <td colspan="3"><input type="submit" value="Apagar Tabela" /></td>
            </form>
          </tr>
          <?php }  ?>
        </table>
      </center>
    </div>
    <div class="gerencia">
      <center>
        <?php
          $contagem = $c->STMTSemPrepare("SELECT COUNT(fkFator) as quantFatores
                          FROM(
                            SELECT DISTINCT fkFator
                            FROM TabelaHasIndice
                            WHERE fkTabela=$id
                          ) as distinto
                          LIMIT 1",
                          true);
          $contagem->data_seek(0);
          while ($row = $contagem->fetch_assoc()) 
            $quantFatores= $row['quantFatores'];
        ?>
        <table class="tabela" width="600" border="1">
          <tr>
          <th>#</th>
          <?php
            $resultados = Array();
            $indices = $c->STMTSemPrepare("SELECT * FROM TabelaHasIndice WHERE fkTabela=$id",true);
            $indices->data_seek(0);
            while ($linha = $indices->fetch_assoc()){
              $linhaResultados = Array();
              array_push($linhaResultados, $linha['fkFator']); //0
              array_push($linhaResultados, $linha['fkParcelas']); //1
              array_push($linhaResultados, $linha['Indice']); //2
              array_push($resultados, $linhaResultados);
            }
            
            $fatores = Array();
            $consulta = $c->STMTSemPrepare("SELECT *
                            FROM (
                              SELECT *
                                FROM fator
                                INNER JOIN (
                                  SELECT DISTINCT fkFator
                                  FROM  TabelaHasIndice
                                  WHERE fkTabela=$id
                                ) as filtro
                                ON filtro.fkFator=fator.id
                            ) as selecao",
                            true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()){
              array_push($fatores, $row['id']);
          ?>
              <th><?php echo $row['nome']; ?></th>
          <?php } ?>
          </tr>
          <?php 
            
            /*
            $consulta = $c->STMTSemPrepare("SELECT DISTINCT fkParcelas
                            FROM  tabelahasindice
                            WHERE fkTabela=$id",
                            true);
            */
            $consulta = $c->STMTSemPrepare("SELECT *
                            FROM (
                              SELECT *
                              FROM parcelas
                              INNER JOIN (
                                SELECT DISTINCT fkParcelas
                                FROM  TabelaHasIndice
                                WHERE fkTabela=$id
                              ) as filtro
                              ON filtro.fkParcelas=parcelas.id
                            ) as selecao ORDER BY valor",
                            true);
            $consulta->data_seek(0);
            while ($parcelas = $consulta->fetch_assoc()){
          ?>
          <tr>
            <th><?php echo $parcelas['valor']; ?></th>
            <?php 
              for($i=0; $i<$quantFatores; $i++){
                echo "<td style='text-align:center'>";
                foreach($resultados as $a)
                  if($a[0]==$fatores[$i] &&
                    $a[1]==$parcelas['id'])
                    echo "<a href='editarIndice.php?wayback=editaTabela.php?e=$e&t=$e&id=$id&f=".$fatores[$i]."&p=".$parcelas['id']."'>".$a[2]."</a>";
                echo "</td>";
              }?>
          </tr>
          <?php ; }  ?>
          </table>
          <form name="adicionarIndice" method="post" action="adicionaIndice.php">
            <input type="hidden" name="wayback" value="editaTabela.php?e=<?php echo $e; ?>" />
            <input type="hidden" name="tabela" value="<?php echo $id; ?>" />            
            <table border="1">
            <tr>
              <th rowspan="4">Adicionar Índice</th>
              <th>Fator</th>
              <th>Parcelas</th>
              <th>Índice</th>
            <tr>            
              <td>
                <select name="fator">
                  <?php
                    $consulta = $c->STMTSemPrepare('SELECT * FROM fator ORDER BY nome', true);
                    $consulta->data_seek(0);
                    while ($linha = $consulta->fetch_assoc()){
                      echo '<option value="'.$linha['nome'].'">'.$linha['nome'].'</option>';
                    }
                  ?>
                  <option value="outro">Outro</option>
                </select>
              </td>
              <td>
                <select name="parcelas">
                  <?php
                    $consulta = $c->STMTSemPrepare('SELECT * FROM parcelas ORDER BY valor', true);
                    $consulta->data_seek(0);
                    while ($linha = $consulta->fetch_assoc()){
                      echo '<option value="'.$linha['valor'].'">'.$linha['valor'].'</option>';
                    }
                  ?>
                  <option value="outro">Outro</option>
                </select>
              </td>
              <td rowspan="2">
                <input type="text" name="indice" />
              </td>
            </tr>
            <tr>
              <td>
                <input type="text" name="fat" />
              </td>
              <td>
                <input type="text" name="par" />
              </td>
            </tr>
            <tr>
              <td colspan="3" class="adiciona"><input type="submit" value="Adicionar" /></td>
            </tr>
          </table>
        </form>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>
  </body>
</html>
<?php $c->desconecta(); ?>
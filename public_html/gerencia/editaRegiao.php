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
$consulta = $c->STMTSemPrepare("SELECT * FROM Regiao WHERE uf='$e'", true);
$consulta->data_seek(0);
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Editar Região</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <a href="index.php"><h3>Voltar</h3></a>
    <div class="gerencia">
      <h3>Editar Região</h3>
      <center>
        <table width="600" border="1">
          <?php
              while ($row = $consulta->fetch_assoc()) {
          ?>
          
            <tr>
              <td>Nome</td>
              <td><?php echo $row['nome']; ?></td>
              <td><a href="editarAtributo.php?wayback=editaRegiao.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Regiao&obj=nome&Objeto=Nome">Editar</a></td>    
            </tr>
            <tr>
              <td>Ref</td>
              <td><?php echo $row['uf']; ?></td>
              <td><a href="editarAtributo.php?wayback=editaRegiao.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Regiao&obj=uf&Objeto=Ref">Editar</a></td>              
            </tr>
            <tr>
              <td>Prioridade</td>
              <td><?php echo $row['prioridade']; ?></td>
              <td><a href="editarAtributo.php?wayback=editaRegiao.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Regiao&obj=prioridade&Objeto=Prioridade">Editar</a></td>                
            </tr>
            <tr>
              <td>Descrição</td>
              <td colspan="2"><?php echo $row['desc']; ?></td>
            </tr>            
            <tr>
              <td>Estados</td>
              <td>
              <?php
                $res = $c->STMTSemPrepare('SELECT *
                              FROM (
                                SELECT  uf as uf,
                                RegiaoHasEstado.fkRegiao as regiao
                                from Estado
                                INNER JOIN RegiaoHasEstado
                                ON Estado.id=RegiaoHasEstado.fkEstado
                                ) as relacao
                              WHERE regiao =' . $row['id'] . ';',
                true);
                $res->data_seek(0);
                while ($linha = $res->fetch_assoc())
                   echo $linha['uf'] . "<br />";
              ?>
              </td>                
              <td>
                <?php 
                  $res = $c->STMTSemPrepare('SELECT *
                                FROM (
                                  SELECT  uf as uf,
                                      id as id,
                                  RegiaoHasEstado.fkRegiao as regiao
                                  from Estado
                                  INNER JOIN RegiaoHasEstado
                                  ON Estado.id=RegiaoHasEstado.fkEstado
                                  ) as relacao
                                WHERE regiao =' . $row['id'] . ';',
                  true);
                  $res->data_seek(0);
                  while ($linha = $res->fetch_assoc()){
                ?>
                <a href="desatribuiEstado.php?e=<?php echo $row['uf'];?>&r=<?php echo $row['id'];?>&t=<?php echo $linha['id'];?>">Desatribuir</a>
                <br />
                <?php } ?>
              </td>
            </tr>
            <form name="atribuirEstado" method="post" action="atribuiEstado.php">
              <input type="hidden" name="regiao" value="<?php echo $row['id']; ?>" />
              <input type="hidden" name="e" value="<?php echo $row['uf']; ?>" />
            <tr>
              <td>Atribuir Estado</td>
              <td colspan="2">
                <select name="uf">
                  <?php
                    $consulta = $c->STMTSemPrepare('SELECT * FROM Estado ORDER BY id', true);
                    $consulta->data_seek(0);
                    while ($linha = $consulta->fetch_assoc()){
                      $repetido = false;
                      
                      $checagem = $c->STMTSemPrepare("SELECT fkEstado FROM RegiaoHasEstado WHERE fkRegiao='".$row['id']."'", true);
                      $checagem->data_seek(0);
                      while ($check = $checagem->fetch_assoc()){
                        if($check['fkEstado']==$linha['id'])
                          $repetido = true;
                      }
                      if($repetido==false)
                        echo '<option value="'.$linha['uf'].'">'.$linha['uf'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="3" class="adiciona"><input type="submit" value="Atribuir Estado" /></td>
            </tr>
          </form>
            
            
            <tr>
              <td>Tabelas</td>
              <td>
              <?php
                $res = $c->STMTSemPrepare('SELECT *
                              FROM (
                                SELECT  ref as ref,
                                RegiaoHasTabela.fkRegiao as regiao
                                from tabela
                                INNER JOIN RegiaoHasTabela
                                ON tabela.id=RegiaoHasTabela.fkTabela
                                ) as relacao
                              WHERE regiao =' . $row['id'] . ';',
                true);
                $res->data_seek(0);
                while ($linha = $res->fetch_assoc())
                   echo $linha['ref'] . "<br />";
              ?>
              </td>                
              <td>
                <?php 
                  $res = $c->STMTSemPrepare('SELECT *
                                FROM (
                                  SELECT  ref as ref,
                                      id as id,
                                  RegiaoHasTabela.fkRegiao as regiao
                                  from tabela
                                  INNER JOIN RegiaoHasTabela
                                  ON tabela.id=RegiaoHasTabela.fkTabela
                                  ) as relacao
                                WHERE regiao =' . $row['id'] . ';',
                  true);
                  $res->data_seek(0);
                  while ($linha = $res->fetch_assoc()){
                ?>
                <a href="desatribuiTabela.php?tipo=Regiao&e=<?php echo $row['uf'];?>&r=<?php echo $row['id'];?>&t=<?php echo $linha['id'];?>">Desatribuir</a>
                <br />
                <?php } ?>
              </td>
            </tr>
            <form name="atribuirTabela" method="post" action="atribuiTabela.php">
              <input type="hidden" name="tipo" value="regiao" />
              <input type="hidden" name="regiao" value="<?php echo $row['id']; ?>" />
              <input type="hidden" name="e" value="<?php echo $row['uf']; ?>" />
            <tr>
              <td>Atribuir Tabela</td>
              <td colspan="2">
                <select name="ref">
                  <?php
                    $consulta = $c->STMTSemPrepare('SELECT * FROM tabela ORDER BY id', true);
                    $consulta->data_seek(0);
                    while ($linha = $consulta->fetch_assoc()){
                      $repetido = false;
                      
                      $checagem = $c->STMTSemPrepare("SELECT fkTabela FROM RegiaoHasTabela WHERE fkRegiao='".$row['id']."'", true);
                      $checagem->data_seek(0);
                      while ($check = $checagem->fetch_assoc()){
                        if($check['fkTabela']==$linha['id'])
                          $repetido = true;
                      }
                      if($repetido==false)
                        echo '<option value="'.$linha['ref'].'">'.$linha['ref'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="3" class="adiciona"><input type="submit" value="Atribuir Tabela" /></td>
            </tr>
          </form>
          <tr>
            <form name="apagarRegiao" method="post" action="apagador.php">
              <input type="hidden" name="tipo" value="regiao" />
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <td colspan="3"><input type="submit" value="Apagar Regiao" /></td>
            </form>
          </tr>
          <?php }  ?>
        </table>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>
  </body>
</html>
<?php $c->desconecta(); ?>
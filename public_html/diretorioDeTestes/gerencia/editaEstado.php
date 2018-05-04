<?php $voltar = 'sair'; ?>
<?php include "checagem.php"; ?>
<?php

$e = '';
if(isset($_GET['e']))
  $e = $_GET['e'];
else
  header('Location: index.php');

include "../Conexao.php";
$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$consulta = $c->STMTSemPrepare("SELECT * FROM Estado WHERE uf='$e'", true);
$consulta->data_seek(0);
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Editar Estado</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <a href="index.php"><h3>Voltar</h3></a>
    <div class="gerencia">
      <h3>Editar Estado</h3>
      <center>
        <table width="600" border="1">
          <?php
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <form name="atribuirTabela" method="post" action="atribuiTabela.php">
            
            <tr>
              <td>Nome</td>
              <td><?php echo $row['nome'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaEstado.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Estado&obj=nome&Objeto=Nome">Editar</a></td>    
            </tr>
            <tr>
              <td>UF</td>
              <td><?php echo $row['uf'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaEstado.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Estado&obj=uf&Objeto=UF">Editar</a></td>    
            </tr>
            <tr>
              <td>Tabelas</td>
              <td>
              <?php
                $res = $c->STMTSemPrepare('SELECT *
                              FROM (
                                SELECT  ref as ref,
                                EstadoHasTabela.fkEstado as estado
                                from tabela
                                INNER JOIN EstadoHasTabela
                                ON tabela.id=EstadoHasTabela.fkTabela
                                ) as relacao
                              WHERE estado =' . $row['id'] . ';',
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
                                  EstadoHasTabela.fkEstado as estado
                                  from tabela
                                  INNER JOIN EstadoHasTabela
                                  ON tabela.id=EstadoHasTabela.fkTabela
                                  ) as relacao
                                WHERE estado =' . $row['id'] . ';',
                  true);
                  $res->data_seek(0);
                  while ($linha = $res->fetch_assoc()){
                ?>
                <a href="desatribuiTabela.php?tipo=Estado&e=<?php echo $row['uf'];?>&r=<?php echo $row['id'];?>&t=<?php echo $linha['id'];?>">Desatribuir</a>
                <br />
                <?php } ?>
              </td>
            </tr>
            <input type="hidden" name="tipo" value="estado" />
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
                      
                      $checagem = $c->STMTSemPrepare("SELECT fkTabela FROM EstadoHasTabela WHERE fkEstado='".$row[id]."'", true);
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
              <td colspan="3" class="adiciona"><input type="submit" value="Atribuir" /></td>
            </tr>
          </form>          
          <tr>
            <form name="apagarEstado" method="post" action="apagador.php">
              <input type="hidden" name="tipo" value="estado" />
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <td colspan="3"><input type="submit" value="Apagar Estado" /></td>
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
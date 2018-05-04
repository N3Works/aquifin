<?php $voltar = 'sair'; ?>
<?php
include "checagem.php";
include "../Conexao.php";

$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');

?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <h3>Gerência de Tabelas</h3>
    <div class="gerencia">
      <center>
        <table width="600" border="1">
          <tr>
            <th colspan="6">Regiões</th>
          </tr>
          <tr>
            <th>Região</th>
            <th>Ref.</th>
            <th>Estados</th>
            <th>Tabelas</th>
            <th>Prioridade</th>
            <th>Editar</th>
          </tr>
          <?php
            $consulta = $c->STMTSemPrepare('SELECT * FROM Regiao', true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['uf']; ?></td>
            <td>
            <?php
              
              $res = $c->STMTSemPrepare('SELECT uf
                            FROM(
                              SELECT
                                uf as uf,
                                RegiaoHasEstado.fkRegiao as regiao
                              FROM Estado
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
              $res = $c->STMTSemPrepare('SELECT ref
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
            <td><?php echo $row['prioridade']; ?></td>
            <td>
              <center><a href="editaRegiao.php?e=<?php echo $row['uf'];?>">Editar</a></center>
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td colspan="6" class="adiciona">
              <a href="adicionarRegiao.php">Adicionar Região</a>
            </td>
          </tr>          
        </table>
      </center>
    </div>
    
    
    
    <div class="gerencia">
      <center>
        <table width="600" border="1">
          <tr>
            <th colspan="4">Estados</th>
          </tr>
          <tr>
            <th>Estado</th>
            <th>UF</th>
            <th>Tabela(s) Própria(s)</th>
            <th>Editar</th>
          </tr>
          <?php
            $consulta = $c->STMTSemPrepare('SELECT * FROM Estado ORDER BY id', true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['uf']; ?></td>
            <td>
            <?php
              $res = $c->STMTSemPrepare('SELECT ref
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
              <center><a href="editaEstado.php?e=<?php echo $row['uf'];?>">Editar</a></center>
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td colspan="4" class="adiciona">
              <a href="adicionarEstado.php">Adicionar Estado</a>
            </td>
          </tr>
        </table>
      <center>
    </div>
    
    
    
    <div class="gerencia">
      <center>
        <table width="600" border="1">
          <tr>
            <th colspan="5">Tabelas</th>
          </tr>
          <tr>
            <th>Nome</th>
            <th>Ref</th>
            <th>TC</th>
            <th>Descrição</th>
            <th>Editar</th>
          </tr>
          <?php
            $consulta = $c->STMTSemPrepare('SELECT * FROM tabela ORDER BY nome', true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['ref']; ?></td>
            <td><?php echo $row['tc']; ?></td>
            <td><?php echo $row['desc']; ?></td>
            <td>
              <center><a href="editaTabela.php?e=<?php echo $row['ref'];?>">Editar</a></center>
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td colspan="5" class="adiciona">
              <a href="adicionarTabela.php">Adicionar Tabela</a>
            </td>
          </tr>          
        </table>
      <center>      
    </div>

        <div class="gerencia">
      <center>
        <table width="600" border="1">
          <tr>
            <th colspan="5">Relação entre Tabelas</th>
          </tr>
          <tr>
            <th>Tabela de Origem</th>
            <th>Tabela de Referência</th>
            <th>De (Ano)</th>
            <th>Até (Ano)</th>
            <th>Apagar</th>
          </tr>
          <?php
            $consulta = $c->STMTSemPrepare('SELECT * FROM tabelasAnoProduto', true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <tr>
            <td><?php $res = $c->STMTSemPrepare("SELECT * FROM `tabela` WHERE `id`=".$row['fkTabelaOrigem'],
                            true);
                  $res->data_seek(0);
                  while ($linha = $res->fetch_assoc())
                     echo $linha['ref'] . "<br />";
                ?>
            </td>
            <td><?php $res = $c->STMTSemPrepare("SELECT * FROM `tabela` WHERE `id`=".$row['fkTabelaAlvo'],
                            true);
                  $res->data_seek(0);
                  while ($linha = $res->fetch_assoc())
                     echo $linha['ref'] . "<br />";
                ?>
            </td>
            <td><?php echo $row['anoInicial']; ?></td>
            <td><?php echo $row['anoFinal']; ?></td>
            <td>
              <center><a href="apagaRelacao.php?o=<?php echo $row['fkTabelaOrigem'];?>&f=<?php echo $row['fkTabelaAlvo'];?>">apagar</a></center>
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td colspan="5" class="adiciona">
              <a href="adicionarRelacao.php">Adicionar Relação</a>
            </td>
          </tr>          
        </table>
      <center>      
    </div>
        
    <div class="gerencia">
      <center>
        <table width="600" border="1">
          <tr>
            <th colspan="5">Usuários das lojas</th>
          </tr>
          <tr>
            <th>Login</th>
            <th>Estado</th>
            <th>Editar</th>
          </tr>
          <?php
            $consulta = $c->STMTSemPrepare("SELECT * FROM `Usuarios` WHERE `level`=0", true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['ref']; ?></td>
            <td>
              <center><a href="editaUsuario.php?e=<?php echo $row['id'];?>">Editar</a></center>
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td colspan="5" class="adiciona">
              <a href="adicionarUsuario.php">Adicionar Usuário</a>
            </td>
          </tr>          
        </table>
      <center>      
    </div>    
    
    <div class="gerencia">
      <center>
        <table width="600" border="1">
          <tr>
            <th colspan="5">Usuários</th>
          </tr>
          <tr>
            <th>Login</th>
            <th>Nível</th>
            <th>Editar</th>
          </tr>
          <?php
            $consulta = $c->STMTSemPrepare("SELECT * FROM `Usuarios` WHERE `level`!=0 AND user!='alison'", true);
            $consulta->data_seek(0);
            while ($row = $consulta->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['level']; ?></td>
            <td>
              <center><a href="editaUsuario.php?e=<?php echo $row['id'];?>">Editar</a></center>
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td colspan="5" class="adiciona">
              <a href="adicionarUsuario.php">Adicionar Usuário</a>
            </td>
          </tr>          
        </table>
      <center>      
    </div>        
        
    <?php include '../partes/complementoGerencia.php'; ?>
    
    
  </body>
</html>
<?php $c->desconecta(); ?>
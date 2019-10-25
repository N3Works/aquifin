<?php $voltar='sair'; ?>
<?php include "checagem.php"; ?>
<?php 
  include "../Conexao.php";
  $c = new Conexao();;
  $consulta = $c->STMTSemPrepare("SELECT * FROM `tabela`", true);
  
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Adicionar Relação</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/> 
    <a href="index.php"><h3>Voltar</h3></a>
    <div class="gerencia">
      <center>
        <h3>Adicionar Relação</h3>
        <form name="adicionarRelacao" method="post" action="adicionaRelacao.php">
          <table width="500">
            <tr>
              <td>Tabela de Origem</td>
              <td>
                <select name="tabelaOrigem">
                  <?php
                     $consulta->data_seek(0);
                     while ($linha = $consulta->fetch_assoc())
                       echo "<option value='".$linha['id']."'>".$linha['ref']."</option>";
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Tabela Relacionada</td>
              <td>
                <select name="tabelaFinal">
                  <?php
                     $consulta->data_seek(0);
                     while ($linha = $consulta->fetch_assoc())
                       echo "<option value='".$linha['id']."'>".$linha['ref']."</option>";
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>De(ano)</td>
              <td><input type="number" min="1900" name="anoInicial"></td>
            </tr>
            <tr>
              <td>Até (ano)</td>
              <td><input type="number" min="1900" name="anoFinal"></td>
            </tr>
            <tr>
              <td colspan="2" class="adiciona"><input type="submit" value="Adicionar" /></td>
            </tr>
          </table>
        </form>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>
  </body>
</html>

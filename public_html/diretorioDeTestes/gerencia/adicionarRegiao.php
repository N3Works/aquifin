<?php $voltar='sair'; ?>
<?php include "checagem.php"; ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Adicionar Região</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/> 
    <a href="index.php"><h3>Voltar</h3></a>
    <div class="gerencia">
      <center>
        <h3>Adicionar Região</h3>
        <form name="adicionarRegiao" method="post" action="adicionaRegiao.php">
          <table width="500">
            <tr>
              <td>Nome</td>
              <td><input type="text" name="nome"></td>
            </tr>
            <tr>
              <td>UF</td>
              <td><input type="text" name="uf"></td>
            </tr>
            <tr>
              <td>Prioridade</td>
              <td><input type="text" name="prioridade"></td>
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

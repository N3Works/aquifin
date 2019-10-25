<?php $voltar='sair'; ?>
<?php 
  include "checagem.php";
  include "../Conexao.php";
?>
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
        <form name="adicionarUsuario" method="post" action="adicionaUsuario.php">
          <table width="500">
            <tr>
              <td>Login</td>
              <td><input type="text" name="user"></td>
            </tr>
            <tr>
              <td>Senha</td>
              <td><input type="password" name="senha"></td>
            </tr>
            <tr>
              <td>Nível</td>
              <td><input type="text" name="nivel"></td>
            </tr>
            <tr>
              <td>Estado</td>
              <td>
                  <select name="ref">
                     <option value="">---</option>
                  <?php
                     $c = new Conexao();;
                     $consultaEstados = $c->STMTSemPrepare('SELECT * FROM Estado ORDER BY uf', true);
                     $consultaEstados->data_seek(0);
                     while ($linha = $consultaEstados->fetch_assoc()){
                        echo '<option value="'.$linha['uf'].'">'.$linha['uf'].'</option>';
                     }
                  ?>
                  </select>
              </td>
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

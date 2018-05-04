<?php $voltar = 'voltar'; ?>
<?php session_start();
  if(isset($_SESSION['usuario']))
    header('Location: index.php');
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Login</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <h3>Gerência de Tabelas - Login</h3>
    <div class="gerencia">
      <center>
        <form name="login" method="post" action="autentica.php">
          <table width="200">
            <tr>
              <th colspan="2">AUTENTICAÇÃO</th>
            </tr>
            <tr>
              <td>Login:</td>
              <td><input type="text" name="usuario" /></td>
            </tr>
            <tr>
              <td>Senha:</td>
              <td><input type="password" name="senha" /></td>
            </tr>
            <tr>
              <td colspan="2" class="adiciona"><input type="submit" value="Entrar" /></td>
            </tr>
            <tr>
              <td colspan="2" style="color:red">
              <?php 
                if(isset($_GET['erro']))
                  echo $_GET['erro'];
              ?>
              </td>
            </tr>            
          </table>
        </form>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>    
  </body>
</html>
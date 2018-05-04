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
$consulta = $c->STMTSemPrepare("SELECT * FROM Usuarios WHERE id='$e'", true);
$consulta->data_seek(0);
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Editar Usuários</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <a href="index.php"><h3>Voltar</h3></a>
    <div class="gerencia">
      <h3>Editar Usuário</h3>
      <center>
        <table width="600" border="1">
          <?php
            while ($row = $consulta->fetch_assoc()) {
          ?>            
            <tr>
              <td>Login</td>
              <td><?php echo $row['user'] ?></td>
              <td><a href="editarAtributo.php?wayback=editaUsuario.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Usuarios&obj=user&Objeto=Login">Editar</a></td>    
            </tr>
            <tr>
              <td>UF</td>
              <td><?php echo $row['ref']; ?></td>
                            <td><a href="editarAtributo.php?wayback=editaUsuario.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Usuarios&obj=ref&Objeto=UF">Editar</a></td>    
            </tr>
            <tr>
              <td>Nivel</td>
              <td><?php
                      echo $row['level'];   
                      if($row['level']==0)
                        echo ' - lojista';
                  ?></td>
              <td><a href="editarAtributo.php?wayback=editaUsuario.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Usuarios&obj=level&Objeto=Nivel">Editar</a></td>    
            </tr>          
            <tr>
              <td>Senha</td>
              <td colspan="2"><a href="editarAtributo.php?wayback=editaUsuario.php?e=<?php echo $e; ?>&id=<?php echo $row['id'] ?>&tipo=Usuarios&obj=pword&Objeto=Senha">Editar</a></td>                
            </tr>
            <form name="apagarUsuario" method="post" action="apagador.php">
              <input type="hidden" name="tipo" value="usuario" />
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <td colspan="3"><input type="submit" value="Apagar Usuario" /></td>
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
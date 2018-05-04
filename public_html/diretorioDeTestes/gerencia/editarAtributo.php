<?php $voltar='sair'; ?>
<?php include "checagem.php"; ?>
<?php
$wayback='index.php';
$tipo = '';
$id = '';
$obj = '';
$objeto = '';

if(isset($_GET['wayback']))
  $wayback = $_GET['wayback'];

if(isset($_GET['tipo']))
  $tipo = $_GET['tipo'];
if(isset($_GET['id']))
  $id = $_GET['id'];  
if(isset($_GET['obj']))
  $obj = $_GET['obj'];
if(isset($_GET['Objeto']))
  $objeto = $_GET['Objeto'];
  
echo $tipo;
  
include "../Conexao.php";
$c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
$dados = Array();
$consulta = $c->STMTSemPrepare("SELECT * FROM $tipo WHERE id='$id' LIMIT 1", true);
$consulta->data_seek(0);
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerência de Tabelas - Editar Dado</title>
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
          <form name="editaAtributo" method="post" action="editaAtributo.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="tipo" value="<?php echo $tipo; ?>" />
            <input type="hidden" name="obj" value="<?php echo $obj; ?>" />
            <input type="hidden" name="wayback" value="<?php echo $wayback; ?>" />            
            <?php while ($linha = $consulta->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $tipo ?></td>
              <td><?php
                if($tipo=='Usuarios')
                   echo $linha['user'] . " - ";
                else
                   echo $linha['nome'] . " - ";
                   if($tipo=='tabela' || $tipo=='Usuarios') 
                      echo $linha['ref'];
                    else 
                      echo $linha['uf'];
                ?>
              </td>
            </tr>
            <tr>
              <td><?php echo $objeto; ?> atual</td>
              <td><?php
                     if($tipo=='Usuarios' && $obj=='pword'){
                         echo 'Senha encriptada na base de dados.';
                     }else 
                         echo $linha[$obj];
                   ?></td>
            </tr>
            <tr>
              <td>Novo(a) <?php echo $objeto; ?></td>
              <td><?php
                     if($tipo=='Usuarios' && $obj=='ref'){
                        echo '<select name="novoValor">';
                        $consultaEstados = $c->STMTSemPrepare('SELECT * FROM Estado ORDER BY uf', true);
                        $consultaEstados->data_seek(0);
                        while ($linha = $consultaEstados->fetch_assoc()){
                           echo '<option value="'.$linha['uf'].'">'.$linha['uf'].'</option>';
                        }
                       echo '</select>';
                     }else 
                        echo '<input type="text" name="novoValor" />';
                   ?>
              </td>
            </tr>  
            <?php } ?>
            <tr>
              <td colspan="2" class="adiciona"><input type="submit" value="Concluir" /></td>
            </tr>            
          </form>
        </table>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>    
  </body>
</html>
<?php $c->desconecta(); ?>
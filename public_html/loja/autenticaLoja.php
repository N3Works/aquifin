<?php
  include "../Conexao.php";
  $user = '';
  $pass = '';
  if(isset($_POST['usuario']))
    $user = $_POST['usuario'];
  if(isset($_POST['senha']))
    $pass = $_POST['senha'];
  
  
  $c = new Conexao('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame','mysql');
  $usuario='';
  $nivel='';
  $res = $c->STMTSemPrepare("SELECT * FROM Usuarios WHERE user='$user' AND pword=sha1('$pass')", true);
  $res->data_seek(1);
  while ($linha = $res->fetch_assoc()){
     $usuario = $linha['user'];
     $nivel = $linha['level'];
     $uf = $linha['ref'];
     $id = $linha['id'];
  }
  if($usuario=='' || $nivel==''){
    header('Location: loginLoja.php?erro=Usuário inexistente ou Senha errada!');
  }else {
    session_start();  
    $_SESSION['loja']=$usuario;
    $_SESSION['nivel']=$nivel;
    $_SESSION['uf']=$uf;
    $_SESSION['id']=$id;
  
    if($_SESSION['nivel']==100)
      header('Location: ../gerencia/');    
    if($_SESSION['nivel']==0)       
      header('Location: selecionarTipoFicha.php');
    }
  

?>
<?php $c->desconecta(); ?>
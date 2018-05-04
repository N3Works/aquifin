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
	$res->data_seek(0);
	while ($linha = $res->fetch_assoc()){
		$usuario = $linha['user'];
		$nivel = $linha['level'];
	}
	
	if($usuario=='' || $nivel==''){
		$c->desconecta();
		header('Location: login.php?erro=Usuário inexistente ou Senha errada!');
	}else if($nivel=='100'){
		session_start();	
		$_SESSION['usuario']=$usuario;
		$_SESSION['nivel']=$nivel;
		$c->desconecta();
		header('Location: index.php');
	}else{
		$c->desconecta();
		header('Location: login.php?erro=Esse usuário não possui o nível de acesso necessário!');
	}
?>

<?php 
	$u_agent = $_SERVER['HTTP_USER_AGENT']; 
	if(preg_match('/MSIE/i',$u_agent)){
		echo '<div id="top"></div>';
		echo '<nav id="menu">';
		echo '<ul>';
		echo '<li name="home"><a  name="home" href="http://www.aquifinanciamentos.com.br/2/">Home</a></li>';
		echo '<li name="formulario"><a name="formulario" href="#" onclick="exibeFormulario();">Ficha Cadastral</a></li>';
		echo '<li name="contato"><a name="contato" href="#" onclick="exibeContato();">Fale Conosco</a></li>';
		echo '</ul>';
		echo '</nav>';
	}else{
		echo '<header id="top"></header>';
		echo '<nav id="menu">';
		echo '<ul>';
		echo '<li name="home"><a  name="home" href="http://www.aquifinanciamentos.com.br/2/">Home</a></li>';
		echo '<li name="formulario"><a name="formulario"  href="#" onclick="exibeFormulario();">Ficha Cadastral</a></li>';
		echo '<li name="contato"><a name="contato" href="#" onclick="exibeContato();">Fale Conosco</a></li>';
		echo '</ul>';
		echo '</nav>';
	}
?>
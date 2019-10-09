function avancaDDD(campo, celular){
	var key = document.getElementById('ddd'+campo).value;
	if(key.match(/^[0-9]+$/) != null && (key.length==2)){
		if(celular && (key==11||key=="11"))
			document.getElementById(campo).setAttribute('maxlength','9');
		document.getElementById(campo).focus();
	}	
}
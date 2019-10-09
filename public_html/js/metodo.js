var bloqueio = false;

var cliente = false;

var simulacao = false;

var tratar = false;

var isposcalculo = false;

var precalculo = false;

var revisao = false;

var autoNovo = false;



var lista1 = [

["06", "0.213648", "0.217604", "0.221924", "0.226613"],

["12", "0.114697", "0.115996", "0.117956", "0.119931"],

["18", "0.083284", "0.084623", "0.085295", "0.086648"],

["24", "0.067002", "0.067825", "0.068518", "0.069213"],

["30", "0.056901", "0.057608", "0.058318", "0.059032"],

["36", "0.048425", "0.049137", "0.049855", "0.051086"],

["40", "0.045604", "0.046331", "0.047065", "0.047804"],

["42", "0.043806", "0.044535", "0.045272", "0.046015"],

["48", "0.039691", "0.040434", "0.041185", "0.042701"]

];





var lista2 = [

["06", "0.215291", "0.217604", "0.223594", "0.228301"],

["12", "0.116322", "0.117627", "0.119604", "0.121592"],

["18", "0.084958", "0.086309", "0.086989", "0.088354"],

["24", "0.068726", "0.069562", "0.070263", "0.070966"],

["30", "0.058674", "0.059390", "0.060112", "0.060836"],

["36", "0.050101", "0.050941", "0.051670", "0.052406"],

["40", "0.047432", "0.048173", "0.048922", "0.049672"],

["42", "0.045644", "0.046387", "0.047137", "0.047893"],

["48", "0.041560", "0.042318", "0.043084", "0.044630"]

];





var co = lista1;



function calcula() {

	var pasoption = '';

	var parcelas = '';

	var coeficiente = '';

	if (document.getElementById('anocalculo').value >= 2005) {

		co = lista1;

	}else {

		co = lista2;

	}

	var linha = '';

	var coluna = '';

	

	var val = false;

	var coe = false;

	var pas = false;

	var par = false;

	

	var valor = parseFloat(document.getElementById('valor').value);



	var parc = parseInt(document.getElementById('parcelas').value);

	switch(parc){

		case 6  : linha = 0;parcelas = 'tabela';break;

		case 12 : linha = 1;parcelas = 'tabela';break;

		case 18 : linha = 2;parcelas = 'tabela';break;

		case 24 : linha = 3;parcelas = 'tabela';break;

		case 30 : linha = 4;parcelas = 'tabela';break;

		case 36 : linha = 5;parcelas = 'tabela';break;

		case 40 : linha = 6;parcelas = 'tabela';break;

		case 42 : linha = 7;parcelas = 'tabela';break;

		case 48 : linha = 8;parcelas = 'tabela';break;

		default: parcelas = parc;break;

	}



	var parcela  = parseFloat(document.getElementById('parcela').value);

	var tc = 300;

	if(!cliente){

		var coef = document.getElementById('coeficiente').value;

		coef = coef.toUpperCase();

		coef = coef.replace(',','.');

		switch(coef){

			case 'R0' : coluna = 1;coeficiente = 'tabela';break;

			case 'R2' : coluna = 2;coeficiente = 'tabela';break;

			case 'R4' : coluna = 3;coeficiente = 'tabela';break;

			case 'R6' : coluna = 4;coeficiente = 'tabela';break;

			default: coeficiente = coef;break;

		}	

	}



	

	var val_ok = false;

	var coe_ok = false;

	var pas_ok = false;

	var par_ok = false;



	if(!isNaN(valor) && (valor!=0 || valor != '')){

		val = true;

	}

	

	if(parcelas=='tabela'){

		pas = true;

	}

	

	if(!cliente){

		if(coeficiente=='tabela'){

			coe = true;

		}



		if(!isNaN(coeficiente) && (coeficiente!=0 || coeficiente != '')){

			coe = true;

		}

	}

	

	if(!isNaN(parcela) && (parcela!=0 || parcela != '')){

		par = true;

	}

	

	//alert(val + '\n' + pas + '\n' + coe + '\n' + par);



	if(!cliente){

	if(val && coe && !pas && !par){

		if(coluna!='' && linha !=''){

			coe_ok = true;

		}else if(coluna!='' && linha==''){

			if(parcelas=='tabela'){

				coe_ok = true;

			}

		}else if(coluna=='' && linha!=''){

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}else{

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}

		if(coe_ok){

			//pasoption = 'pas' + co[linha][0];

			document.getElementById('parcelas').value = co[linha][0];

			parcelas = co[linha][0];

			parcela = (valor + tc) * coeficiente;

			document.getElementById('parcela').value = parcela.toFixed(2);
			document.getElementById('tc').value = tc;
			document.getElementById('coeficienteop').value = coef;
			document.getElementById('parc').innerHTML = 'Total de ' + parcelas + ' parcelas de R$' + parcela.toFixed(2);

			if(revisao){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

			}else{

			$('#ficha').html('<input type="button" class="loja" value="Ir para Ficha" onclick="paraficha()" />');

			}

		}

	}else if(val && coe && pas && !par){

		if(coluna!='' && linha !=''){

			coe_ok = true;			

		}else if(coluna!='' && linha==''){

			if(parcelas=='tabela'){

				coe_ok = true;

			}

		}else if(coluna=='' && linha!=''){

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}else{

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}

		if(coe_ok){

			document.getElementById('parcelas').value = co[linha][0];

			parcelas = co[linha][0];

			parcela = (valor + tc) * co[linha][coluna];

			document.getElementById('parcela').value = parcela.toFixed(2);
			document.getElementById('tc').value = tc;
			document.getElementById('coeficienteop').value = coef;
			document.getElementById('parc').innerHTML = 'Total de ' + parcelas + ' parcelas de R$' + parcela.toFixed(2);

			

			if(revisao){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

			}else{

			$('#ficha').html('<input type="button" class="loja" value="Ir para Ficha" onclick="paraficha()" />');

			}

		}	

	}else if(val && !coe && !par && pas){

		alert('Informe o Fator');

	}else if(val && !coe && par && !pas){

		alert('Não é possivel calcular apenas com Valor e Parcela');

	}else if(!val && coe && !par && pas){

		alert('Não é possível calcular apenas com Coeficiente e Número de Parcelas\nFavor informar um Valor ou Parcela');

	}else if(!val && coe && par && !pas){

		if(coluna!='' && linha !=''){

			coe_ok = true;			

		}else if(coluna!='' && linha==''){

			if(parcelas=='tabela'){

				coe_ok = true;

			}

		}else if(coluna=='' && linha!=''){

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}else{

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}

		if(coe_ok){

			document.getElementById('parcelas').value = co[linha][0];

			parcelas = co[linha][0];

			valor = parcela/co[linha][coluna] - tc;

			document.getElementById('valor').value = valor.toFixed(2);
			document.getElementById('tc').value = tc;
			document.getElementById('coeficienteop').value = coef;
			document.getElementById('parc').innerHTML = 'Total de ' + parcelas + ' parcelas de R$' + parcela.toFixed(2);

			

			if(revisao){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

			}else{

			$('#ficha').html('<input type="button" class="loja" value="Ir para Ficha" onclick="paraficha()" />');

			}

		}			

	}else if(!val && !coe && par && pas){

		alert('Favor informe o Coeficiente ou Fator da Operação para cálculo do Valor da Operação');

	}else if(val && coe && par && !pas){

		alert('Favor informe o Coeficiente ou Fator e escolha entre Valor da Operação OU Valor da Parcela ');		

	}else if(!val && coe && par && pas){

		if(coeficiente=='tabela'){

			document.getElementById('parcelas').value = co[linha][0];

			parcelas = co[linha][0];

			valor = parcela/co[linha][coluna] - tc;

			document.getElementById('valor').value = valor.toFixed(2);
			document.getElementById('tc').value = tc;
			document.getElementById('coeficienteop').value = coef;
			document.getElementById('parc').innerHTML = 'Total de ' + parcelas + ' parcelas de R$' + parcela.toFixed(2);

			if(poscalculo){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

			}else{

			$('#ficha').html('<input type="button" class="loja" value="Ir para Ficha" onclick="paraficha()" />');

			}

			

		}		

	}else if(val && coe && par && pas){

		alert('Todos campos preenchidos - Calculada o Valor da Parcela segundo Valor da Operação e Coeficiente');

		if(coluna!='' && linha !=''){

			coe_ok = true;			

		}else if(coluna!='' && linha==''){

			if(parcelas=='tabela'){

				coe_ok = true;

			}

		}else if(coluna=='' && linha!=''){

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}else{

			for(i = 0; i<co.length; i++){

				for(a = 1; a<co[i].length; a++){	

					if(parseFloat(co[i][a]) == coeficiente){

						linha = i;

						coluna = a;

						coe_ok = true;

					}

				}

			}

		}

		if(coe_ok){

			document.getElementById('parcelas').value = co[linha][0];

			parcelas = co[linha][0];

			parcela = (valor + tc) * co[linha][coluna];

			document.getElementById('parcela').value = parcela.toFixed(2);
			document.getElementById('tc').value = tc;
			document.getElementById('coeficienteop').value = coef;
			document.getElementById('parc').innerHTML = 'Total de ' + parcelas + ' parcelas de R$' + parcela.toFixed(2);

			

			if(revisao){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

			}else{

			$('#ficha').html('<input type="button" class="loja" value="Ir para Ficha" onclick="paraficha()" />');

			}

		}			

		

	}else if(val && !coe && par && pas){

		alert('Favor informe o Coeficiente ou Fator e escolha entre Valor da Operação OU Valor da Parcela ');

	}else if(!val && !coe && !par && !pas){

		alert('Favor informar dados da Operação/Simulação');

	}else if(val){

		alert('Favor informar o Coeficiente numérico ou Fator + Número de Parcelas');

	}else if(coe && coeficiente!='tabela'){

		for(i = 0; i<co.length; i++){

			for(a = 1; a<co[i].length; a++){	

				if(parseFloat(co[i][a]) == coeficiente){

					linha = i;

					coluna = a;

					coe_ok = true;

				}

			}

		}	

		if(coe_ok){

			alert('Favor informar Valor da Operação ou Valor da Parcela desejada');

		}else{

			alert('Favor informar um Coeficiente Válido e Valor da Operação ou Valor da Parcela desejada');

		}

	}else if(coe && coeficiente=='tabela'){

		alert('Favor informar Valor da Operação + Número de Parcelas ou Valor da Parcela desejada + Número de Parcelas');

	}else if(pas){

		alert('Favor informar Valor da Operação + Fator ou Valor da Parcela Desejada + Fator');

	}else if(par){

		alert('Favor informar Coeficiente ou Fator + Número de Parcelas');

	}

	}else{

		if(!val && !pas && !par){

			alert('Favor informar dados da Operação/Simulação');

		}else if(!val && !pas && par){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

		}else if(!val && pas && !par){

			alert('Favor informar Valor da Operação ou Valor da Parcela desejada');

		}else if(!val && pas && par){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

		}else if(val && !pas && !par){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

		}else if(val && !pas && par){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

		}else if(val && pas && !par){

			$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

		}else if(val && pas && par){

			alert('Favor preencher no máximo 2 campos');

		}

	}

	

	document.getElementById('valorop').value = document.getElementById('valor').value;

	document.getElementById('parcelasop').value = document.getElementById('parcelas').value;

	document.getElementById('parcelaop').value = document.getElementById('parcela').value;

	document.getElementById('anoop').value = document.getElementById('anocalculo').value;



}


function enterSenha(){
	if(event.keyCode==13){
		confereSenha();
	}
}


function metodo(tipo){


	var pass_ok = false;

	switch(tipo){

		case 0 : $('#metodo').hide("slow");$('#senhaLoja').show("slow");cliente=false; simulacao=true;$('#calculopos').prop('value','Simular Valores');$('#senha').focus();break;

		case 1 : $('#metodo').hide("slow");$('#senhaLoja').show("slow");cliente=false; simulacao=false;$('#senha').focus();break;

		case 2 : $('#metodo').hide("slow");$('#solicitacao').show("slow");cliente=true; simulacao=true;$('#calculopos').prop('value','Simular Valores');isposcalculo=true;break;

		case 3 : $('#metodo').hide("slow");$('#solicitacao').show("slow");cliente=true; simulacao=false;isposcalculo=true;break;
	}
}


function confereSenha(){
	var pass = document.getElementById('senha').value;
	if(pass=="12345"){
		$('#senhaLoja').hide("slow");
		$('#calcular').show("slow");
	}else{
		alert('Senha inválida');
		$('#senhaLoja').hide("slow");
		$('#metodo').show("slow");
	}
}

function voltaSenha(){
	$('#senhaLoja').hide("slow");
	$('#metodo').show("slow");
	cliente=false;
	simulacao=false;
	$('#calculopos').prop('value','Calcular Valores');
}



function calcular(tipo){

 

	switch(tipo){

		case 0 : $('#calcular').hide("slow"); $('#calculo').show("slow");precalculo=true;break;

		case 1 : $('#calcular').hide("slow"); $('#solicitacao').show("slow");isposcalculo=true;break;

		case 2 : $('#calcular').hide("slow"); $('#solicitacao').show("slow");tratar=true;break;

	}

}



function paraficha(){

	if(isposcalculo){

		$('#calculo').hide("fast");

	}else{

		$('#calculo').hide("slow");

	}

	$('#solicitacao').show("slow");

	if(revisao){

		$('#calculopos').prop('value','Rever Valores');

	}

	revisao=true;



	

	if(tratar){

		document.getElementById('tratarhid').value = 1;

	}else if(!tratar){

		document.getElementById('tratarhid').value = 0;

	}

	if(cliente){

		document.getElementById('cliente').value = 1;

	}else if(!cliente){

		document.getElementById('cliente').value = 0;

	}

	if(simulacao){

		document.getElementById('simu').value = 1;

	}else if(!cliente){

		document.getElementById('simu').value = 0;

	}

		

	

}





function poscalculo(){

	$('#solicitacao').hide("slow");

	if(cliente){

		$('#calculavalores').prop('value','Fixar Valores');

		$('#hrOut').hide();
		$('#coe').hide();

	}

	$('#calculo').show("slow");	

	if(revisao){

		$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" />');

	}else{

		$('#ficha').html('<input type="button" class="loja" value="Voltar para Ficha" onclick="paraficha()" disabled />');

	}

	$('#enviaform').show("fast");

}





function fimdaficha(){

				if($('#telcontato').prop('value')==null || $('#telcontato').prop('value')==''){

					$('#telcontato').parent().css('color','red');	

					telok = false;

				}else if($('#telcontato').prop('value')!=null || $('#telcontato').prop('value')!=''){

					var strin = $('#telcontato').prop('value');

					if(strin.match(/^[0-9]+$/) != null && (strin.length==8 || strin.length==9)){

						strin = $('#dddtelcontato').prop('value');

						if(strin.match(/^[0-9]+$/) != null && strin.length==2){

							$('#telcontato').parent().css('color','white');

							telok = true;

						}else{

							$('#telcontato').parent().css('color','red');

							telok = false;

						}

					}else{

						$('#telcontato').parent().css('color','red');			

						telok = false;

					}

				}				

				if($('#nomecontato').prop('value')==null || $('#nomecontato').prop('value')==''){

					$('#nomecontato').parent().css('color','red');

					nomeok = false;

				}else if($('#nomecontato').prop('value')!=null || $('#nomecontato').prop('value')!=''){

						$('#nomecontato').parent().css('color','white');

						nomeok = true;

				}				

				



	if(telok && nomeok){

		if(cepok){

			document.getElementById('cepok').value = 1;

		}else{

			document.getElementById('cepok').value = 0;

		}

		

		if(cepempok){

			document.getElementById('cepempok').value = 1;

		}else{

			document.getElementById('cepempok').value = 0;

		}

	

		if(tratar){

			$('#calculopos').hide("fast");

			$('#enviaform').show("fast");

			

		}

		if(isposcalculo){

			$('#enviaform').hide("fast");

			$('#calculopos').show("fast");

		}

		if(precalculo){

			$('#calculopos').prop('value','Rever Valores');

			revisao=true;

			$('#calculopos').show("fast");

			$('#enviaform').show("fast");

		}

		if(tratar){

			document.getElementById('tratarhid').value = 1;

		}else if(!tratar){

			document.getElementById('tratarhid').value = 0;

		}

		if(cliente){

			document.getElementById('cliente').value = 1;

		}else if(!cliente){

			document.getElementById('cliente').value = 0;

		}

		if(simulacao){

			document.getElementById('simu').value = 1;

		}else if(!cliente){

			document.getElementById('simu').value = 0;

		}	

	}else{

		alert('Favor informar o Telefone e Nome para contato');

	}

}





function automovelNovo(){
	document.getElementById('placa').value="ZER0000";
	document.getElementById('renavam').value="000000000";
	autoNovo = true;
}

function automovelUsado(){
	if(autoNovo){
		document.getElementById('placa').value="";
		document.getElementById('renavam').value="";
	}
	autoNovo = false;
}






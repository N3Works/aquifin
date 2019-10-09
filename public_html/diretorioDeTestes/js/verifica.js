function checkEnter(e){
 e = e || event;
 var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
 return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
}
var cepok = false;
var cepempok = false;

$(document.documentElement).keydown(function (event) {
if (event.keyCode == 9) {
		if($('#mesres').is(':focus'))
			document.getElementById('anores').focus();
		else if($('#rendal').is(':focus'))
			document.getElementById('rendab').focus();
		else if($('#mesresconj').is(':focus'))
			document.getElementById('anoresconj').focus();
		else if($('#rendalconj').is(':focus'))
			document.getElementById('rendabconj').focus();
		else if($('#grauref3').is(':focus'))
			document.getElementById('telref3').focus();
		else if($('input[name="condicao"]').is(':focus'))
			$('input[name="tipo"]').focus();
	}else if (event.keyCode == 13) {
		if($('#mesres').is(':focus'))
			avanca('dadosPessoais');
		else if($('#rendal').is(':focus'))
			avanca('dadosProfissionais');
		else if($('#mesresconj').is(':focus'))
			avanca('dadosPessoaisGarantidor');
		else if($('#rendalconj').is(':focus'))
			avanca('DadosProfissionaisGarantidor');
		else if($('#grauref3').is(':focus'))
			avanca('referencias');
		else if($('input[name="condicao"]').is(':focus'))
			avanca('dadosGarantia');
	}else if (event.keyCode == 27) {
		if(box){
			$('#capa').hide("slow");	
			$('#capacontato').hide("slow");			
			outbox=false;
			box = false;
		}	
	}
});


var box = false;
var outbox=false;



function exibeFormulario(){
	$('#capa').css('top',0).css('left',0).css('min-height','730px').css('height','110%').css('width','100%').animate({opacity: 1}, 500).show("slow");   
	box = true;  
}

function exibeContato(){
	$('#capacontato').css('top',0).css('left',0).css('min-height','730px').css('height','110%').css('width','100%').animate({opacity: 1}, 500).show("slow");   
	box = true;  
}

var confirma = false;
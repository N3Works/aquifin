// JavaScript Document
var part1 = 1;
var part2 = 0;
var part3 = 0;
var part4 = 0;


function mascaraCPF(campo){	
	var digitado = document.getElementById(campo).value;
	digitado = digitado.toString();
	
	do{
		var parte1 = digitado.charAt(0) + digitado.charAt(1) + digitado.charAt(2);
		if(digitado.length==3){
			if(parte1.match(/^[0-9][0-9][0-9]$/)!=null){
				document.getElementById(campo).value = parte1 + '.';
			}

		}
		part1 = 0;
		part2 = 1;		
	}while(part1);	

	do{
		var parte2 = digitado.charAt(4) + digitado.charAt(5) + digitado.charAt(6);
		if(digitado.length==7){
			if(parte2.match(/^[0-9][0-9][0-9]$/)!=null){
				document.getElementById(campo).value = parte1 + '.' + parte2 + '.';
			}
		}
		part2 = 0;
		part3 = 1;		
	}while(part2);
	
	do{
		var parte3 = digitado.charAt(8) + digitado.charAt(9) + digitado.charAt(10);
		if(digitado.length==11){
			if(parte3.match(/^[0-9][0-9][0-9]$/)!=null){
				document.getElementById(campo).value = parte1 + '.' + parte2 + '.' + parte3 + '-';
			}
		}
		part3 = 0;
		part4 = 1;		
	}while(part3);		
	
	do{
		var parte4 = digitado.charAt(12) + digitado.charAt(13);
		if(digitado.length==14){
			if(parte4.match(/^[0-9][0-9]$/)!=null){
				document.getElementById(campo).value = parte1 + '.' + parte2 + '.' + parte3 + '-' + parte4;
			}
			
		}
		part4 = 0;
	}while(part4);	
	
	if(digitado.length<=3){
		part1 = 1;
		part2 = 0;
		part3 = 0;
		part4 = 0;		
	}else if(digitado.length<=7){
		part1 = 0;
		part2 = 1;
		part3 = 0;
		part4 = 0;		
	}else if(digitado.length<=11){
		part1 = 0;
		part2 = 0;
		part3 = 1;
		part4 = 0;		
	}else if(digitado.length<=14){
		part1 = 0;
		part2 = 0;
		part3 = 0;
		if(digitado.match(/^[0-9][0-9][0-9]\.[0-9][0-9][0-9]\.[0-9][0-9][0-9]-[0-9][0-9]$/)!=null){
			part4 = 0;	
		}else{
			part4 = 1;		
		}
			
	}
}

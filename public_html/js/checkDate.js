var dia = 1;
var mes = 0;
var ano = 0;

function checkdate(campo, anos, idade){				
	var d = new Date();
	var n = d.getFullYear();
	var maxday = 31;								
	var digitado = document.getElementById(campo).value;

	digitado = digitado.toString();

	do{
		var day = digitado.charAt(0) + digitado.charAt(1);
		if(digitado.length==2){
			if(day.match(/^[1-9]\/$/)!=null){
				day = 0 + parseInt(day).toString();
				document.getElementById(campo).value = day + '\/';
			}else if(day.match(/^0[1-9]$/)!=null){
				document.getElementById(campo).value = day + '\/';
			}else if(parseInt(day)<1 || parseInt(day)>31){
			
			}else if(parseInt(day)>=10 && parseInt(day)<=31){	
				document.getElementById(campo).value = day + '\/';
			}
		}
	dia = 0;
	mes = 1;
	}while(dia);

	do{
		var month = digitado.charAt(3) + digitado.charAt(4);
		if(digitado.length==5){
			if(month.match(/^[1-9]\/$/)!=null){
				month = 0 + parseInt(month).toString();
				document.getElementById(campo).value = day + '\/' + month + '\/';
			}else if(month.match(/^0[1-9]$/)!=null){
				document.getElementById(campo).value = day + '\/' + month + '\/';
			}else if(parseInt(month)<1 || parseInt(month)>12){
			
			}else if(parseInt(month)>=10 && parseInt(month)<=12){	
				document.getElementById(campo).value = day + '\/' + month + '\/';
			}
		}
		mes = 0;
		ano = 1;
	}while(mes);

	do{
		var year = digitado.charAt(6) + digitado.charAt(7) + digitado.charAt(8) + digitado.charAt(9);
		if(digitado.length==10){
			year = parseInt(year);
			if(year<ano || year>(n-18) || isNaN(parseInt(year))){
			
			}else{
				day = parseInt(day);
				if(month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12){
					maxday=31;
				}
				if(month == 2 && year%4==0){
					maxday = 29;
					if(year % 100==0 && year % 400!=0){
						maxday = 28;	
					}
				}else if(month == 2){
					maxday = 28;	
				}
				if(day < 1 || day > maxday || isNaN(day)){
					alert('Dia Inválido');
				}else{
					ano = 0;
				}
			}
		}
	ano = 0;
	}while(ano);
	if(digitado.length<=2){
		dia = 1;
		mes = 0;
		ano = 0;
	}else if(digitado.length<=5){
		dia = 0;
		mes = 1;
		ano = 0;
	}else if(digitado.length<=10){
		dia = 0;
		mes = 0;
		ano = 1;
	}
	document.getElementById(campo + "d").value = year+"-"+month+"-"+day;
}
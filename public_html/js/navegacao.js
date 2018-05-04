contador=1;

//Original

function avanca(origem){
  if(validaArea(origem)){
    document.getElementById(origem).style.marginLeft = "-960px";
    contador++;
    trocaFundo('solicitacao');
  }
}



/*
//Desenvolvimento
function avanca(origem){
  document.getElementById(origem).style.marginLeft = "-960px";
  contador++;
  trocaFundo('solicitacao');
}

*/
function trocaFundo(objeto){
  var obj = document.getElementById(objeto);
  if((contador%2)==0){
    obj.style.background = "#0072bc url(img/sucesso"+ contador +".png) 0px 0px no-repeat";
  }else{
    obj.style.background = "#0072bc url(img/sucesso"+ contador +".png) -22px 0px no-repeat";
  }  
}



function volta(alvo){
  document.getElementById(alvo).style.marginLeft = "0px";
  contador--;
  trocaFundo('solicitacao');
}


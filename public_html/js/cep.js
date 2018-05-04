$('#capa').hide();

function verificacep(campo, complemento){
  var alerta = false;
  var cep = document.getElementById(campo).value;
  if(cep.match(/^[0-9]+$/) != null && (cep.length==8)){
    $.getScript("http://www.toolsweb.com.br/webservice/clienteWebService.php?cep="+cep+"&formato=javascript", function(){
      // seta as variáveis de retorno
      //unescape - Decodifica uma string codificada com o método escape.
      tipoRua=unescape(resultadoCEP.tipoLogradouro)
      rua=unescape(resultadoCEP.logradouro)
      bairro=unescape(resultadoCEP.bairro)
      cidade=unescape(resultadoCEP.cidade)
      uf=unescape(resultadoCEP.estado)
  
      var s1 = document.getElementById('endereco'+complemento).value.toLowerCase();
      var s2 = document.getElementById('bairro'+complemento).value.toLowerCase();
      var s3 = document.getElementById('cidade'+complemento).value.toLowerCase();
      var s4 = document.getElementById('ufend'+complemento).value.toLowerCase();

      if(s1=='' || s1 == null || s1.match(/^ *$/) ){
        alerta = true;  
      }else{
        var comparaTipo= tipoRua.toLowerCase();
        var comparaRua= rua.toLowerCase();
        var comparaBairro= bairro.toLowerCase();
        var comparaCidade= cidade.toLowerCase();
        var comparaUf = uf.toLowerCase();
        
        var comparaRua= comparaRua.split(' ');
        var comparaCidade= comparaCidade.split(' ');

        var lastIndex = -1;
        var nowIndex = -1;
        var new_str_i =0;

        for (var i=0;i<comparaRua.length;i++){
          if(i==(comparaRua.length - 1)){
            var expression = comparaRua[i]+'$';
          }else{
            var expression = comparaRua[i];
          }

          var reg = new RegExp(expression, 'g' );
          var tmp = s1.match(reg);
                
          if(tmp) {
            nowIndex = s1.indexOf(tmp);
          }else{
            alerta = true;
          }

          if (nowIndex > lastIndex) {
            lastIndex = nowIndex;
          } else {
            alerta = true;
          }
        }
        lastIndex = -1;
        nowIndex = -1;
      
        for (var i=0;i<comparaCidade.length;i++){
          if(i==0){
            var expression = '^'+comparaCidade[i];
          }else if(i==(comparaCidade.length - 1)){
            var expression = comparaCidade[i]+'$';
          }else{
            var expression = comparaCidade[i];
          }
          var reg = new RegExp(expression, 'g' )      
          var tmp = s3.match(reg);

          if(tmp) {
            nowIndex = s3.indexOf(tmp);
          }else{
            alerta = true;
          }
          if (nowIndex > lastIndex) {
            lastIndex = nowIndex;
          } else {
            alerta = true;
          }
        }

        if(s4!=comparaUf) {
          alerta = true;
        }
      }
    });

    if(alerta){
      cepok = false;
    }else if(!alerta){
      cepok = true;
    }
  }
}




function buscaCep(campo, complemento){
  var endPessoal = "";
  var comp = complemento;
  if(complemento=="pessoal"){
    endPessoal= "end";
    comp="";
  }else if(complemento=="pessoalconj"){
    endPessoal= "end";
    comp="conj";
  }
  var cep = document.getElementById(campo).value;
  if(cep=="00000000"){
    alert("Favor preencher os dados de endereço manualmente");
    $('#endereco').focus();
  }else if(cep.match(/^[0-9]+$/) != null && (cep.length==8)){
    var top = window.pageYOffset + innerHeight/3;
    var left = innerWidth/3;
    //var top = document.getElementById(campo).top;
    $('#aguardeCep').css('top',top+'px').css('left',left+'px').show('slow');
    $.getScript("http://www.toolsweb.com.br/webservice/clienteWebService.php?cep="+cep+"&formato=javascript", function(){
      // seta as variáveis de retorno
      //unescape - Decodifica uma string codificada com o método escape.
      tipoRua=unescape(resultadoCEP.tipoLogradouro);
      rua=unescape(resultadoCEP.logradouro);
      bairro=unescape(resultadoCEP.bairro);
      cidade=unescape(resultadoCEP.cidade);
      uf=unescape(resultadoCEP.estado);
      document.getElementById('endereco'+comp).value= tipoRua + ' ' + rua;
      document.getElementById('bairro'+comp).value= bairro;
      document.getElementById('cidade'+comp).value= cidade;
      document.getElementById('uf'+endPessoal+comp).value= uf;  
          
      setTimeout("$('#aguardeCep').hide('slow');",1000);
    });
  }                        
}

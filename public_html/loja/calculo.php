<div id="calculo">
  <table>
    <tr id="val"><td>Valor (R$):</td><td><input class ="money" type="text" id="valor" name="valor" /></td></tr>
    <tr id="coe"><td>Coeficiente:</td>
      <td>
        <select id="coeficiente" name="coeficiente" onchange="filtraParcelas()" />
          <option id="--" value="-">--</option>
            <?php
              foreach($fatores as $fator)
                echo "<option value=".$fator['id'].">".$fator['nome']."</option>";
            ?>
        </select>
      </td>
    </tr>
    <tr id="pas"><td>Nº de Parcelas:</td>
      <td>
        <select id="parcelas" name="parcelas" onchange="filtraFatores()" />
          <option id="--" value="-">--</option>
            <?php
              foreach($parcelas as $parcela)
                echo "<option value=".$parcela['id'].">".$parcela['valor']."</option>";
            ?>
        </select>
    </td>
    </tr>
    <tr id="par"><td>Valor da Parcela:</td><td><input type="text" id="parcela" name="parcela"  /></td></tr>
    <tr>
      <td colspan="2"></td>
    </tr>
  </table>
  <input type="button" id="limpaValores" class="loja" value="Limpar Calculo" onClick="resetaCalculo()" />
  <input type="button" id="calculavalores" class="loja" value="Calcular" onClick="calcula()" />
  <!--<input type="button" id="tratar" value="Deixar em aberto / À tratar" onclick="metodo(4)" />-->
  <div id="teste"></div>
</div>
<script>
  var fatorFiltrado = false;
  var parcelasFiltrado = false;

  function filtraParcelas(){
    var campoFator = document.getElementById('coeficiente');
    var campoParcelas = document.getElementById('parcelas');    

    
    
    if(campoFator.value=='-'){
      if(!parcelasFiltrado)
        return;
      parcelasFiltrado=false;
      campoParcelas.innerHTML = '<option value="-">--</option>';
      for(var z = 0; z < parcelas.length; z++){
        campoParcelas.innerHTML += '<option value="'+parcelas[z][0]+'">'+parcelas[z][1]+'</option>';
      }
    }else{
      if(fatorFiltrado)
        return;
      parcelasFiltrado=true;
      campoParcelas.innerHTML = '<option value="-">--</option>';
      for(var l = 0; l < fatorHasParcela.length; l++){
        if(fatorHasParcela[l][0]==campoFator.value){
          var indice = l;
          for(var m = 1; m < fatorHasParcela[indice].length; m++){
            var idParcela = fatorHasParcela[indice][m];
            for(var n = 0; n < parcelas.length; n++){
              if(parcelas[n][0]==idParcela){
                parcela = parcelas[n];
                campoParcelas.innerHTML += '<option value="'+parcela[0]+'">'+parcela[1]+'</option>';
              }
            }
          }
        }
      }
    }
  }
  
  
  function filtraFatores(){
    var campoFator = document.getElementById('coeficiente');
    var campoParcelas = document.getElementById('parcelas');
    
    if(campoParcelas.value=='-'){
      if(!fatorFiltrado)
        return;
      fatorFiltrado=false;
      campoFator.innerHTML = '<option value="-">--</option>';
      for(var z = 0; z < fatores.length; z++){
        campoFator.innerHTML += '<option value="'+fatores[z][0]+'">'+fatores[z][1]+'</option>';
      }
    }else{
      if(parcelasFiltrado)
        return;
      fatorFiltrado=true;
      campoFator.innerHTML = '<option value="-">--</option>';
      for(var l = 0; l < parcelaHasFator.length; l++){
        if(parcelaHasFator[l][0]==campoParcelas.value){
          var indice = l;
          for(var m = 1; m < parcelaHasFator[indice].length; m++){
            var idFator = parcelaHasFator[indice][m];
            for(var n = 0; n < fatores.length; n++){
              if(fatores[n][0]==idFator){
                fator = fatores[n];
                campoFator.innerHTML += '<option value="'+fator[0]+'">'+fator[1]+'</option>';
              }
            }
          }
        }
      }
    }
  }
  function resetaCalculo(){
    var campoFator = document.getElementById('coeficiente');
    var campoParcelas = document.getElementById('parcelas');
    document.getElementById('valor').value="";
    document.getElementById('parcela').value="";
    
    fatorFiltrado=false;
    parcelasFiltrado=false;
    
    campoFator.innerHTML = '<option value="-">--</option>';
    for(var z = 0; z < fatores.length; z++){
      campoFator.innerHTML += '<option value="'+fatores[z][0]+'">'+fatores[z][1]+'</option>';
    }
    
    campoParcelas.innerHTML = '<option value="-">--</option>';
    for(var z = 0; z < parcelas.length; z++){
      campoParcelas.innerHTML += '<option value="'+parcelas[z][0]+'">'+parcelas[z][1]+'</option>';
    }
  }
  
  function calcula(){
    var campoFator = document.getElementById('coeficiente');
    var campoParcelas = document.getElementById('parcelas');
    var campoParcela = document.getElementById('parcela');
    var campoValor = document.getElementById('valor');
    var vlrFinanciamentoStringOriginal = (document.getElementById('valor').value);
      vlrFinanciamento = vlrFinanciamentoStringOriginal.split(".").join("");
      vlrFinanciamento = vlrFinanciamento.replace(",",".");


    var indice = 0;
    var fator = "";
    var parcelas = "";
    var parcela = 0;
    
	if(vlrFinanciamento <= 4000){
		var tc = parseFloat(document.getElementById('tc_alternativo').value);
	}else{
		var tc = parseFloat(document.getElementById('tc').value);	
	}
	
	

    for(var i = 0; i < fatores.length; i++){
      if(fatores[i][0]==campoFator.value)
        fator = fatores[i][1];
    }
    
    for(var i = 0; i < parcelas.length; i++){
      if(parcelas[i][0]==campoParcelas.value)
        fator = parcelas[i][1];
    }
    
    if(campoFator.value=='-' || campoParcelas.value=='-'){
      alert('Favor selecionar um Coeficiente E um número de parcelas.');
      return;
    }
    
    vlrFinanciamentoFloat = parseFloat(vlrFinanciamento);
    parcela = parseFloat(campoParcela.value);
    if(isNaN(vlrFinanciamentoFloat) && isNaN(parcela)){
      alert('Favor entrar com um valor a ser financiado ou o valor de parcela desejado');
      return;
    }
    
    if(vlrFinanciamento > 0 || campoValor.value!='')
        vlrFinanciamentoFloat = parseFloat(vlrFinanciamento);
    else if(campoParcela.value>0 || campoParcela.value!='')
      parcela = parseFloat(campoParcela.value);
    
    for(var i = 0; i < fatorParcelaIndice.length; i++){
      if(fatorParcelaIndice[i][0]==campoFator.value &&
        fatorParcelaIndice[i][1]==campoParcelas.value)
        indice = fatorParcelaIndice[i][2];
    }
     
    
    if(vlrFinanciamentoFloat>0){
      parcela = (vlrFinanciamentoFloat + tc) * indice;
      campoParcela.value = parcela.toFixed(2);
    }else{
        vlrFinanciamentoFloat = parcela/indice - tc;
        document.getElementById('valor').value= vlrFinanciamentoFloat;
    }
   
   var a = document.getElementById('coeficiente');
   var b = document.getElementById('coeficiente').getElementsByTagName('option');
   for(var i=0; i<b.length;i++){
    if(b[i].value==a.value)
      document.getElementById('coeficienteop').value=b[i].innerHTML;
   }
    
   a = document.getElementById('parcelas');
   b = document.getElementById('parcelas').getElementsByTagName('option');
   for(var i=0; i<b.length;i++){
    if(b[i].value==a.value)
      document.getElementById('parcelasop').value=b[i].innerHTML;
   }
    
    
    document.getElementById('valorop').value = vlrFinanciamentoStringOriginal;
    document.getElementById('parcelaop').value = parcela.toFixed(2);
    document.getElementById('indice').value = indice;
  }
  
</script>
<input id="tabelaop" name="tabela" type="hidden" value='<?php echo $nomeTabela; ?>' />
<input id="valorop" name="valorop" type="hidden" />
<input id="indice" name="indice" type="hidden" />
<input id="coeficienteop" name="coeficienteop" type="hidden" />
<input id="parcelasop" name="parcelasop" type="hidden" />
<input id="parcelaop" name="parcelaop" type="hidden" />
<input id="anoop" name="anoop" type="hidden"  value='<?php echo $anoOP; ?>'/>
<input id="tratarhid" name="tratar" type="hidden" />
<input id="cliente" name="cliente" type="hidden" ="0"/>
<input id="simu" name="simu" type="hidden" />
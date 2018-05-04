var corDefault = "#FFF";
var corErro = "#F00";

//Valida se o campo não é vazio
function campoIsNulo(campo){
  var digitado = document.getElementById(campo).value;
  if(digitado.length==0){
    return true;
  }
  return false;
}

//Valida se o campo segue uma RegEx
function validaCampoRegEx(campo, padrao){
  var obj = document.getElementById(campo);
  var digitado = obj.value;
  var n = digitado.match(padrao);
  if(n != null){
    obj.parentNode.style.color = corDefault;
    return true;
  }
  obj.parentNode.style.color = corErro;
  return false;
}

//valida campo sem formatação
function validaCampoSF(campo){
  var retorno = validaCampoRegEx(campo,/^[^"']+$/);
  return retorno;
}

function validaNumero(campo, digitos){
  if(digitos==0)
    return validaCampoRegEx(campo,/^[0-9]{1,}[,\.]{0,1}[0-9]{0,}$/);
  if(document.getElementById(campo).value.length!=digitos){
    document.getElementById(campo).parentNode.style.color = corErro;
    return false;
  }
  return validaCampoRegEx(campo,/^[0-9]+$/);
}

function validaData(campo){
  var retorno = validaCampoRegEx(campo,/^[0-9]{1,2}\/[0-9]{1,2}\/(([0-9]{2})|([0-9]{4}))$/);
  return retorno;
}

function validaCPF(campo){
  var retorno = validaCampoRegEx(campo,/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/);
  return retorno;
}

function validaCEP(campo){
  var retorno = validaCampoRegEx(campo,/^[0-9]{8}$/);
  return retorno;
}

function validaUF(campo){
  var retorno = validaCampoRegEx(campo,/^[a-zA-Z]{2}$/);
  return retorno;
}

function validaRG(campo){
  var retorno = validaCampoRegEx(campo,/^[0-9]{10}$/);
  return retorno;
}

function validaDinheiro(campo){
  var retorno = validaCampoRegEx(campo,/^(R\$){0,1}( ){0,1}(([0-9]+\.[0-9]{2})|([0-9]+,[0-9]{2})|([0-9]+))$/);
  return retorno;
}

function validaAno(campo, digitos){
  var retorno = false;
  if(digitos==-9999)  
    retorno = validaCampoRegEx(campo,/^[0-9]+$/);
  else{
    retorno = validaCampoRegEx(campo,/^[0-9]+$/);
    if(document.getElementById(campo).value.length!=digitos)
      return false;
  }
  return retorno;
}

function validaCelular(campo){
  var campoTel = document.getElementById(campo);
  var campoDDD = document.getElementById('ddd'+campo);
  var tel = campoTel.value;
  var ddd = campoDDD.value;
  var m = ddd.match(/^[0-9]{2}$/);
  var n = "";
  if(m != null){
    if(ddd=='11')
      n = tel.match(/^[0-9]{8,9}$/);
    else
      n = tel.match(/^[0-9]{8}$/);
  }
  if(m != null && n != null){
    campoTel.parentNode.style.color = corDefault;
    return true;
  }
  campoTel.parentNode.style.color = corErro;
  return false;
}

function validaTelefone(campo){
  var campoTel = document.getElementById(campo);
  var campoDDD = document.getElementById('ddd'+campo);
  var tel = campoTel.value;
  var ddd = campoDDD.value;
  var m = ddd.match(/^[0-9]{2}$/);
  var n = "";
  if(m != null){
    if(ddd=='11')
      n = tel.match(/^[0-9]{8,9}$/);
    else
      n = tel.match(/^[0-9]{8}$/);
  }
  if(m != null && n != null){
    campoTel.parentNode.style.color = corDefault;
    return true;
  }
  campoTel.parentNode.style.color = corErro;
  return false;
}


function validaSelect(campo){
  var obj = document.getElementById(campo);
  var valor = obj.value;
  if(valor != 0){
    obj.parentNode.style.color = corDefault;
    return true;
  }
  obj.parentNode.style.color = corErro;
  return false;
}

function validaCamposAlternativosSF(campoA, campoB, preenchimento){
  if(validaCampoSF(campoA) && validaCampoSF(campoB))
    return true;
  else if(validaCampoSF(campoA)){
    document.getElementById(campoB).value = preenchimento;
    return true;
  }else if(validaCampoSF(campoB)){
    document.getElementById(campoA).value = preenchimento;
    return true;
  }
  return false;
}

function validaCamposAlternativosTiposDiferentes(campoA, campoB, padraoA, padraoB){
  if(validaCampoRegEx(campoA, padraoA) && validaCampoRegEx(campoB, padraoB)){
    return true;
  }else if(validaCampoRegEx(campoA, padraoA)){
    document.getElementById(campoB).parentNode.style.color = corDefault;
    return true;
  }else if(validaCampoRegEx(campoB, padraoB)){
    document.getElementById(campoA).parentNode.style.color = corDefault;
    return true;
  }
  return false;
}

function validaArea(area){
  var erros = 0;
  //Verificação dos dadosPessoais
  if(area=="dadosPessoais"){
    if(!validaCampoSF('nome')) erros++;
    if(!validaData('nascimento')) erros++;
    if(!validaCampoSF('mae')) erros++;
    if(!validaRG('rg')) erros++;
    if(!validaCPF('cpf')) erros++;
    if(!validaCelular('celular')) erros++;
    if(!validaCampoSF('endereco')) erros++;
    if(!validaCampoSF('num')) erros++;
    if(!validaCampoSF('bairro')) erros++;
    if(!validaCampoSF('cidade')) erros++;
    if(!validaCEP('cep')) erros++;
    if(!validaUF('ufend')) erros++;
    if(!validaSelect('moradia')) erros++;
    /*Ideia a Aplicar dps (para campos não obrigatórios)
    if(campoIsNulo('telfixo'))
      validaTelefone('telfixo')) erros++;
    */
    if(!validaCamposAlternativosSF('anores', 'mesres', 0)) erros++;
  }else if(area=="dadosPessoaisGarantidor"){
  }
  //Verificação dos dadosProfissionais
  else if(area=="dadosProfissionais"){
    if(!validaCampoSF('empresa')) erros++;
    //pensar sobre tempoEmprego
    if(!validaCamposAlternativosTiposDiferentes('tempoemprego', 'admissao',/^[^"']+$/,/^[0-9]{1,2}\/[0-9]{1,2}\/(([0-9]{2})|([0-9]{4}))$/)) erros++;    
    //Admissão-> validaData('admissao')) erros++;
    if(!validaCampoSF('enderecoemp')) erros++;
    if(!validaCampoSF('numemp')) erros++;
    if(!validaCampoSF('bairroemp')) erros++;
    if(!validaCampoSF('cidadeemp')) erros++;
    if(!validaCEP('cepemp')) erros++;
    if(!validaUF('ufemp')) erros++;
    if(!validaTelefone('telemp')) erros++;
    if(!validaCampoSF('funcao')) erros++;
    if(!validaDinheiro('rendab')) erros++;    
  }
  
  else if(area=="dadosProfissionaisGarantidor"){
  }
  //Verificação das Referencias
  else if(area=="referencias"){
    if(!validaCampoSF('ref1')) erros++;
    if(!validaCampoSF('ref2')) erros++;
    if(!validaCelular('telref1')) erros++;
    if(!validaCelular('telref2')) erros++;
  }
  //Verificação dos dadosGarantia
  else if(area=="dadosGarantia"){
    if(!validaCampoSF('marca')) erros++;
    if(!validaCampoSF('modelo')) erros++;
    if(!validaNumero('fabricacao',4)) erros++;
    if(!validaNumero('amodelo',4)) erros++;
    if(!validaCampoRegEx('placa', /^[a-zA-Z]{3}[0-9]{4}$/)) erros++;
    if(!validaNumero('renavam', 9)) erros++;
  }
  //verificação dos dados adicionais de lojista
  else if(area=="adicional"){
    if(!validaTelefone('telcontato')) erros++;
    if(!validaCampoSF('nomecontato')) erros++;    
    if(!validaCampoSF('cidadecontato')) erros++;        
  }
  
  if(erros==0)
    return true;
  alert("Campos com * são obrigatórios.\nEntre em contato conosco\n(51)3592-6775\ncontato@aquifinanciamentos.com");
  return false;
}

//Lista de validação



var corDefault = "#FFF";
//var corErro = "#F00";
var corErro = "#FF7F50";   //FF7F50
var sombraErro = "";//"-1px 0 #FFE4C4, 0 1px #FFE4C4, 1px 0 #FFE4C4, 0 -1px #FFE4C4";
var corBackgroundErro = "#FF4F00";

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function styleInvalidField(campo){
    document.getElementById(campo).parentNode.style.color = corErro;
    document.getElementById(campo).parentNode.style.textShadow = sombraErro;
    document.getElementById(campo).style.backgroundColor = corBackgroundErro;
}

function styleValidField(campo){
    document.getElementById(campo).parentNode.style.color = corDefault;
    document.getElementById(campo).parentNode.style.textShadow = 'none';
    document.getElementById(campo).style.backgroundColor = corDefault;
}

//Valida se o campo não é vazio
function campoIsNulo(campo) {
    var digitado = document.getElementById(campo).value;
    return digitado.length == 0;

}

//Valida se o campo segue uma RegEx
function validaCampoRegEx(campo, padrao) {
    var obj = document.getElementById(campo);
    if (obj.className == 'money'){
        var digitado = obj.value.split(".").join("");;
        digitado = digitado.replace(",",".");
    }
    else var digitado = obj.value;

    var n = digitado.match(padrao);
    if (n != null) {
        styleValidField(campo)
        return true;
    }
    styleInvalidField(campo);
    return false;
}


//valida campo sem formatação
function validaCampoSF(campo) {
    var retorno = validaCampoRegEx(campo, /^[^"']+$/);
    return retorno;
}

function validaNumero(campo, digitos) {
    if (digitos == 0) {
        styleValidField(campo)
        return validaCampoRegEx(campo, /^[0-9]{1,}[,\.]{0,1}[0-9]{0,}$/);
    }
    if (document.getElementById(campo).value.length != digitos) {
        styleInvalidField(campo)
        return false;
    }
    return validaCampoRegEx(campo, /^[0-9]+$/);
}

function validaData(campo) {
    var retorno = validaCampoRegEx(campo, /^[0-9]{1,2}\/[0-9]{1,2}\/(([0-9]{2})|([0-9]{4}))$/);
    return retorno;
}

function validaCPF(campo) {
    var retorno = validaCampoRegEx(campo, /^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/);
    return retorno;
}

function validaCEP(campo) {
    var retorno = validaCampoRegEx(campo, /^[0-9]{8}$/);
    return retorno;
}

function validaUF(campo) {
    var retorno = validaCampoRegEx(campo, /^[a-zA-Z]{2}$/);
    return retorno;
}

function validaRG(campo) {
    var retorno = validaCampoRegEx(campo, /^[0-9]{10}$/);
    //var retorno = document.getElementById(campo).value != "";
    return retorno;
}

function validaDinheiro(campo) {
    var retorno = validaCampoRegEx(campo, /^(R\$){0,1}( ){0,1}(([0-9]+\.[0-9]{2})|([0-9]+,[0-9]{2})|([0-9]+))$/);
    return retorno;
}

function validaAno(campo, digitos) {
    var retorno = false;
    if (digitos == -9999)
        retorno = validaCampoRegEx(campo, /^[0-9]+$/);
    else {
        retorno = validaCampoRegEx(campo, /^[0-9]+$/);
        if (document.getElementById(campo).value.length != digitos)
            return false;
    }
    return retorno;
}

function validaCelular(campo) {
    var campoTel = document.getElementById(campo);
    var campoDDD = document.getElementById('ddd' + campo);
    var tel = campoTel.value;
    var ddd = campoDDD.value;
    var m = ddd.match(/^[0-9]{2}$/);
    var n = "";
    if (m != null) {
        n = tel.match(/^[0-9]{8,10}$/)
    }
    if (m != null && n != null) {
        styleValidField(campo);
        return true;
    }
    styleInvalidField(campo);
    return false;
}

function validaTelefone(campo) {
    var campoTel = document.getElementById(campo);
    var campoDDD = document.getElementById('ddd' + campo);
    var tel = campoTel.value;
    var ddd = campoDDD.value;
    var m = ddd.match(/^[0-9]{2}$/);
    var n = "";
    if (m != null) {
        n = tel.match(/^[0-9]{8,10}$/)
    }
    if (m != null && n != null) {
        styleValidField(campo);
        return true;
    }
    styleInvalidField(campo);
    return false;
}


function validaSelect(campo) {
    var obj = document.getElementById(campo);
    var valor = obj.value;
    if (valor != 0) {
        styleValidField(campo);
        return true;
    }
    styleInvalidField(campo);
    return false;
}

function validaCamposAlternativosSF(campoA, campoB, preenchimento) {
    if (validaCampoSF(campoA) && validaCampoSF(campoB))
        return true;
    else if (validaCampoSF(campoA)) {
        document.getElementById(campoB).value = preenchimento;
        return true;
    } else if (validaCampoSF(campoB)) {
        document.getElementById(campoA).value = preenchimento;
        return true;
    }
    return false;
}

function validaCamposAlternativosTiposDiferentes(campoA, campoB, padraoA, padraoB) {
    if (validaCampoRegEx(campoA, padraoA) && validaCampoRegEx(campoB, padraoB)) {
        return true;
    } else if (validaCampoRegEx(campoA, padraoA)) {
        styleValidField(campoB);
        return true;
    } else if (validaCampoRegEx(campoB, padraoB)) {
        styleValidField(campoA);
        return true;
    }
    return false;
}

//
function validaAreaText(area) {
    var strMensagemCamposObrigatorios;
    strMensagemCamposObrigatorios = "";

    switch (area) {
        //Verificação dos dadosPessoais
        case "dadosPessoais":
            if (!validaCampoSF('nome')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Nome;"
            }
            if (!validaData('nascimento')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Nascimento;"
            }
            if (!validaCampoSF('mae')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Mãe;"
            }
            //if (!validaRG('rg')) {
                //strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ RG;"
            //}
            if (!validaCPF('cpf')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ CPF;"
            }
            if (!validaCelular('celular')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Celular;"
            }
            if (!validaCampoSF('endereco')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Endereço;"
            }
            if (!validaCampoSF('num')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Número;"
            }
            if (!validaCampoSF('bairro')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Bairro;"
            }
            if (!validaCampoSF('cidade')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Cidade;"
            }
            if (!validaCEP('cep')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ CEP;"
            }
            if (!validaUF('ufend')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ UF do Endereço;"
            }
            if (!validaSelect('moradia')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Moradia;"
            }
            //Ideia a Aplicar dps (para campos não obrigatórios)
            // if(campoIsNulo('telfixo'))
            // validaTelefone('telfixo'))
            //	strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ CAMPO;"

            if (!validaCamposAlternativosSF('anores', 'mesres', 0)) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Pessoais \\ Tempo de Residência;"
            }
            break;
        case "dadosPessoaisGarantidor":
            break;
        //Verificação dos dadosProfissionais
        case "dadosProfissionais":
            if (!validaCampoSF('empresa')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Empresa;"
            }
            //pensar sobre tempoEmprego
            if (!validaCamposAlternativosTiposDiferentes('tempoemprego', 'admissao', /^[^"']+$/, /^[0-9]{1,2}\/[0-9]{1,2}\/(([0-9]{2})|([0-9]{4}))$/)) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Admissão ou Tempo;"
            }
            if (!validaCampoSF('enderecoemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Endereço;"
            }
            if (!validaCampoSF('numemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Número;"
            }
            if (!validaCampoSF('bairroemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Bairro;"
            }
            if (!validaCampoSF('cidadeemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Cidade;"
            }
            if (!validaCEP('cepemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ CEP;"
            }
            if (!validaUF('ufemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ UF;"
            }
            if (!validaTelefone('telemp')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Telefone;"
            }
            if (!validaCampoSF('funcao')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Função;"
            }
            if (!validaDinheiro('rendab')) {

                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados Profissionais \\ Renda;"
            }
            break;
        case "dadosProfissionaisGarantidor":
            break;
        case "referencias":
            // Desativado conforme atividade 9:
            //    - Incluir Referências do Garantidor como campos não obrigatórios
            /*
            if (!validaCampoSF('ref1')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Referência Pessoal 1 \\ Nome;"
            }
            if (!validaCelular('telref1')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Referência Pessoal 1 \\ Telefone;"
            }
            if (!validaCampoSF('ref2')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Referência Pessoal 2 \\ Nome;"
            }
            if (!validaCelular('telref2')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Referência Pessoal 2 \\ Telefone;"
            }*/
            break;
        case "dadosGarantia":
            if (!validaCampoSF('marca')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados da Garantia \\ Marca;"
            }
            if (!validaCampoSF('modelo')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados da Garantia \\ Modelo;"
            }
            if (!validaNumero('fabricacao', 4)) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados da Garantia \\ Fabricação;"
            }
            if (!validaNumero('amodelo', 4)) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados da Garantia \\ Ano do modelo;"
            }
            //if (!validaCampoRegEx('placa', /^[a-zA-Z]{3}[0-9]{4}$/)) {
			//if (campoIsNulo('placa')) {
            //    strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados da Garantia \\ Placa;"
            //}
            //if (!validaNumero('renavam')) {
            //    strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Dados da Garantia \\ RENAVAM;"
            //}
            break;
        //verificação dos dados adicionais de lojista
        case "adicional":
            if (!validaTelefone('telcontato')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Informações Finais \\ Telefone para contato;"
            }
            if (!validaCampoSF('nomecontato')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Informações Finais \\ Nome para contato;"
            }
            if (!validaCampoSF('cidadecontato')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Informações Finais \\ Cidade-UF para contato;"
            }
            if (!validaCampoSF('emailcontato')) {
                strMensagemCamposObrigatorios = strMensagemCamposObrigatorios + "\n  Informações Finais \\ E-mail para contato;"
            }

            break;
    }
    if (strMensagemCamposObrigatorios != '') strMensagemCamposObrigatorios = '\n' + strMensagemCamposObrigatorios;
    return strMensagemCamposObrigatorios;
}
function validaArea(area) {
    var camposComErro = validaAreaText(area);
    if (camposComErro != "") {
        var mensagemErro = "Os campos abaixo não foram preenchidos e são obrigatórios:" +
                "\n" + camposComErro +
                "\n\nCaso hajam duvidas entre em contato: " +
                "\n    Telefones: (51) 3081-6555 / (51) 3592-6775 " +
                "\n    Whatsapp (51) 99513 0988 " +
                "\n    E-mail: portocred.sl@hotmail.com;";
        alert(mensagemErro);
        return false
    } else return true;
}

//Lista de validação


function automovelNovo() {
    document.getElementById('placa').value = "ZER0000";
    document.getElementById('renavam').value = "000000000";
    autoNovo = true;
}

function automovelUsado() {
    if (autoNovo) {
        document.getElementById('placa').value = "";
        document.getElementById('renavam').value = "";
    }
    autoNovo = false;
}
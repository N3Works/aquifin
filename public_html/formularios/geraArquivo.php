<?php
//inicio Primeira Pagina
date_default_timezone_set('America/Sao_Paulo');
$conteudo = '<!DOCTYPE html>
             <html>
             <head>
                <style>*{margin:0;padding:0;text-transform:uppercase;font-family:Arial, Helvetica, sans-serif;}
                    P.breakpoint { page-break-before: always; }
                    .corpo{padding:5px;margin:5px;}
                    th{padding:7px 0; font-size:150%}
                    span{float:right;margin-right:5px;}
                    table.sem{margin:0 auto; page-break-after:auto }
                    table.sem td{border:0;padding-left:5px}
                    img { page-break-inside:avoid; page-break-before:auto }
                </style>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$conteudo .= " <title>$nome - $nascimento - $agora</title><script>";
$conteudo .= ' function imprime(){document.getElementById("impr").innerHTML="";window.print();document.getElementById("impr").innerHTML="<input id=\"imprimir\" style=\"padding:5px 0;width:100%; font-weight:bold;background:#6AABD6; color:white;\" type=\"button\" value=\"Imprimir\" onclick=\"imprime()\">"}</script></head><body><table border="1" width="1000"><tr><td colspan="40" style="border:0; text-align:center"><div id="impr"><input id="imprimir" style="padding:5px 0;width:100%; font-weight:bold;background:#6AABD6; color:white;" type="button" value="Imprimir" onclick="imprime()" /></div></td></tr><tr>';
$conteudo .= " <td colspan='10'>DATA $today</td><td colspan='20'><table class='sem'><tr><td><input type='checkbox' />FINANCIAMENTO</td><td><input type='checkbox' />EMPRESTIMO COM GARANTIA</td><td><input type='checkbox' />SERVIÇO</td></tr></table></td><td colspan='10'><table class='sem'><tr><td><input type='checkbox' />PROPONENTE</td><td><input type='checkbox' />COOBRIGADO</td></tr></table></td></tr><tr><td colspan='12'>REVENDA/LOJA<br /><span>$lojacontato</span></td><td colspan='7'>FONE<br /><span>($dddtelcontato)$telcontato</span></td><td colspan='7'>VENDEDOR/CONTATO<br /><span>$nomecontato</span></td><td colspan='7'>E-MAIL<br /><span>$emailcontato</span></td><td colspan='7'>CIDADE<br /><span>$cidadecontato</span></td></tr>";

//Dados Pessoais
$conteudo .= "<tr><th colspan='40'>DADOS PESSOAIS</th></tr><tr><td colspan='31'>NOME DO FINANCIADO<br /><span>$nome</span></td><td colspan='9'>DATA.NASC.<br /><span>$nascimento</span></td></tr><tr><td colspan='8'>GRAU DE INSTRUÇÃO<br /><span>$instrucao</span></td><td colspan='6'>SEXO<table class='sem'><tr>
<td><input type='checkbox' $sexoM />M</td><td><input type='checkbox' $sexoF />F</td></tr></table></td><td colspan='8'>NATURAL DE<br /><span>$natural</span></td><td colspan='2'>UF<br /><span>$uf</span></td><td colspan='8'>ESTADO CIVIL<br /><span>$estadocivil</span></td><td colspan='8'>Nº DE DEPENDENTES<br /><span>$dependentes</span></td></tr><tr><td colspan='20'>MÃE<br /><span>$mae</span></td><td colspan='20'>PAI<br /><span>$pai</span></td></tr><tr><td colspan='16'>Nº DOC. IDENTIDADE<br /><span>$rg</span></td><td colspan='6'>EMISSÃO<br /><span>$emissao</span></td><td colspan='6'>ORG.EMISSOR<br /><span>$emissor</span></td><td colspan='12'>CPF<br /><span>$cpf</span></td></tr><tr><td colspan='14'>CNH<br /><span>$cnh</span></td><td colspan='4'>CATEGORIA<br /><span>$catcnh</span></td><td colspan='10'>FONE RESIDENCIAL<br /><span>($dddtelfixo)$telfixo</span></td><td colspan='12'>FONE CELULAR<br /><span>($dddcelular)$celular</span></td></tr><tr><td colspan='17'>ENDEREÇO<br /><span>$endereco</span></td><td colspan='4'>Nº<br /><span>$num</span></td><td colspan='6'>COMPLEMENTO<br /><span>$complemento</span></td><td colspan='13'>BAIRRO<br /><span>$bairro</span></td></tr><tr><td colspan='12'>CIDADE<br /><span>$cidade</span></td><td colspan='7'>CEP<br /><span>$cep</span></td><td colspan='3'>UF<br /><span>$ufend</span></td><td colspan='10'>MORADIA<table class='sem'><tr><td><input type='checkbox' $moradiaA />PRÓPRIA</td><td><input type='checkbox' $moradiaB />ALUGADA</td><td><input type='checkbox' $moradiaC />OUTRA</td>'</tr></table></td><td colspan='8'>TEMPO RES.<br /><span>$anores ano(s) e $mesres mês/meses</span></td></tr>";

//Dados Profissionais
$conteudo .= "<tr><th colspan='40'>DADOS PROFISSIONAIS</th></tr><tr><td colspan='10'>EMPRESA<br /><span>$empresa</span></td><td colspan='10'>ADMISSÃO<br /><span>$admissao</span></td><td colspan='10'>TEMPO<br /><span>$tempoemprego</span></td><td colspan='10'>SE PROPIETÁRIO CNPJ<br /><span>$cnpj</span></td></tr><tr><td colspan='10'>RUA<br /><span>$enderecoemp</span></td><td colspan='10'>Nº<br /><span>$numemp</span></td><td colspan='10'>COMPLEMENTO<br /><span>$complementoemp</span></td><td colspan='10'>BAIRRO<br /><span>$bairroemp</span></td></tr><tr><td colspan='10'>CIDADE<br /><span>$cidadeemp</span></td><td colspan='10'>CEP<br /><span>$cepemp</span></td><td colspan='10'>UF<br /><span>$ufemp</span></td><td colspan='10'>FONE COMERCIAL<br /><span>($dddtelemp)$telemp</span></td></tr><tr><td colspan='10'>PROFISSÃO<br /><span>$profissao</span></td><td colspan='10'>FUNÇÃO<br /><span>$funcao</span></td><td colspan='10'>RENDA BRUTA<br /><span>$rendab</span></td><td colspan='10'>RENDA LÍQUIDA<br /><span>$rendal</span></td></tr>";

//Referências
$htmlReferenciasFinanciado = "";

if (isset($_POST["ref1"]) && ($ref1 != '') ) {
    $htmlReferenciasFinanciado .= "<tr>
                                        <td colspan='14'>PESSOAL - NOME<br /><span>$ref1</span></td><td colspan='13'>GRAU DE RELACIONAMENTO<br /><span>$grauref1</span></td>
                                        <td colspan='13'>FONE<br /><span>($dddtelref1)$telref1</span></td>
                                   </tr>";
}
if (isset($_POST["ref2"]) && ($ref2 != '')) {
    $htmlReferenciasFinanciado .= "<tr>
                                        <td colspan='14'>PESSOAL - NOME<br /><span>$ref2</span></td><td colspan='13'>GRAU DE RELACIONAMENTO<br /><span>$grauref2</span></td>
                                        <td colspan='13'>FONE<br /><span>($dddtelref2)$telref2</span></td>
                                   </tr>";
}
if (isset($_POST["ref3"])&& ($ref3 != '')) {
    $htmlReferenciasFinanciado .= "<tr>
                                        <td colspan='14'>PESSOAL - NOME<br /><span>$ref3</span></td><td colspan='13'>GRAU DE RELACIONAMENTO<br /><span>$grauref3</span></td>
                                        <td colspan='13'>FONE<br /><span>($dddtelref3)$telref3</span></td>
                                   </tr>";
}

if ($htmlReferenciasFinanciado != ""){
    $htmlReferenciasFinanciado = "<tr><th colspan='40'>REFERÊNCIAS DO FINANCIADO</th></tr>" . $htmlReferenciasFinanciado;
    $conteudo .= $htmlReferenciasFinanciado;
}

//Dados da Garantia
$conteudo .= "<tr><th colspan='40'>DADOS DA GARANTIA</th></tr><tr><td colspan='9'>MARCA<br /><span>$marca</span></td><td colspan='9'>MODELO<br /><span>$modelo</span></td><td colspan='7'>ANO FABRICAÇÃO<br /><span>$fabricacao</span></td><td colspan='7'>ANO MODELO<br /><span>$amodelo</span></td><td colspan='8'>PLACA<br /><span>$placa</span></td></tr><tr><td colspan='10'>CHASSI<br /><span>$chassi</span></td><td colspan='10'>RENAVAM<br /><span>$renavam</span></td><td colspan='10'>COR<br /><span>$cor</span></td><td colspan='10'>COMBUSTÍVEL<br /><span>$combustivel</span></td></tr><tr><td colspan='20'><table class='sem'><tr><td><input type='checkbox' $tipoA />AUTOMÓVEL</td><td><input type='checkbox' $tipoB />MOTO</td><td><input type='checkbox' $tipoC />CAMINHÃO</td></tr></table></td><td colspan='20'><table class='sem'><tr><td><input type='checkbox' $condicaoA />NOVO</td><td><input type='checkbox' $condicaoB />USADO</td></tr></table></td></tr>";

//Dados da Operação
$conteudo .= "<tr><th colspan='40'>DADOS DA OPERAÇÃO</th></tr>
              <tr><td colspan='8'>TABELA<br /><span>$tabela</span></td><td colspan='8'>TC<br /><span>$tc_utilizado</span></td><td colspan='8'>COEFICIENTE<br /><span>$coeficienteop</span></td>  <td colspan='8'>PRAZO<br /><span>$parcelasop</span></td><td colspan='8'>ÍNDICE<br /><span>$indice</span></td></tr>
              <tr><td colspan='8'>VALOR FINANCIADO<br /><span>$valorop</span></td><td colspan='8'>PARCELA<br /><span>$parcelaop</span></td><td colspan='8'>1º VECTO.<br />*</td><td colspan='8'>VALOR VENDA<br />*</td><td colspan='8'>VALOR COTAÇÃO<br />*</td></tr>
              <tr><td colspan='40' style='height:auto; padding-bottom: 50px; vertical-align:top; horiz-align: left;'>Observações:<br /><span>$obs</span></td></tr>";

//Final primeira página
$conteudo .= '<tr style="opacity:0;  visibility: hidden; font-size:2px;"">
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>

        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>

        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>

        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
      </tr>
    </table>';


if (($nomeconj != "---") && ($nomeconj != "") && (isset($nomeconj))) {
//Garantidor
    $conteudo .= "<p class='breakpoint'> </p>";
    $conteudo .= "<img src='http://www.aquifinanciamentos.com.br/2/logo.png' style='height:120px page-break-inside:avoid; page-break-before:always' /><table border='1' width='1000'><tr><th colspan='40'>Financiado: $nome</th></tr><tr>";

//Dados Pessoais - Garantidor
    $conteudo .= "<tr><th colspan='40'>DADOS PESSOAIS - GARANTIDOR</th></tr><tr><td colspan='31'>NOME DO FINANCIADO<br /><span>$nomeconj</span></td><td colspan='9'>DATA.NASC.<br /><span>$nascimentoconj</span></td></tr><tr><td colspan='8'>GRAU DE INSTRUÇÃO<br /><span>$instrucaoconj</span></td><td colspan='6'>SEXO<table class='sem'><tr>
<td><input type='checkbox' $sexoconjM />M</td><td><input type='checkbox' $sexoconjF />F</td></tr></table></td><td colspan='8'>NATURAL DE<br /><span>$naturalconj</span></td><td colspan='2'>UF<br /><span>$ufconj</span></td><td colspan='8'>ESTADO CIVIL<br /><span>$estadocivilconj</span></td><td colspan='8'>Nº DE DEPENDENTES<br /><span>$dependentesconj</span></td></tr><tr><td colspan='20'>MÃE<br /><span>$maeconj</span></td><td colspan='20'>PAI<br /><span>$paiconj</span></td></tr><tr><td colspan='16'>Nº DOC. IDENTIDADE<br /><span>$rgconj</span></td><td colspan='6'>EMISSÃO<br /><span>$emissaoconj</span></td><td colspan='6'>ORG.EMISSOR<br /><span>$emissorconj</span></td><td colspan='12'>CPF<br /><span>$cpfconj</span></td></tr><tr><td colspan='14'>CNH<br /><span>$cnhconj</span></td><td colspan='4'>CATEGORIA<br /><span>$catcnhconj</span></td><td colspan='10'>FONE RESIDENCIAL<br /><span>($dddtelfixoconj)$telfixoconj</span></td><td colspan='12'>FONE CELULAR<br /><span>($dddcelularconj)$celularconj</span></td></tr><tr><td colspan='17'>ENDEREÇO<br /><span>$enderecoconj</span></td><td colspan='4'>Nº<br /><span>$numconj</span></td><td colspan='6'>COMPLEMENTO<br /><span>$complementoconj</span></td><td colspan='13'>BAIRRO<br /><span>$bairroconj</span></td></tr><tr><td colspan='12'>CIDADE<br /><span>$cidadeconj</span></td><td colspan='7'>CEP<br /><span>$cepconj</span></td><td colspan='3'>UF<br /><span>$ufconj</span></td><td colspan='10'>MORADIA<table class='sem'><tr><td><input type='checkbox' $moradiaconjA />PRÓPRIA</td><td><input type='checkbox' $moradiaconjB />ALUGADA</td><td><input type='checkbox' $moradiaconjC />OUTRA</td>'</tr></table></td><td colspan='8'>TEMPO RES.<br /><span>$anoresconj ano(s) e $mesresconj mês/meses</span></td></tr>";


//Dados Profissionais
    $conteudo .= "<tr><th colspan='40'>DADOS PROFISSIONAIS - GARANTIDOR</th></tr><tr><td colspan='10'>EMPRESA<br /><span>$empresaconj</span></td><td colspan='10'>ADMISSÃO<br /><span>$admissaoconj</span></td><td colspan='10'>TEMPO<br /><span>$tempoempregoconj</span></td><td colspan='10'>SE PROPIETÁRIO CNPJ<br /><span>$cnpjconj</span></td></tr><tr><td colspan='10'>RUA<br /><span>$enderecoempconj</span></td><td colspan='10'>Nº<br /><span>$numempconj</span></td><td colspan='10'>COMPLEMENTO<br /><span>$complementoempconj</span></td><td colspan='10'>BAIRRO<br /><span>$bairroempconj</span></td></tr><tr><td colspan='10'>CIDADE<br /><span>$cidadeempconj</span></td><td colspan='10'>CEP<br /><span>$cepempconj</span></td><td colspan='10'>UF<br /><span>$ufempconj</span></td><td colspan='10'>FONE COMERCIAL<br /><span>($dddtelempconj)$telempconj</span></td></tr><tr><td colspan='10'>PROFISSÃO<br /><span>$profissaoconj</span></td><td colspan='10'>FUNÇÃO<br /><span>$funcaoconj</span></td><td colspan='10'>RENDA BRUTA<br /><span>$rendabconj</span></td><td colspan='10'>RENDA LÍQUIDA<br /><span>$rendalconj</span></td></tr>";

//Referências do garantidor
    $htmlReferenciasGarantidor = "";

    if (isset($_POST["refGarantidorNome1"]) && ($refGarantidorNome1 != '')) {
        $htmlReferenciasGarantidor .= "<tr>
                                            <td colspan='14'>PESSOAL - NOME<br /><span>$refGarantidorNome1</span></td>
                                            <td colspan='13'>GRAU DE RELACIONAMENTO<br /><span>$refGarantidorGrauRelacionamento1</span></td>
                                            <td colspan='13'>FONE<br /><span>($refGarantidorDDD1)$refGarantidorTelefone1</span></td>
                                        </tr>";
    }
    if (isset($_POST["refGarantidorNome2"]) && ($refGarantidorNome2 != '')) {
        $htmlReferenciasGarantidor .= "<tr>
                                            <td colspan='14'>PESSOAL - NOME<br /><span>$refGarantidorNome2</span></td>
                                            <td colspan='13'>GRAU DE RELACIONAMENTO<br /><span>$refGarantidorGrauRelacionamento2</span></td>
                                            <td colspan='13'>FONE<br /><span>($refGarantidorDDD2)$refGarantidorTelefone2</span></td>
                                       </tr>";
    }
    if (isset($_POST["refGarantidorNome3"])&& ($refGarantidorNome3 != '')) {
        $htmlReferenciasGarantidor .= "<tr>
                                            <td colspan='14'>PESSOAL - NOME<br /><span>$refGarantidorNome3</span></td>
                                            <td colspan='13'>GRAU DE RELACIONAMENTO<br /><span>$refGarantidorGrauRelacionamento3</span></td>
                                            <td colspan='13'>FONE<br /><span>($refGarantidorDDD3)$refGarantidorTelefone3</span></td>
                                        </tr>";
    }

    if ($htmlReferenciasGarantidor != ""){
        $htmlReferenciasGarantidor = "<tr><th colspan='40'>REFERÊNCIAS DO GARANTIDOR</th></tr>" . $htmlReferenciasGarantidor;
        $conteudo .= $htmlReferenciasGarantidor;
    }

//Final segunda página
    $conteudo .= '<tr style="opacity:0;  visibility: hidden; font-size:2px;">
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>

        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>

        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>

        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
        <td style="opacity:0;  visibility: hidden; width:25px">a</td>  <td style="opacity:0;  visibility: hidden; width:25px">a</td>
      </tr>
    </table>';
}

$conteudo .= '  </body>
              </html>';


$hoje = date("d-m-Y - H-i-s");
$my_file = 'propostas/' .$nome . ' - ' . $hoje . '.html';
$handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file);
$data = $conteudo;
fwrite($handle, $data);

?>

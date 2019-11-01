<?php
include "../Conexao.php";

$telefoneSalvar = '';
if ($dddtelfixo && $telfixo) {
    $telfixo = substr_replace($telfixo, '-', (count($telfixo) == 9 ? 6 : 5), 0 );
    $telefone = '(' . $dddtelfixo . ') '. $telfixo;
}

$celularSalvar = '';
if ($dddcelular && $celular) {
    $celular = substr_replace($celular, '-', (count($celular) == 9 ? 6 : 5), 0 );
    $celularSalvar = '(' . $dddcelular . ') '. $celular;
}

$telefoneEmpSalvar = '';
if ($dddtelemp && $telemp) {
    $telemp = substr_replace($telemp, '-', (count($telemp) == 9 ? 6 : 5), 0 );
    $telefoneEmpSalvar = '(' . $dddcelular . ') '. $telemp;
}

$telRefSalvar1 = '';
if ($dddtelref1 && $telref1) {
    $telref1 = substr_replace($telref1, '-', (count($telref1) == 9 ? 6 : 5), 0 );
    $telRefSalvar1 = '(' . $dddtelref1 . ') '. $telref1;
}
$telRefSalvar2 = '';
if ($dddtelref2 && $telref2) {
    $telref2 = substr_replace($telref2, '-', (count($telref2) == 9 ? 6 : 5), 0 );
    $telRefSalvar2 = '(' . $dddtelref2 . ') '. $telref2;
}
$telRefSalvar3 = '';
if ($dddtelref3 && $telref3) {
    $telref3 = substr_replace($telref3, '-', (count($telref3) == 9 ? 6 : 5), 0 );
    $telRefSalvar3 = '(' . $dddtelref3 . ') '. $telref3;
}

$telConjFixoSalvar = '';
if ($dddtelfixoconj && $telfixoconj) {
    $telfixoconj = substr_replace($telfixoconj, '-', (count($telfixoconj) == 9 ? 6 : 5), 0 );
    $telConjFixoSalvar = '(' . $dddtelfixoconj . ') '. $telfixoconj;
}

$telConjCelularSalvar = '';
if ($dddcelularconj && $celularconj) {
    $celularconj = substr_replace($celularconj, '-', (count($celularconj) == 9 ? 6 : 5), 0 );
    $telConjCelularSalvar = '(' . $dddcelularconj . ') '. $celularconj;
}

$telConjEmpSalvar = '';
if ($dddtelempconj && $telempconj) {
    $telempconj = substr_replace($telempconj, '-', (count($telempconj) == 9 ? 6 : 5), 0 );
    $telConjEmpSalvar = '(' . $dddtelempconj . ') '. $telempconj;
}

$refGarantidorTelSalvar1 = '';
if ($refGarantidorDDD1 && $refGarantidorTelefone1) {
    $refGarantidorTelefone1 = substr_replace($refGarantidorTelefone1, '-', (count($refGarantidorTelefone1) == 9 ? 6 : 5), 0 );
    $refGarantidorTelSalvar1 = '(' . $refGarantidorDDD1 . ') '. $refGarantidorTelefone1;
}
$refGarantidorTelSalvar2 = '';
if ($refGarantidorDDD2 && $refGarantidorTelefone2) {
    $refGarantidorTelefone2 = substr_replace($refGarantidorTelefone2, '-', (count($refGarantidorTelefone2) == 9 ? 6 : 5), 0 );
    $refGarantidorTelSalvar2 = '(' . $refGarantidorDDD2 . ') '. $refGarantidorTelefone2;
}
$refGarantidorTelSalvar3 = '';
if ($refGarantidorDDD3 && $refGarantidorTelefone3) {
    $refGarantidorTelefone3 = substr_replace($refGarantidorTelefone3, '-', (count($refGarantidorTelefone3) == 9 ? 6 : 5), 0 );
    $refGarantidorTelSalvar3 = '(' . $refGarantidorDDD3 . ') '. $refGarantidorTelefone3;
}

$telContatoSalvar = '';
if ($dddtelcontato && $telcontato) {
    $telcontato = substr_replace($telcontato, '-', (count($telcontato) == 9 ? 6 : 5), 0 );
    $telContatoSalvar = '(' . $dddtelcontato . ') '. $telcontato;
}

$dataAtual = date('Y-m-d');

$c = new mysqli('216.172.172.44','aquifi88_aquifin','CharlottE93','aquifi88_aquifinanciame');

$sql = "INSERT INTO ficha_cadastral (
  `situacao`, 
  `data_cadastro`,
  
  `dados_pessoais_nome`,
  `dados_pessoais_nascimento`,
  `dados_pessoais_sexo`,
  `dados_pessoais_instrucao`,
  `dados_pessoais_natural`,
  `dados_pessoais_uf`,
  `dados_pessoais_estadocivil`,
  `dados_pessoais_dependentes`,
  `dados_pessoais_mae`,
  `dados_pessoais_pai`,
  `dados_pessoais_rg`,
  `dados_pessoais_emissao`,
  `dados_pessoais_emissor`,
  `dados_pessoais_cpf`,
  `dados_pessoais_cnh`,
  `dados_pessoais_catcnh`,
  `dados_pessoais_telefone`,
  `dados_pessoais_celular`,
  `dados_pessoais_cep`,
  `dados_pessoais_endereco`,
  `dados_pessoais_num`,
  `dados_pessoais_complemento`,
  `dados_pessoais_bairro`,
  `dados_pessoais_cidade`,
  `dados_pessoais_ufend`,
  `dados_pessoais_moradia`,
  `dados_pessoais_anores`,
  `dados_pessoais_mesres`,
  
  `dados_profissionais_empresa`,
  `dados_profissionais_admissao`,
  `dados_profissionais_tempoemprego`,
  `dados_profissionais_cnpj`,
  `dados_profissionais_cepemp`,
  `dados_profissionais_enderecoemp`,
  `dados_profissionais_numemp`,
  `dados_profissionais_complementoemp`,
  `dados_profissionais_bairroemp`,
  `dados_profissionais_cidadeemp`,
  `dados_profissionais_ufemp`,
  `dados_profissionais_telefone`,
  `dados_profissionais_profissao`,
  `dados_profissionais_funcao`,
  `dados_profissionais_rendab`,
  `dados_profissionais_rendal`,
  
  `referencias_ref1`,
  `referencias_telefone1`,
  `referencias_grauref1`,
  `referencias_ref2`,
  `referencias_telefone2`,
  `referencias_grauref2`,
  `referencias_ref3`,
  `referencias_telefone3`,
  `referencias_grauref3`,
  
  `dados_pess_garan_nomeconj`,
  `dados_pess_garan_nascimentoconj`,
  `dados_pess_garan_sexoconj`,
  `dados_pess_garan_instrucaoconj`,
  `dados_pess_garan_naturalconj`,
  `dados_pess_garan_ufconj`,
  `dados_pess_garan_estadocivilconj`,
  `dados_pess_garan_dependentesconj`,
  `dados_pess_garan_maeconj`,
  `dados_pess_garan_paiconj`,
  `dados_pess_garan_rgconj`,
  `dados_pess_garan_emissaoconj`,
  `dados_pess_garan_emissorconj`,
  `dados_pess_garan_cpfconj`,
  `dados_pess_garan_cnhconj`,
  `dados_pess_garan_catcnhconj`,
  `dados_pess_garan_telefone`,
  `dados_pess_garan_celular`,
  `dados_pess_garan_cepconj`,
  `dados_pess_garan_enderecoconj`,
  `dados_pess_garan_numconj`,
  `dados_pess_garan_complementoconj`,
  `dados_pess_garan_bairroconj`,
  `dados_pess_garan_cidadeconj`,
  `dados_pess_garan_ufendconj`,
  `dados_pess_garan_moradiaconj`,
  `dados_pess_garan_anoresconj`,
  `dados_pess_garan_mesresconj`,
  
  `dados_prof_garan_empresaconj`,
  `dados_prof_garan_admissaoconj`,
  `dados_prof_garan_tempoempregoconj`,
  `dados_prof_garan_cnpjconj`,
  `dados_prof_garan_cepempconj`,
  `dados_prof_garan_enderecoempconj`,
  `dados_prof_garan_numempconj`,
  `dados_prof_garan_complementoempconj`,
  `dados_prof_garan_bairroempconj`,
  `dados_prof_garan_cidadeempconj`,
  `dados_prof_garan_ufempconj`,
  `dados_prof_garan_telefone`,
  `dados_prof_garan_profissaoconj`,
  `dados_prof_garan_funcaoconj`,
  `dados_prof_garan_rendabconj`,
  `dados_prof_garan_rendalconj`,
  
  `ref_garan_refGarantidorNome1`,
  `ref_garan_telefone1`,
  `ref_garan_refGarantidorGrauRelacionamento1`,
  `ref_garan_refGarantidorNome2`,
  `ref_garan_telefone2`,
  `ref_garan_refGarantidorGrauRelacionamento2`,
  `ref_garan_refGarantidorNome3`,
  `ref_garan_telefone3`,
  `ref_garan_refGarantidorGrauRelacionamento3`,
  
  `dados_garantia_marca`,
  `dados_garantia_modelo`,
  `dados_garantia_fabricacao`,
  `dados_garantia_amodelo`,
  `dados_garantia_placa`,
  `dados_garantia_chassi`,
  `dados_garantia_renavam`,
  `dados_garantia_cor`,
  `dados_garantia_combustivel`,
  `dados_garantia_tipo`,
  `dados_garantia_condicao`,
  
  `info_finais_telefone`,
  `info_finais_nomecontato`,
  `info_finais_lojacontato`,
  `info_finais_cidadecontato`,
  `info_finais_emailcontato`,
  `info_finais_observacoes`,
  `nome_arquivo_proposta`
  ) VALUES (
  2,
  '$dataAtual',
  '$nome',
  '$nascimento',
  '$sexo',
  '$instrucao',
  '$natural',
  '$uf',
  '$estadocivil',
  '$dependentes',
  '$mae',
  '$pai',
  '$rg',
  '$emissao',
  '$emissor',
  '$cpf',
  '$cnh',
  '$catcnh',
  '$telefoneSalvar',
  '$celularSalvar',
  '$cep',
  '$endereco',
  '$num',
  '$complemento',
  '$bairro',
  '$cidade',
  '$ufend',
  '$moradia',
  '$anores',
  '$mesres',
  
  '$empresa',
  '$admissao',
  '$tempoemprego',
  '$cnpj',
  '$cepemp',
  '$enderecoemp',
  '$numemp',
  '$complementoemp',
  '$bairroemp',
  '$cidadeemp',
  '$ufemp',
  '$telefoneEmpSalvar',
  '$profissao',
  '$funcao',
  '$rendab',
  '$rendal',
  
  '$ref1',
  '$telRefSalvar1',
  '$grauref1',
  '$ref2',
  '$telRefSalvar2',
  '$grauref2',
  '$ref3',
  '$telRefSalvar3',
  '$grauref3',
  
  '$nomeconj',
  '$nascimentoconj',
  '$sexoconj',
  '$instrucaoconj',
  '$naturalconj',
  '$ufconj',
  '$estadocivilconj',
  '$dependentesconj',
  '$maeconj',
  '$paiconj',
  '$rgconj',
  '$emissaoconj',
  '$emissorconj',
  '$cpfconj',
  '$cnhconj',
  '$catcnhconj',
  '$telConjFixoSalvar',
  '$telConjCelularSalvar',
  '$cepconj',
  '$enderecoconj',
  '$numconj',
  '$complementoconj',
  '$bairroconj',
  '$cidadeconj',
  '$ufendconj',
  '$moradiaconj',
  '$anoresconj',
  '$mesresconj',
  
  '$empresaconj',
  '$admissaoconj',
  '$tempoempregoconj',
  '$cnpjconj',
  '$cepempconj',
  '$enderecoempconj',
  '$numempconj',
  '$complementoempconj',
  '$bairroempconj',
  '$cidadeempconj',
  '$ufempconj',
  '$telConjEmpSalvar',
  '$profissaoconj',
  '$funcaoconj',
  '$rendabconj',
  '$rendalconj',
  
  '$refGarantidorNome1',
  '$refGarantidorTelSalvar1',
  '$refGarantidorGrauRelacionamento1',
  '$refGarantidorNome2',
  '$refGarantidorTelSalvar2',
  '$refGarantidorGrauRelacionamento2',
  '$refGarantidorNome3',
  '$refGarantidorTelSalvar3',
  '$refGarantidorGrauRelacionamento3',
  
  '$marca',
  '$modelo',
  '$fabricacao',
  '$amodelo',
  '$placa',
  '$chassi',
  '$renavam',
  '$cor',
  '$combustivel',
  '$tipo',
  '$condicao',
  
  '$telContatoSalvar',
  '$nomecontato',
  '$lojacontato',
  '$cidadecontato',
  '$emailcontato',
  '$obs',
  '$nome_arquivo_proposta')";

if ($c->query($sql) === TRUE) {
    echo "Cadastro efetuado com sucesso!";
} else {
    echo "Error:<br>" . $c->error;
}

$c->close();
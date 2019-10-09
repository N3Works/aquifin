<?php
//dadosPessoais
$nome = '---';
$nascimento = '---';
$nascimentod = '---';
$sexo = '---';
$instrucao = '---';
$natural = '---';
$uf = '---';
$estadocivil = '---';
$dependentes = '---';
$mae = '---';
$pai = '---';
$rg = '---';
$emissao = '---';
$emissaod = '---';
$emissor = '---';
$cpf = '---';
$cnh = '---';
$catcnh = '---';
$dddtelfixo = '---';
$telfixo = '---';
$dddcelular = '---';
$celular = '---';
$endereco = '---';
$num = '---';
$complemento = '---';
$bairro = '---';
$cidade = '---';
$cep = '---';
$ufend = '---';
$moradia = '---';
$anores = '---';
$mesres = '---';

//dadosProfissionais
$empresa = '---';
$admissao = '---';
$admissaod = '---';
$tempoemprego = '---';
$cnpj = '---';
$enderecoemp = '---';
$numemp = '---';
$complementoemp = '---';
$bairroemp = '---';
$cidadeemp = '---';
$cepemp = '---';
$ufemp = '---';
$dddtelemp = '---';
$telemp = '---';
$profissao = '---';
$funcao = '---';
$rendab = '---';
$rendal = '---';

//referencias
$ref1 = '---';
$grauref1 = '---';
$dddtelref1 = '---';
$telref1 = '---';
$ref2 = '---';
$grauref2 = '---';
$dddtelref2 = '---';
$telref2 = '---';
$ref3 = '---';
$grauref3 = '---';
$dddtelref3 = '---';
$telref3 = '---';

//dadosPessoaisGarantidor
$nomeconj = '---';
$nascimentoconj = '---';
$nascimentodconj = '---';
$sexoconj = '---';
$instrucaoconj = '---';
$naturalconj = '---';
$ufconj = '---';
$estadocivilconj = '---';
$dependentesconj = '---';
$maeconj = '---';
$paiconj = '---';
$rgconj = '---';
$emissaoconj = '---';
$emissaodconj = '---';
$emissorconj = '---';
$cpfconj = '---';
$cnhconj = '---';
$catcnhconj = '---';
$dddtelfixoconj = '---';
$telfixoconj = '---';
$dddcelularconj = '---';
$celularconj = '---';
$enderecoconj = '---';
$numconj = '---';
$complementoconj = '---';
$bairroconj = '---';
$cidadeconj = '---';
$cepconj = '---';
$ufendconj = '---';
$moradiaconj = '---';
$anoresconj = '---';
$mesresconj = '---';

//referências do garantidor
//Garantidor 1
$refGarantidorNome1 = '---';
$refGarantidorDDD1 = '---';
$refGarantidorTelefone1 = '---';
$refGarantidorGrauRelacionamento1 = '---';
//Garantidor 2
$refGarantidorNome2 = '---';
$refGarantidorDDD2 = '---';
$refGarantidorTelefone2 = '---';
$refGarantidorGrauRelacionamento2 = '---';
//Garantidor 3
$refGarantidorNome3 = '---';
$refGarantidorDDD3 = '---';
$refGarantidorTelefone3 = '---';
$refGarantidorGrauRelacionamento3 = '---';


//dadosProfissionaisGarantidor
$empresaconj = '---';
$admissaoconj = '---';
$admissaodconj = '---';
$tempoempregoconj = '---';
$cnpjconj = '---';
$enderecoempconj = '---';
$numempconj = '---';
$complementoempconj = '---';
$bairroempconj = '---';
$cidadeempconj = '---';
$cepempconj = '---';
$ufempconj = '---';
$dddtelempconj = '---';
$telempconj = '---';
$profissaoconj = '---';
$funcaoconj = '---';
$rendabconj = '---';
$rendalconj = '---';



//dadosGarantia
$marca = '---';
$modelo = '---';
$fabricacao = '---';
$amodelo = '---';
$placa = '---';
$chassi = '---';
$renavam = '---';
$cor = '---';
$combustivel = '---';
$tipo = '---';
$condicao = '---';

//adicional
$nomecontato = '---';
$dddtelcontato = '---';
$telcontato = '---';
$lojacontato = '---';
$emailcontato = '---';
$cidadecontato = '---';

//outros
$cepok = 0;
$cepempok = 0;
$cepconjok = 0;
$cepempconjok = 0;

$tabela = '---';
$tc = '---';
$tc_alternativo = '-';
$tc_utilizado = '--';

$valorop = '---';
$coeficienteop = '---';
$parcelasop = '---';
$indice = '---';
$parcelaop = '---';
$anoop = 0;
$cliente = -1;
$simu = -1;
$tratar = 0;

date_default_timezone_set('America/Sao_Paulo');

$agora =  date('d/m/Y H:i:s');
//dadosPessoais
if (isset($_POST['nome']) ) {
    $nome = $_POST['nome'];
}
if (isset($_POST['nascimento']) ) {
    $nascimento = $_POST['nascimento'];
}
if (isset($_POST['sexo']) ) {
    $sexo = $_POST['sexo'];
}
if (isset($_POST['instrucao']) ) {
    $instrucao = $_POST['instrucao'];
}
if (isset($_POST['natural']) ) {
    $natural = $_POST['natural'];
}
if (isset($_POST['uf']) ) {
    $uf = $_POST['uf'];
}
if (isset($_POST['estadocivil']) ) {
    $estadocivil = $_POST['estadocivil'];
}
if (isset($_POST['dependentes']) ) {
    $dependentes = $_POST['dependentes'];
}
if (isset($_POST['mae']) ) {
    $mae = $_POST['mae'];
}
if (isset($_POST['pai']) ) {
    $pai = $_POST['pai'];
}
if (isset($_POST['rg']) ) {
    $rg = $_POST['rg'];
}
if (isset($_POST['emissao']) ) {
    $emissao = $_POST['emissao'];
}
if (isset($_POST['emissor']) ) {
    $emissor = $_POST['emissor'];
}
if (isset($_POST['cpf']) ) {
    $cpf = $_POST['cpf'];
}
if (isset($_POST['cnh']) ) {
    $cnh = $_POST['cnh'];
}
if (isset($_POST['catcnh']) ) {
    $catcnh = $_POST['catcnh'];
}
if (isset($_POST['dddtelfixo']) ) {
    $dddtelfixo = $_POST['dddtelfixo'];
}
if (isset($_POST['telfixo']) ) {
    $telfixo = $_POST['telfixo'];
}
if (isset($_POST['dddcelular']) ) {
    $dddcelular = $_POST['dddcelular'];
}
if (isset($_POST['celular']) ) {
    $celular = $_POST['celular'];
}
if (isset($_POST['endereco']) ) {
    $endereco = $_POST['endereco'];
}
if (isset($_POST['num']) ) {
    $num = $_POST['num'];
}
if (isset($_POST['complemento']) ) {
    $complemento = $_POST['complemento'];
}
if (isset($_POST['bairro']) ) {
    $bairro = $_POST['bairro'];
}
if (isset($_POST['cidade']) ) {
    $cidade = $_POST['cidade'];
}
if (isset($_POST['cep']) ) {
    $cep = $_POST['cep'];
}
if (isset($_POST['ufend']) ) {
    $ufend = $_POST['ufend'];
}
if (isset($_POST['moradia']) ) {
    $moradia = $_POST['moradia'];
}
if (isset($_POST['anores']) ) {
    $anores = $_POST['anores'];
}
if (isset($_POST['mesres']) ) {
    $mesres = $_POST['mesres'];
}

//dadosProfissionais
if (isset($_POST['empresa']) ) {
    $empresa = $_POST['empresa'];
}
if (isset($_POST['admissao']) ) {
    $admissao = $_POST['admissao'];
}
if (isset($_POST['tempoemprego']) ) {
    $tempoemprego = $_POST['tempoemprego'];
}
if (isset($_POST['cnpj']) ) {
    $cnpj = $_POST['cnpj'];
}
if (isset($_POST['enderecoemp']) ) {
    $enderecoemp = $_POST['enderecoemp'];
}
if (isset($_POST['numemp']) ) {
    $numemp = $_POST['numemp'];
}
if (isset($_POST['complementoemp']) ) {
    $complementoemp = $_POST['complementoemp'];
}
if (isset($_POST['bairroemp']) ) {
    $bairroemp = $_POST['bairroemp'];
}
if (isset($_POST['cidadeemp']) ) {
    $cidadeemp = $_POST['cidadeemp'];
}
if (isset($_POST['cepemp']) ) {
    $cepemp = $_POST['cepemp'];
}
if (isset($_POST['ufemp']) ) {
    $ufemp = $_POST['ufemp'];
}
if (isset($_POST['dddtelemp']) ) {
    $dddtelemp = $_POST['dddtelemp'];
}
if (isset($_POST['telemp']) ) {
    $telemp = $_POST['telemp'];
}
if (isset($_POST['profissao']) ) {
    $profissao = $_POST['profissao'];
}
if (isset($_POST['funcao']) ) {
    $funcao = $_POST['funcao'];
}
if (isset($_POST['rendab']) ) {
    $rendab = $_POST['rendab'];
}
if (isset($_POST['rendal']) ) {
    $rendal = $_POST['rendal'];
}



//referências do Financiado
if (isset($_POST['ref1']) ) {
    $ref1 = $_POST['ref1'];
}
if (isset($_POST['grauref1']) ) {
    $grauref1 = $_POST['grauref1'];
}
if (isset($_POST['dddtelref1']) ) {
    $dddtelref1 = $_POST['dddtelref1'];
}
if (isset($_POST['telref1']) ) {
    $telref1 = $_POST['telref1'];
}
if (isset($_POST['ref2']) ) {
    $ref2 = $_POST['ref2'];
}
if (isset($_POST['grauref2']) ) {
    $grauref2 = $_POST['grauref2'];
}
if (isset($_POST['dddtelref2']) ) {
    $dddtelref2 = $_POST['dddtelref2'];
}
if (isset($_POST['telref2']) ) {
    $telref2 = $_POST['telref2'];
}
if (isset($_POST['ref3']) ) {
    $ref3 = $_POST['ref3'];
}
if (isset($_POST['grauref3']) ) {
    $grauref3 = $_POST['grauref3'];
}
if (isset($_POST['dddtelref3']) ) {
    $dddtelref3 = $_POST['dddtelref3'];
}
if (isset($_POST['telref3']) ) {
    $telref3 = $_POST['telref3'];
}

//dadosPessoaisGarantidor
if (isset($_POST['nomeconj']) ) {
    $nomeconj = $_POST['nomeconj'];
}
if (isset($_POST['nascimentoconj']) ) {
    $nascimentoconj = $_POST['nascimentoconj'];
}
if (isset($_POST['sexoconj']) ) {
    $sexoconj = $_POST['sexoconj'];
}
if (isset($_POST['instrucaoconj']) ) {
    $instrucaoconj = $_POST['instrucaoconj'];
}
if (isset($_POST['naturalconj']) ) {
    $naturalconj = $_POST['naturalconj'];
}
if (isset($_POST['ufconj']) ) {
    $ufconj = $_POST['ufconj'];
}
if (isset($_POST['estadocivilconj']) ) {
    $estadocivilconj = $_POST['estadocivilconj'];
}
if (isset($_POST['dependentesconj']) ) {
    $dependentesconj = $_POST['dependentesconj'];
}
if (isset($_POST['maeconj']) ) {
    $maeconj = $_POST['maeconj'];
}
if (isset($_POST['paiconj']) ) {
    $paiconj = $_POST['paiconj'];
}
if (isset($_POST['rgconj']) ) {
    $rgconj = $_POST['rgconj'];
}
if (isset($_POST['emissaoconj']) ) {
    $emissaoconj = $_POST['emissaoconj'];
}
if (isset($_POST['emissorconj']) ) {
    $emissorconj = $_POST['emissorconj'];
}
if (isset($_POST['cpfconj']) ) {
    $cpfconj = $_POST['cpfconj'];
}
if (isset($_POST['cnhconj']) ) {
    $cnhconj = $_POST['cnhconj'];
}
if (isset($_POST['catcnhconj']) ) {
    $catcnhconj = $_POST['catcnhconj'];
}
if (isset($_POST['dddtelfixoconj']) ) {
    $dddtelfixoconj = $_POST['dddtelfixoconj'];
}
if (isset($_POST['telfixoconj']) ) {
    $telfixoconj = $_POST['telfixoconj'];
}
if (isset($_POST['dddcelularconj']) ) {
    $dddcelularconj = $_POST['dddcelularconj'];
}
if (isset($_POST['celularconj']) ) {
    $celularconj = $_POST['celularconj'];
}
if (isset($_POST['enderecoconj']) ) {
    $enderecoconj = $_POST['enderecoconj'];
}
if (isset($_POST['numconj']) ) {
    $numconj = $_POST['numconj'];
}
if (isset($_POST['complementoconj']) ) {
    $complementoconj = $_POST['complementoconj'];
}
if (isset($_POST['bairroconj']) ) {
    $bairroconj = $_POST['bairroconj'];
}
if (isset($_POST['cidadeconj']) ) {
    $cidadeconj = $_POST['cidadeconj'];
}
if (isset($_POST['cepconj']) ) {
    $cep = $_POST['cepconj'];
}
if (isset($_POST['ufendconj']) ) {
    $ufendconj = $_POST['ufendconj'];
}
if (isset($_POST['moradiaconj']) ) {
    $moradiaconj = $_POST['moradiaconj'];
}
if (isset($_POST['anoresconj']) ) {
    $anoresconj = $_POST['anoresconj'];
}
if (isset($_POST['mesresconj']) ) {
    $mesresconj = $_POST['mesresconj'];
}

//dadosProfissionaisGarantidor
if (isset($_POST['empresaconj']) ) {
    $empresaconj = $_POST['empresaconj'];
}
if (isset($_POST['admissaoconj']) ) {
    $admissaoconj = $_POST['admissaoconj'];
}
if (isset($_POST['tempoempregoconj']) ) {
    $tempoempregoconj = $_POST['tempoempregoconj'];
}
if (isset($_POST['cnpjconj']) ) {
    $cnpjconj = $_POST['cnpjconj'];
}
if (isset($_POST['enderecoempconj']) ) {
    $enderecoempconj = $_POST['enderecoempconj'];
}
if (isset($_POST['numepconj']) ) {
    $numempconj = $_POST['numempconj'];
}
if (isset($_POST['complementoempconj']) ) {
    $complementoempconj = $_POST['complementoempconj'];
}
if (isset($_POST['bairroempconj']) ) {
    $bairroempconj = $_POST['bairroempconj'];
}
if (isset($_POST['cidadeempconj']) ) {
    $cidadeempconj = $_POST['cidadeempconj'];
}
if (isset($_POST['cepempconj']) ) {
    $cepempconj = $_POST['cepempconj'];
}
if (isset($_POST['ufempconj']) ) {
    $ufempconj = $_POST['ufempconj'];
}
if (isset($_POST['dddtelempconj']) ) {
    $dddtelempconj = $_POST['dddtelempconj'];
}
if (isset($_POST['telempconj']) ) {
    $telempconj = $_POST['telempconj'];
}
if (isset($_POST['profissaoconj']) ) {
    $profissaoconj = $_POST['profissaoconj'];
}
if (isset($_POST['funcaoconj']) ) {
    $funcaoconj = $_POST['funcaoconj'];
}
if (isset($_POST['rendabconj']) ) {
    $rendabconj = $_POST['rendabconj'];
}
if (isset($_POST['rendalconj']) ) {
    $rendalconj = $_POST['rendalconj'];
}



//referências do garantidor
//Garantidor 1
    if (isset($_POST['refGarantidorNome1']) ) {
        $refGarantidorNome1 = $_POST['refGarantidorNome1'];
    }
    if (isset($_POST['refGarantidorDDD1']) ) {
        $refGarantidorDDD1 = $_POST['refGarantidorDDD1'];
    }
    if (isset($_POST['refGarantidorTelefone1']) ) {
        $refGarantidorTelefone1 = $_POST['refGarantidorTelefone1'];
    }
    if (isset($_POST['refGarantidorGrauRelacionamento1']) ) {
        $refGarantidorGrauRelacionamento1 = $_POST['refGarantidorGrauRelacionamento1'];
    }
    //Garantidor 2
    if (isset($_POST['refGarantidorNome2']) ) {
        $refGarantidorNome2 = $_POST['refGarantidorNome2'];
    }
    if (isset($_POST['refGarantidorDDD2']) ) {
        $refGarantidorDDD2 = $_POST['refGarantidorDDD2'];
    }
    if (isset($_POST['refGarantidorTelefone2']) ) {
        $refGarantidorTelefone2 = $_POST['refGarantidorTelefone2'];
    }
    if (isset($_POST['refGarantidorGrauRelacionamento2']) ) {
        $refGarantidorGrauRelacionamento2 = $_POST['refGarantidorGrauRelacionamento2'];
    }
    //Garantidor 3
    if (isset($_POST['refGarantidorNome3']) ) {
        $refGarantidorNome3 = $_POST['refGarantidorNome3'];
    }
    if (isset($_POST['refGarantidorDDD3']) ) {
        $refGarantidorDDD3 = $_POST['refGarantidorDDD3'];
    }
    if (isset($_POST['refGarantidorTelefone3']) ) {
        $refGarantidorTelefone3 = $_POST['refGarantidorTelefone3'];
    }
    if (isset($_POST['refGarantidorGrauRelacionamento3']) ) {
        $refGarantidorGrauRelacionamento3 = $_POST['refGarantidorGrauRelacionamento3'];
    }

//dadosGarantia
if (isset($_POST['marca']) ) {
    $marca = $_POST['marca'];
}
if (isset($_POST['modelo']) ) {
    $modelo = $_POST['modelo'];
}
if (isset($_POST['fabricacao']) ) {
    $fabricacao = $_POST['fabricacao'];
}
if (isset($_POST['amodelo']) ) {
    $amodelo = $_POST['amodelo'];
}
if (isset($_POST['placa']) ) {
    $placa = $_POST['placa'];
}
if (isset($_POST['chassi']) ) {
    $chassi = $_POST['chassi'];
}
if (isset($_POST['renavam']) ) {
    $renavam = $_POST['renavam'];
}
if (isset($_POST['cor']) ) {
    $cor = $_POST['cor'];
}
if (isset($_POST['combustivel']) ) {
    $combustivel = $_POST['combustivel'];
}
if (isset($_POST['tipo']) ) {
    $tipo = $_POST['tipo'];
}
if (isset($_POST['condicao']) ) {
    $condicao = $_POST['condicao'];
}

//adicional
if (isset($_POST['nomecontato']) ) {
    $nomecontato = $_POST['nomecontato'];
}
if (isset($_POST['dddtelcontato']) ) {
    $dddtelcontato = $_POST['dddtelcontato'];
}
if (isset($_POST['telcontato']) ) {
    $telcontato = $_POST['telcontato'];
}
if (isset($_POST['lojacontato']) ) {
    $lojacontato = $_POST['lojacontato'];
}
if (isset($_POST['emailcontato']) ) {
    $emailcontato = $_POST['emailcontato'];
}
if (isset($_POST['cidadecontato']) ) {
    $cidadecontato = $_POST['cidadecontato'];
}


//outros
if (isset($_POST['cepok']) ) {
    $cepok = $_POST['cepok'];
}
if (isset($_POST['cepempok']) ) {
    $cepempok = $_POST['cepempok'];
}
if (isset($_POST['cepconjok']) ) {
    $cepok = $_POST['cepconjok'];
}
if (isset($_POST['cepempok']) ) {
    $cepempok = $_POST['cepempconjok'];
}

if (isset($_POST['tabela']) ) {
    $tabela = $_POST['tabela'];
}
if (isset($_POST['tc']) ) {
    $tc = $_POST['tc'];
}
if (isset($_POST['tc_alternativo']) ) {
    $tc_alternativo = $_POST['tc_alternativo'];
}
if (isset($_POST['valorop']) ) {
    $valorop = $_POST['valorop'];
	
    //transforma a string do valor em um valor numerico
	$vlrFinanciamento = $_POST['valor'] ;
	$vlrFinanciamento = str_replace('.', '', $vlrFinanciamento);
	$vlrFinanciamento = str_replace(',','.',$vlrFinanciamento);
	

//	echo "<table><tr><td>vlrFinanciamento";
//		echo "</td>";
//        echo "<td>";
//        echo $vlrFinanciamento;
//        echo "</td>";
//        echo "</tr>";
//	echo "<table><tr><td>vlrFinanciamento_replace";
//		echo "</td>";
//        echo "<td>";
//        echo $vlrFinanciamento;
//        echo "</td>";
//        echo "</tr>";
	
//		echo "<tr><td>condição";
//		echo "</td>";
//        echo "<td>";
//        echo ($vlrFinanciamento <= 4000);
//        echo "</td>";
//        echo "</tr>";
//		echo "</table>";
	if($vlrFinanciamento <= 4000){
		$tc_utilizado = $tc_alternativo;
		}else{
			$tc_utilizado = $tc;	
	}
}
if (isset($_POST['coeficienteop']) ) {
    $coeficienteop = $_POST['coeficienteop'];
}
if (isset($_POST['parcelasop']) ) {
    $parcelasop = $_POST['parcelasop'];
}
if (isset($_POST['indice']) ) {
    $indice = $_POST['indice'];
}
if (isset($_POST['parcelaop']) ) {
    $parcelaop = $_POST['parcelaop'];
}
if (isset($_POST['anoop']) ) {
    $anoop = $_POST['anoop'];
}
if (isset($_POST['cliente']) ) {
    $cliente = $_POST['cliente'];
}
if (isset($_POST['simu']) ) {
    $simu = $_POST['simu'];
}
if (isset($_POST['tratar']) ) {
    $tratar = $_POST['tratar'];
}


//acertos sobre a tabela
$obs = '';
if (isset($_POST['observacoes']) ) {
    $obs = $_POST['observacoes'];
}
/* O trecho abaixo foi removido a pedido de Flavio Vargas em 14/03/2017.
O sistema anteriormente ignorava o que o usuário digitava ao salvar a Ficha Cadastral.
 *
 * if($simu==0){
  $obs = 'Solicitação';
}elseif($simu==1){
  $obs = 'Simulação';
}else{
  $obs = 'Indefinido';
}

if($cliente==0){
  $obs = $obs . ' - Lojista';
}elseif($cliente==1){
  $obs = $obs . ' - Cliente Comum';
}else{
  $obs = $obs . ' - Indefinido';
}

if($tratar==0){
  if($cliente==0){
    $obs = $obs . ' - Valores conforme a ficha ';
  }elseif($cliente==1){
    $obs = $obs . ' - Verificar valores da operação ';
  }
  if($anoop==0){
    $obs = $obs . ' - Verificar Ano do item financiado';
  }else{
    $obs = $obs . ' - Ano do item financiado ' . $anoop;
  }
}elseif($tratar==1){
  $obs = $obs . ' - Valores à tratar';
}else{
  $obs = $obs . ' - Indefinido';
}

if($cepok==0){
  $obs = $obs . ' - VERIFICAR SE CEP E ENDEREÇO ESTÃO CORRETOS';
}
if($cepempok==0){
  $obs = $obs . ' - VERIFICAR SE CEP E ENDEREÇO DA EMPRESA ESTÃO CORRETOS';
}
if($cepconjok==0){
  $obs = $obs . ' - VERIFICAR SE CEP E ENDEREÇO DO GARANTIDOR ESTÃO CORRETOS';
}
if($cepempconjok==0){
  $obs = $obs . ' - VERIFICAR SE CEP E ENDEREÇO DA EMPRESA DO GARANTIDOR ESTÃO CORRETOS';
}
*/


$today = date("d/m/Y");

switch ($instrucao) {
    case 1 :
        $instrucao = "Ensino Fundamental Incompleto";
        break;
    case 2 :
        $instrucao = "Ensino Fundamental Completo";
        break;
    case 3 :
        $instrucao = "Ensino Médio Incompleto";
        break;
    case 4 :
        $instrucao = "Ensino Médio Completo";
        break;
    case 5 :
        $instrucao = "Ensino Superior Incompleto";
        break;
    case 6 :
        $instrucao = "Ensino Superior Completo";
        break;
    case 7 :
        $instrucao = "Pós-Graduação";
        break;
}

switch ($estadocivil) {
    case 1 :
        $estadocivil = "Solteiro(a)";
        break;
    case 2 :
        $estadocivil = "Casado(a)";
        break;
    case 3 :
        $estadocivil = "União Estável";
        break;
    case 4 :
        $estadocivil = "Divorciado(a)";
        break;
    case 5 :
        $estadocivil = "Viúvo(a)";
        break;
}


switch ($instrucaoconj) {
    case 1 :
        $instrucaoconj = "Ensino Fundamental Incompleto";
        break;
    case 2 :
        $instrucaoconj = "Ensino Fundamental Completo";
        break;
    case 3 :
        $instrucaoconj = "Ensino Médio Incompleto";
        break;
    case 4 :
        $instrucaoconj = "Ensino Médio Completo";
        break;
    case 5 :
        $instrucaoconj = "Ensino Superior Incompleto";
        break;
    case 6 :
        $instrucaoconj = "Ensino Superior Completo";
        break;
    case 7 :
        $instrucaoconj = "Pós-Graduação";
        break;
}

switch ($estadocivilconj) {
    case 1 :
        $estadocivilconj = "Solteiro(a)";
        break;
    case 2 :
        $estadocivilconj = "Casado(a)";
        break;
    case 3 :
        $estadocivilconj = "União Estável";
        break;
    case 4 :
        $estadocivilconj = "Divorciado(a)";
        break;
    case 5 :
        $estadocivilconj = "Viúvo(a)";
        break;
}


switch ($combustivel) {
    case 1 :
        $combustivel = "Álcool";
        break;
    case 2 :
        $combustivel = "Gasolina";
        break;
    case 3 :
        $combustivel = "Diesel";
        break;
    case 4 :
        $combustivel = "GNV";
        break;
    case 5 :
        $combustivel = "FLEX";
        break;
}

$sexoM = '';
$sexoF = '';
switch ($sexo) {
    case 1:
        $sexoM = "checked";
        break;
    case 2:
        $sexoF = "checked";
        break;
}

$moradiaA = '';
$moradiaB = '';
$moradiaC = '';
switch ($moradia) {
    case 1 :
        $moradiaA = "checked";
        break;
    case 2 :
        $moradiaB = "checked";
        break;
    case 3 :
        $moradiaC = "checked";
        break;
}

$sexoconjM = '';
$sexoconjF = '';
switch ($sexoconj) {
    case 1:
        $sexoconjM = "checked";
        break;
    case 2:
        $sexoconjF = "checked";
        break;
}

$moradiaconjA = '';
$moradiaconjB = '';
$moradiaconjC = '';
switch ($moradiaconj) {
    case 1 :
        $moradiaconjA = "checked";
        break;
    case 2 :
        $moradiaconjB = "checked";
        break;
    case 3 :
        $moradiaconjC = "checked";
        break;
}


$tipoA = '';
$tipoB = '';
$tipoC = '';
switch ($tipo) {
    case 1:
        $tipoA = "checked";
        break;
    case 2:
        $tipoB = "checked";
        break;
    case 3:
        $tipoC = "checked";
        break;
}

$condicaoA = '';
$condicaoB = '';
switch ($condicao) {
    case 1:
        $condicaoA = "checked";
        break;
    case 2:
        $condicaoB = "checked";
        break;
}

echo "$tabela - $tc - $valorop - $coeficienteop - $parcelasop - $indice - $parcelaop - $anoop";

?>

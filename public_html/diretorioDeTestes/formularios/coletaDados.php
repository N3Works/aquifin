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
  
  $valorop = '---';
  $coeficienteop = '---';
  $parcelasop = '---';
  $indice = '---';
  $parcelaop = '---';
  $anoop = 0;
  $cliente = -1;
  $simu = -1;
  $tratar = 0;
  
  
    
  
  //dadosPessoais
  if($_POST['nome']){
    $nome = $_POST['nome'];}
  if($_POST['nascimento']){  
    $nascimento = $_POST['nascimento'];}
  if($_POST['sexo']){
    $sexo = $_POST['sexo'];}
  if($_POST['instrucao']){
    $instrucao = $_POST['instrucao'];}
  if($_POST['natural']){
    $natural = $_POST['natural'];}
  if($_POST['uf']){
    $uf = $_POST['uf'];}
  if($_POST['estadocivil']){
    $estadocivil = $_POST['estadocivil'];}
  if($_POST['dependentes']){
    $dependentes = $_POST['dependentes'];}
  if($_POST['mae']){
    $mae = $_POST['mae'];}
  if($_POST['pai']){
    $pai = $_POST['pai'];}
  if($_POST['rg']){
    $rg = $_POST['rg'];}
  if($_POST['emissao']){
    $emissao = $_POST['emissao'];}
  if($_POST['emissor']){
    $emissor = $_POST['emissor'];}
  if($_POST['cpf']){
    $cpf = $_POST['cpf'];}
  if($_POST['cnh']){
    $cnh = $_POST['cnh'];}
  if($_POST['catcnh']){
    $catcnh = $_POST['catcnh'];}
  if($_POST['dddtelfixo']){
    $dddtelfixo = $_POST['dddtelfixo'];}
  if($_POST['telfixo']){
    $telfixo = $_POST['telfixo'];}
  if($_POST['dddcelular']){
    $dddcelular = $_POST['dddcelular'];}
  if($_POST['celular']){
    $celular = $_POST['celular'];  }
  if($_POST['endereco']){
    $endereco = $_POST['endereco'];}
  if($_POST['num']){
    $num = $_POST['num'];}
  if($_POST['complemento']){
    $complemento = $_POST['complemento'];}
  if($_POST['bairro']){
    $bairro = $_POST['bairro'];}
  if($_POST['cidade']){
    $cidade = $_POST['cidade'];}
  if($_POST['cep']){
    $cep = $_POST['cep'];}
  if($_POST['ufend']){
    $ufend = $_POST['ufend'];}
  if($_POST['moradia']){
    $moradia = $_POST['moradia'];}
  if($_POST['anores']){
    $anores = $_POST['anores'];}
  if($_POST['mesres']){
    $mesres = $_POST['mesres'];}
    
  //dadosProfissionais
  if($_POST['empresa']){
    $empresa = $_POST['empresa'];}
  if($_POST['admissao']){
    $admissao = $_POST['admissao'];}
  if($_POST['tempoemprego']){
    $tempoemprego = $_POST['tempoemprego'];}
  if($_POST['cnpj']){
    $cnpj = $_POST['cnpj'];}
  if($_POST['enderecoemp']){
    $enderecoemp = $_POST['enderecoemp'];}
  if($_POST['numep']){
    $numemp = $_POST['numemp'];}
  if($_POST['complementoemp']){
    $complementoemp = $_POST['complementoemp'];}
  if($_POST['bairroemp']){
    $bairroemp = $_POST['bairroemp'];}
  if($_POST['cidadeemp']){
    $cidadeemp = $_POST['cidadeemp'];}
  if($_POST['cepemp']){
    $cepemp = $_POST['cepemp'];}
  if($_POST['ufemp']){
    $ufemp = $_POST['ufemp'];}
  if($_POST['dddtelemp']){
    $dddtelemp = $_POST['dddtelemp'];}
  if($_POST['telemp']){
    $telemp = $_POST['telemp'];}
  if($_POST['profissao']){
    $profissao = $_POST['profissao'];}
  if($_POST['funcao']){  
    $funcao = $_POST['funcao'];}
  if($_POST['rendab']){
    $rendab = $_POST['rendab'];}
  if($_POST['rendal']){
    $rendal = $_POST['rendal'];}
    
  //dadosPessoaisGarantidor
  if($_POST['nomeconj']){
    $nomeconj = $_POST['nomeconj'];}
  if($_POST['nascimentoconj']){  
    $nascimentoconj = $_POST['nascimentoconj'];}
  if($_POST['sexoconj']){
    $sexoconj = $_POST['sexoconj'];}
  if($_POST['instrucaoconj']){
    $instrucaoconj = $_POST['instrucaoconj'];}
  if($_POST['naturalconj']){
    $naturalconj = $_POST['naturalconj'];}
  if($_POST['ufconj']){
    $ufconj = $_POST['ufconj'];}
  if($_POST['estadocivilconj']){
    $estadocivilconj = $_POST['estadocivilconj'];}
  if($_POST['dependentesconj']){
    $dependentesconj = $_POST['dependentesconj'];}
  if($_POST['maeconj']){
    $maeconj = $_POST['maeconj'];}
  if($_POST['paiconj']){
    $paiconj = $_POST['paiconj'];}
  if($_POST['rgconj']){
    $rgconj = $_POST['rgconj'];}
  if($_POST['emissaoconj']){
    $emissaoconj = $_POST['emissaoconj'];}
  if($_POST['emissorconj']){
    $emissorconj = $_POST['emissorconj'];}
  if($_POST['cpfconj']){
    $cpfconj = $_POST['cpfconj'];}
  if($_POST['cnhconj']){
    $cnhconj = $_POST['cnhconj'];}
  if($_POST['catcnhconj']){
    $catcnhconj = $_POST['catcnhconj'];}
  if($_POST['dddtelfixoconj']){
    $dddtelfixoconj = $_POST['dddtelfixoconj'];}
  if($_POST['telfixoconj']){
    $telfixoconj = $_POST['telfixoconj'];}
  if($_POST['dddcelularconj']){
    $dddcelularconj = $_POST['dddcelularconj'];}
  if($_POST['celularconj']){
    $celularconj = $_POST['celularconj'];  }
  if($_POST['enderecoconj']){
    $enderecoconj = $_POST['enderecoconj'];}
  if($_POST['numconj']){
    $numconj = $_POST['numconj'];}
  if($_POST['complementoconj']){
    $complementoconj = $_POST['complementoconj'];}
  if($_POST['bairroconj']){
    $bairroconj = $_POST['bairroconj'];}
  if($_POST['cidadeconj']){
    $cidadeconj = $_POST['cidadeconj'];}
  if($_POST['cepconj']){
    $cepconj = $_POST['cepconj'];}
  if($_POST['ufendconj']){
    $ufendconj = $_POST['ufendconj'];}
  if($_POST['moradiaconj']){
    $moradiaconj = $_POST['moradiaconj'];}
  if($_POST['anoresconj']){
    $anoresconj = $_POST['anoresconj'];}
  if($_POST['mesresconj']){
    $mesresconj = $_POST['mesresconj'];}
    
  //dadosProfissionaisGarantidor
  if($_POST['empresaconj']){
    $empresaconj = $_POST['empresaconj'];}
  if($_POST['admissaoconj']){
    $admissaoconj = $_POST['admissaoconj'];}
  if($_POST['tempoempregoconj']){
    $tempoempregoconj = $_POST['tempoempregoconj'];}
  if($_POST['cnpjconj']){
    $cnpjconj = $_POST['cnpjconj'];}
  if($_POST['enderecoempconj']){
    $enderecoempconj = $_POST['enderecoempconj'];}
  if($_POST['numepconj']){
    $numempconj = $_POST['numempconj'];}
  if($_POST['complementoempconj']){
    $complementoempconj = $_POST['complementoempconj'];}
  if($_POST['bairroempconj']){
    $bairroempconj = $_POST['bairroempconj'];}
  if($_POST['cidadeempconj']){
    $cidadeempconj = $_POST['cidadeempconj'];}
  if($_POST['cepempconj']){
    $cepempconj = $_POST['cepempconj'];}
  if($_POST['ufempconj']){
    $ufempconj = $_POST['ufempconj'];}
  if($_POST['dddtelempconj']){
    $dddtelempconj = $_POST['dddtelempconj'];}
  if($_POST['telempconj']){
    $telempconj = $_POST['telempconj'];}
  if($_POST['profissaoconj']){
    $profissaoconj = $_POST['profissaoconj'];}
  if($_POST['funcaoconj']){  
    $funcaoconj = $_POST['funcaoconj'];}
  if($_POST['rendabconj']){
    $rendabconj = $_POST['rendabconj'];}
  if($_POST['rendalconj']){
    $rendalconj = $_POST['rendalconj'];}
  
  
  
  //referencias
  if($_POST['ref1']){  
    $ref1 = $_POST['ref1'];}
  if($_POST['grauref1']){
    $grauref1 = $_POST['grauref1'];}
  if($_POST['dddtelref1']){
    $dddtelref1 = $_POST['dddtelref1'];}
  if($_POST['telref1']){
    $telref1 = $_POST['telref1'];}
  if($_POST['ref2']){
    $ref2 = $_POST['ref2'];}
  if($_POST['grauref2']){
    $grauref2 = $_POST['grauref2'];}
  if($_POST['dddtelref2']){
    $dddtelref2 = $_POST['dddtelref2'];}
  if($_POST['telref2']){
    $telref2 = $_POST['telref2'];}
  if($_POST['ref3']){
    $ref3 = $_POST['ref3'];}
  if($_POST['grauref3']){
    $grauref3 = $_POST['grauref3'];}
  if($_POST['dddtelref3']){
    $dddtelref3 = $_POST['dddtelref3'];}
  if($_POST['telref3']){
    $telref3 = $_POST['telref3'];}
  
  //dadosGarantia
  if($_POST['marca']){
    $marca = $_POST['marca'];}
  if($_POST['modelo']){
    $modelo = $_POST['modelo'];}
  if($_POST['fabricacao']){
    $fabricacao = $_POST['fabricacao'];}
  if($_POST['amodelo']){
    $amodelo = $_POST['amodelo'];}
  if($_POST['placa']){
    $placa = $_POST['placa'];}
  if($_POST['chassi']){
    $chassi = $_POST['chassi'];}
  if($_POST['renavam']){
    $renavam = $_POST['renavam'];}
  if($_POST['cor']){
    $cor = $_POST['cor'];}
  if($_POST['combustivel']){
    $combustivel = $_POST['combustivel'];}
  if($_POST['tipo']){
    $tipo = $_POST['tipo'];}
  if($_POST['condicao']){
    $condicao = $_POST['condicao'];}
    
  //adicional
  if($_POST['nomecontato']){
    $nomecontato = $_POST['nomecontato'];}
  if($_POST['dddtelcontato']){
    $dddtelcontato = $_POST['dddtelcontato'];}
  if($_POST['telcontato']){
    $telcontato = $_POST['telcontato'];}
  if($_POST['lojacontato']){
    $lojacontato = $_POST['lojacontato'];}
  if($_POST['emailcontato']){
    $emailcontato = $_POST['emailcontato'];}
  if($_POST['cidadecontato']){
    $cidadecontato = $_POST['cidadecontato'];}  
  
  
  //outros
  if($_POST['cepok']){
    $cepok = $_POST['cepok'];}
  if($_POST['cepempok']){
    $cepempok = $_POST['cepempok'];}
  if($_POST['cepconjok']){
    $cepok = $_POST['cepconjok'];}
  if($_POST['cepempok']){
    $cepempok = $_POST['cepempconjok'];}
    
  if($_POST['tabela']){
    $tabela = $_POST['tabela'];}
  if($_POST['tc']){
    $tc = $_POST['tc'];}
  if($_POST['valorop']){
    $valorop = $_POST['valorop'];}
  if($_POST['coeficienteop']){
    $coeficienteop = $_POST['coeficienteop'];}
  if($_POST['parcelasop']){
    $parcelasop = $_POST['parcelasop'];}
  if($_POST['indice']){
    $indice = $_POST['indice'];}
  if($_POST['parcelaop']){
    $parcelaop = $_POST['parcelaop'];}
  if($_POST['anoop']){
    $anoop = $_POST['anoop'];}
  if($_POST['cliente']){
    $cliente = $_POST['cliente'];}
  if($_POST['simu']){
    $simu = $_POST['simu'];}
  if($_POST['tratar']){
    $tratar = $_POST['tratar'];}
  
  //acertos sobre a tabela
  $obs = '';
  if($simu==0){
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
  
  
  
  $today = date("d/m/Y");

  switch($instrucao){
    case 1 : $instrucao = "Ensino Fundamental Incompleto"; break;
    case 2 : $instrucao = "Ensino Fundamental Completo"; break;
    case 3 : $instrucao = "Ensino Médio Incompleto"; break;
    case 4 : $instrucao = "Ensino Médio Completo"; break;
    case 5 : $instrucao = "Ensino Superior Incompleto"; break;
    case 6 : $instrucao = "Ensino Superior Completo"; break;
    case 7 : $instrucao = "Pós-Graduação"; break;                                                        
  }
  
  switch($estadocivil){                      
    case 1 : $estadocivil = "Solteiro(a)"; break;
    case 2 : $estadocivil = "Casado(a)"; break;
    case 3 : $estadocivil = "União Estável"; break;                      
    case 4 : $estadocivil = "Divorciado(a)"; break;
    case 5 : $estadocivil = "Viúvo(a)"; break;   
  }
  
  
  switch($instrucaoconj){
    case 1 : $instrucaoconj = "Ensino Fundamental Incompleto"; break;
    case 2 : $instrucaoconj = "Ensino Fundamental Completo"; break;
    case 3 : $instrucaoconj = "Ensino Médio Incompleto"; break;
    case 4 : $instrucaoconj = "Ensino Médio Completo"; break;
    case 5 : $instrucaoconj = "Ensino Superior Incompleto"; break;
    case 6 : $instrucaoconj = "Ensino Superior Completo"; break;
    case 7 : $instrucaoconj = "Pós-Graduação"; break;                                                        
  }
  
  switch($estadocivilconj){                      
    case 1 : $estadocivilconj = "Solteiro(a)"; break;
    case 2 : $estadocivilconj = "Casado(a)"; break;
    case 3 : $estadocivilconj = "União Estável"; break;                      
    case 4 : $estadocivilconj = "Divorciado(a)"; break;
    case 5 : $estadocivilconj = "Viúvo(a)"; break;   
  }
  
  
  switch($combustivel){                      
    case 1 : $combustivel = "Álcool"; break;
    case 2 : $combustivel = "Gasolina"; break;
    case 3 : $combustivel = "Diesel"; break;  
    case 4 : $combustivel = "GNV"; break;      
  }  
  
  $sexoM = '';
  $sexoF = '';
  switch($sexo){
    case 1: $sexoM = "checked";break;
    case 2: $sexoF = "checked";break;
  }
  
  $moradiaA = '';
  $moradiaB = '';
  $moradiaC = '';    
  switch($moradia){
    case 1 : $moradiaA = "checked";break;
    case 2 : $moradiaB = "checked";break;
    case 3 : $moradiaC = "checked";break;
  }
  
  $sexoconjM = '';
  $sexoconjF = '';
  switch($sexoconj){
    case 1: $sexoconjM = "checked";break;
    case 2: $sexoconjF = "checked";break;
  }
  
  $moradiaconjA = '';
  $moradiaconjB = '';
  $moradiaconjC = '';    
  switch($moradiaconj){
    case 1 : $moradiaconjA = "checked";break;
    case 2 : $moradiaconjB = "checked";break;
    case 3 : $moradiaconjC = "checked";break;
  }  
  

  
  $tipoA = '';
  $tipoB = '';
  $tipoC = '';
  switch($tipo){
    case 1: $tipoA = "checked";break;
    case 2: $tipoB = "checked";break;
    case 3: $tipoC = "checked";break;    
  }
  
  $condicaoA = '';
  $condicaoB = '';
  switch($condicao){
    case 1: $condicaoA = "checked";break;
    case 2: $condicaoB = "checked";break;
  }
  
  echo "$tabela - $tc - $valorop - $coeficienteop - $parcelasop - $indice - $parcelaop - $anoop";
  
  ?>
<ul class="etapa">
  <h1>Dados Pessoais - Garantidor</h1>
  <li style="width:440px">Nome <br /><input type='text' id="nomeconj" name="nomeconj" style="width:440px;"/></li>
  <li>Data de Nascimento <br /><input id="nascimentoconj" name="nascimentoconj" type="text" size="17" maxlength="10" onkeyup="checkdate('nascimentoconj',1900,18)" ondblclick="getdate('nascimentoconj',1900,18)" />
  <input id="nascimentodconj" name="nascimentodconj" type="hidden" /></li>
  <li id="sexo">Sexo <br /><input type="radio" name="sexoconj" value="1" />M  <input type="radio" name="sexoconj" value="2" />F</li>                
  <li>Grau de Instrução <br />
  <select id="instrucaoconj" name="instrucaoconj">
    <option value="0">---</option>                    
    <option value="1">Ensino Fundamental Incompleto</option>
    <option value="2">Ensino Fundamental Completo</option>  
    <option value="3">Ensino Médio Incompleto</option>
    <option value="4">Ensino Médio Completo</option>  
    <option value="5">Ensino Superior Incompleto</option>
    <option value="6">Ensino Superior Completo</option>  
    <option value="7">Pós-Graduação</option>                                      
  </select>
  </li>
  <li>Natural de <br /><input name="naturalconj" type='text' size="20" /></li>
  <li>UF <br /><input name="ufconj" type='text' style="width:20px;" size="2" maxlength="2" />             
  </li>
  <li>Estado Civil <br />
  <select id="estadocivilconj" name="estadocivilconj">
    <option value="0">---</option>                    
    <option value="1">Solteiro(a)</option>
    <option value="2">Casado(a)</option>
    <option value="3">União Estável</option>                      
    <option value="4">Divorciado(a)</option>
    <option value="5">Viúvo(a)</option>                                        
  </select>
  </li>
  <li>Dependente(s) <br /><input type="number" name="dependentesconj" min="0"></li>
  <li style="width:215px">Mãe <br /><input id="maeconj" name="maeconj" type='text' style="width:215px;"/></li>
  <li style="width:215px">Pai <br /><input name="paiconj" type='text' style="width:215px;"/></li>                
  <li>RG <br /><input id="rgconj" name="rgconj" type='text' size="11" maxlength="10" /></li>
  <li>Emissão <br /><input id="emissaoconj" name="emissaoconj" type="text" size="11" maxlength="10" onkeyup="checkdate('emissaoconj',1900,18)" />
  <input id="emissaod" name="emissaodconj" type="hidden" /></li>
  <li>Órgão Emissor <br /><input name="emissor" type='text' size="11"  /></li>
  <li>CPF <br /> <input onKeyUp="mascaraCPF('cpfconj')" id="cpfconj" name="cpfconj" type='text' size="15" maxlength="14" /></li>
  <li>CNH <br /> <input name="cnhconj" type='text' size="11" maxlength="11" /></li>
  <li>Categoria <br />
  <select id="catcnhconj" name="catcnhconj">
    <option value="0">---</option>                    
    <option value="A">A</option>
    <option value="B">B</option>  
    <option value="C">C</option>
    <option value="D">D</option>  
    <option value="E">E</option>                    
  </select>                       
  </li>
  <li>Telefone Fixo<br />  <input  onkeyup="avancaDDD('telfixoconj', false)" id="dddtelfixoconj" name="dddtelfixoconj" type='text' style="width:20px;" size="2" maxlength="2" /><input id="telfixoconj" name="telfixoconj" type='text' size="10" maxlength="8" /></li>
  <li>Celular<br />  <input  onkeyup="avancaDDD('celularconj', true)" id="dddcelularconj" name="dddcelularconj" type='text' style="width:20px;" size="2" maxlength="2" /><input id="celularconj" name="celularconj" type='text' size="10" maxlength="8" /></li>             
  <li>CEP <br /><input onkeyup="buscaCep('cepconj','pessoalconj')" id="cepconj" name="cepconj" type='text' size="9" maxlength="8" /></li>            
  <li style="width:215px">Endereço <br /><input id="enderecoconj" name="enderecoconj" type='text' style="width:215px;"/></li>            
  <li>Nº <br /><input id="numconj" name="numconj" type='text' size="3" /></li>  
  <li>Complemento <br /><input name="complementoconj" type='text' size="3" /></li>   
  <li>Bairro <br /><input id="bairroconj" name="bairroconj" type='text' size="12" /></li>                  
  <li>Cidade <br /><input id="cidadeconj" name="cidadeconj" type='text' size="12" /></li>                
  <li>UF <br /><input id="ufendconj" name="ufendconj" type='text' style="width:20px;" size="3" maxlength="2" /></li>
  <li>Moradia <br />
  <select id="moradiaconj" name="moradiaconj">
    <option value="0">---</option>                
    <option value="1">Própria</option>
    <option value="2">Alugada</option>  
    <option value="3">Outra</option>
  </select> 
  </li> 
  <li>Tempo de Residência <br /><input id="anoresconj" type="number" name="anoresconj" min="0" style="width:50px;"> Ano(s) <input type="number" id="mesresconj" name="mesresconj" min="0" max="11" style="width:40px;"> Mês/Meses</li>
</ul>
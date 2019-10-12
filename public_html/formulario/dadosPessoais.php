<ul class="etapa">
  <h1>Dados Pessoais</h1>
  <li style="width:440px">Nome<span class="obrigatorio">*</span> <br /><input type='text' id="nome" name="nome" style="width:440px;"/></li>
  <li>Data de Nascimento<span class="obrigatorio">*</span> <br /><input id="nascimento" name="nascimento" type="text" size="17" maxlength="10" onkeyup="checkdate('nascimento',1900,18)" ondblclick="getdate('nascimento',1900,18)" />
  <input id="nascimentod" name="nascimentod" type="hidden" /></li>
  <li id="sexo">Sexo <br /><input type="radio" name="sexo" value="1" />M  <input type="radio" name="sexo" value="2" />F</li>                
  <li>Grau de Instrução <br />
  <select id="instrucao" name="instrucao">
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
  <li>Natural de <br /><input name="natural" type='text' size="20" /></li>
  <li>UF <br /><input name="uf" type='text' style="width:20px;" size="2" maxlength="2" />             
  </li>
  <li>Estado Civil <br />
  <select id="estadocivil" name="estadocivil">
    <option value="0">---</option>                    
    <option value="1">Solteiro(a)</option>
    <option value="2">Casado(a)</option>
    <option value="3">União Estável</option>                      
    <option value="4">Divorciado(a)</option>
    <option value="5">Viúvo(a)</option>                                        
  </select>
  </li>
  <li>Dependente(s) <br /><input type="number" name="dependentes" min="0"></li>
  <li style="width:215px">Mãe<span class="obrigatorio">*</span> <br /><input id="mae" name="mae" type='text' style="width:215px;"/></li>
  <li style="width:215px">Pai <br /><input name="pai" type='text' style="width:215px;"/></li>                
  <li>RG<br /><input id="rg" name="rg" type='text' size="11" maxlength="10" /></li>
  <li>Emissão <br /><input id="emissao" name="emissao" type="text" size="11" maxlength="10" onkeyup="checkdate('emissao',1900,18)" ondblclick="getdate('emissao',1900,18)" />
  <input id="emissaod" name="emissaod" type="hidden" /></li>
  <li>Órgão Emissor <br /><input name="emissor" type='text' size="11"  /></li>
  <li>CPF<span class="obrigatorio">*</span> <br /> <input onKeyUp="mascaraCPF('cpf')" id="cpf" name="cpf" type='text' size="15" maxlength="14" /></li>
  <li>CNH <br /> <input name="cnh" type='text' size="11" maxlength="11" /></li>
  <li>Categoria <br />
  <select id="catcnh" name="catcnh">
    <option value="0">---</option>                    
    <option value="A">A</option>
    <option value="B">B</option>  
    <option value="C">C</option>
    <option value="D">D</option>  
    <option value="E">E</option>                    
  </select>                       
  </li>
  <li>Telefone Fixo<br />  <input onkeyup="avancaDDD('telfixo', false)" id="dddtelfixo" name="dddtelfixo" type='text' style="width:20px;" size="2" maxlength="2" /><input id="telfixo" name="telfixo" type='text' size="10" maxlength="9" /></li>
  <li>Celular<span class="obrigatorio">*</span><br />  <input onkeyup="avancaDDD('celular', true)" id="dddcelular" name="dddcelular" type='text' style="width:20px;" size="2" maxlength="2" /><input id="celular" name="celular" type='text' size="10" maxlength="9" /></li>
  <li>CEP<span class="obrigatorio">*</span> <br /><input onkeyup="//buscaCep('cep','pessoal')" id="cep" name="cep" type='text' size="9" maxlength="8" /></li>
  <li style="width:215px">Endereço<span class="obrigatorio">*</span> <br /><input id="endereco" name="endereco" type='text' style="width:215px;"/></li>            
  <li>Nº<span class="obrigatorio">*</span> <br /><input id="num" name="num" type='text' size="3" /></li>  
  <li>Complemento <br /><input name="complemento" type='text' size="3" /></li>   
  <li>Bairro<span class="obrigatorio">*</span> <br /><input id="bairro" name="bairro" type='text' size="12" /></li>                  
  <li>Cidade<span class="obrigatorio">*</span> <br /><input id="cidade" name="cidade" type='text' size="12" /></li>                
  <li>UF<span class="obrigatorio">*</span> <br /><input id="ufend" name="ufend" type='text' style="width:20px;" size="3" maxlength="2" /></li>
  <li>Moradia<span class="obrigatorio">*</span> <br />
  <select id="moradia" name="moradia">
    <option value="0">---</option>                
    <option value="1">Própria</option>
    <option value="2">Alugada</option>  
    <option value="3">Outra</option>
  </select> 
  </li> 
  <li>Tempo de Residência<span class="obrigatorio">*</span> <br /><input id="anores" type="number" name="anores" min="0" style="width:50px;"> Ano(s) <input type="number" id="mesres" name="mesres" min="0" max="11" style="width:40px;"> Mês/Meses</li>
</ul>
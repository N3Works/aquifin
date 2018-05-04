<ul class="etapa">
  <h1>Dados Profissionais</h1>
  <div class="categoria">
    <li style="width:440px">Empresa<span class="obrigatorio">*</span> <br /><input id="empresa" name="empresa" type='text' style="width:440px;"/></li>
    <li>Admissão<span style="float:right">e/ou</span><br /><input id="admissao" name="admissao" type='text' size="17" maxlength="10" onkeyup="checkdate('admissao',1900,18)" />
    <input id="admissaod" name="admissaod" type="hidden" /></li>
    <li>Tempo<span class="obrigatorio">*</span> <br /><input id="tempoemprego" name="tempoemprego" type='text' /></li>
    <li>Se Proprietário CNPJ<br /><input name="cnpj" size="15" type='text' maxlength="14" /></li>
  </div>
  <div class="categoria">
    <li>CEP<span class="obrigatorio">*</span> <br /><input onkeyup="buscaCep('cepemp','emp')" id="cepemp" name="cepemp" type='text' size="9" maxlength="8" /></li>                      
    <li style="width:215px">Logradouro<span class="obrigatorio">*</span> <br /><input id="enderecoemp" name="enderecoemp" type='text' style="width:215px;"/></li>            
    <li>Nº<span class="obrigatorio">*</span> <br /><input id="numemp" name="numemp" type='text' size="3" /></li>  
    <li>Complemento <br /><input name="complementoemp" type='text' size="3" /></li>   
    <li>Bairro<span class="obrigatorio">*</span> <br /><input id="bairroemp" name="bairroemp" type='text' size="12" /></li>                  
    <li>Cidade<span class="obrigatorio">*</span> <br /><input id="cidadeemp" name="cidadeemp" type='text' size="12" /></li>                
    <li>UF<span class="obrigatorio">*</span> <br /><input id="ufemp" name="ufemp" type='text' style="width:20px;" size="3" maxlength="2" /></li>
  </div>
  <div class="categoria">
    <li>Telefone<span class="obrigatorio">*</span><br />  <input onkeyup="avancaDDD('telemp', false)" id="dddtelemp" name="dddtelemp" type='text' style="width:20px;" size="2" maxlength="2" /><input id="telemp" name="telemp" type='text' size="10" maxlength="8" /></li>                                        
  </div>
  <div class="categoria">
    <li>Profissão <br /><input name="profissao" type='text' /></li>
    <li>Função<span class="obrigatorio">*</span> <br /><input id="funcao" name="funcao" type='text' /></li>
  </div>
  <div class="categoria">
    <li>Renda Bruta<span class="obrigatorio">*</span> <br /><input id="rendab" name="rendab" type='text' /></li>
    <li>Renda Líquida <br /><input id="rendal" name="rendal" type='text' /></li>
  </div>
</ul>
<ul class="etapa">
  <h1>Dados Profissionais - Garantidor</h1>
  <div class="categoria">
    <li style="width:440px">Empresa<br /><input id="empresaconj" name="empresaconj" type='text' style="width:440px;"/></li>
    <li>Admissão<span style="float:right">e/ou</span><br /><input id="admissaoconj" name="admissaoconj" type='text' size="17" maxlength="10" onkeyup="checkdate('admissaoconj',1900,18)" />
    <input id="admissaodconj" name="admissaodconj" type="hidden" /></li>
    <li>Tempo <br /><input id="tempoempregoconj" name="tempoempregoconj" type='text' /></li>
    <li>Se Proprietário CNPJ<br /><input name="cnpjconj" size="15" type='text' maxlength="14" /></li>
  </div>
  <div class="categoria">
    <li>CEP <br /><input onkeyup="buscaCep('cepempconj','empconj')" id="cepempconj" name="cepempconj" type='text' size="9" maxlength="8" /></li>                      
    <li style="width:215px">Logradouro <br /><input id="enderecoempconj" name="enderecoempconj" type='text' style="width:215px;"/></li>            
    <li>Nº<br /><input id="numempconj" name="numempconj" type='text' size="3" /></li>  
    <li>Complemento <br /><input name="complementoempconj" type='text' size="3" /></li>   
    <li>Bairro <br /><input id="bairroempconj" name="bairroempconj" type='text' size="12" /></li>                  
    <li>Cidade <br /><input id="cidadeempconj" name="cidadeempconj" type='text' size="12" /></li>                
    <li>UF <br /><input id="ufempconj" name="ufempconj" type='text' style="width:20px;" size="3" maxlength="2" /></li>
  </div>
  <div class="categoria">
    <li>Telefone<br />  <input  onkeyup="avancaDDD('telempconj', false)" id="dddtelempconj" name="dddtelempconj" type='text' style="width:20px;" size="2" maxlength="2" /><input id="telempconj" name="telempconj" type='text' size="10" maxlength="8" /></li>                                        
  </div>
  <div class="categoria">
    <li>Profissão <br /><input name="profissaoconj" type='text' /></li>
    <li>Função <br /><input id="funcaoconj" name="funcaoconj" type='text' /></li>
  </div>
  <div class="categoria">
    <li>Renda Bruta <br /><input id="rendabconj" name="rendabconj" type='text' /></li>
    <li>Renda Líquida <br /><input id="rendalconj" name="rendalconj" type='text' /></li>
  </div>
</ul>
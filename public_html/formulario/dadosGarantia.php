<ul class="etapa">
  <h1>Dados da Garantia</h1>
  <div class="categoria">
    <li>Marca<span class="obrigatorio">*</span> <br /><input id="marca" name="marca" type='text' size="10" /></li>
    <li>Modelo<span class="obrigatorio">*</span><br /><input id="modelo" name="modelo" type='text' size="10" /></li>
    <li>Ano de Fabricação<span class="obrigatorio">*</span> <br /><input id="fabricacao" type="number" size="5" maxlength="4" name="fabricacao" min="1980" max="2013"></li>
    <li>Ano do Modelo<span class="obrigatorio">*</span> <br /><input id="amodelo" type="number" size="5" maxlength="4" name="amodelo" min="1980" max="2014"></li>                
  </div>
  <div class="categoria">
    <li id="hasPlaca">Placa<span class="obrigatorio">*</span><br /><input id="placa" name="placa" type='text' size="8" /></li> 
    <li>Chassi <br /><input name="chassi" type='text' maxlength="20" size="20"/></li>
    <li id="hasRenavam">Renavam <br /><input id="renavam" name="renavam" maxlength="15" type='text' size="14"/></li>
  </div>
  <div class="categoria">
    <li>Cor <br /><input name="cor" type='text' size="10"/></li>                         
    <li>Combustível<br />
      <select name="combustivel">
        <option value="0">---</option>                    
        <option value="1">Álcool</option>
        <option value="2">Gasolina</option>  
        <option value="3">Diesel</option>
        <option value="4">GNV</option>                    
        <option value="5">FLEX</option>            
      </select>   
    </li>              
  <div class="categoria">
    <li>Tipo: <br /><input type="radio" name="tipo" />Automóvel  <input type="radio" name="tipo" />Moto  <input type="radio" name="tipo" />Caminhão</li> 
  </div>
  <div class="categoria">
    <li>Condição: <br /><input id="condNovo" onClick="automovelNovo()" type="radio" name="condicao" value="1" />Novo  <input type="radio" name="condicao" value="2" />Usado</li>   
  </div>
</ul>
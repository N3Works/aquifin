<?php $voltar = 'sair'; ?>
<?php include "checagemLoja.php"; ?>
<?php
  if(session_id() == '') {
    session_start();
  }
  
  $tabelas = Array();  
  $nomesTabelas = Array();
  
  include "../Conexao.php";
  
  $c = new Conexao();;
  $idEstado = '';
  //Tabelas do Estado
  $consultaEstado = $c->STMTSemPrepare("SELECT * FROM `Estado` WHERE `uf`='".$_SESSION['uf'] ."'",true);
  $consultaEstado ->data_seek(0);
  while ($retornoEstado = $consultaEstado->fetch_assoc())
        $idEstado = $retornoEstado['id'];
  $consultaTabelasEstado = $c->STMTSemPrepare("SELECT *
                                               FROM `tabela`
                                               INNER JOIN `EstadoHasTabela`
                                               ON `tabela`.`id`=`EstadoHasTabela`.`fkTabela`
                                               AND `EstadoHasTabela`.`fkEstado`=".$idEstado,
                           true);
  $consultaTabelasEstado ->data_seek(0);
  
  while ($retornoTabela = $consultaTabelasEstado->fetch_assoc()){
    //if(strlen($retornoTabela['ref'])!=6)
      //continue;
      $repeticao = 0;
      foreach($nomesTabelas as $nomeTabela){
        if($retornoTabela['nome']==$nomeTabela)
          $repeticao++;
      }
      if($repeticao==0){
        array_push($tabelas, $retornoTabela);
        array_push($nomesTabelas, $retornoTabela['nome']);  
      }
    //var_dump($retornoTabela);
    //var_dump($nomesTabelas);
    // array_push($tabelas, $retornoTabela);
    // array_push($nomesTabelas, $retornoTabela['nome']);
  }

  //Consulta Regiões
  $consultaRegioes = $c->STMTSemPrepare("SELECT *
                                         FROM `Regiao`
                                         INNER JOIN `RegiaoHasEstado`
                                         ON `RegiaoHasEstado`.`fkEstado`=$idEstado AND `RegiaoHasEstado`.`fkRegiao`=`Regiao`.`id`",
                      true);
  $consultaRegioes ->data_seek(0);
  while ($retornoRegiao = $consultaRegioes->fetch_assoc()){
    //Consulta as Tabelas de cada região
    $consultaTabelasRegioes = $c->STMTSemPrepare("SELECT *
                            FROM `tabela`
                            INNER JOIN `RegiaoHasTabela`
                            ON `tabela`.`id`=`RegiaoHasTabela`.`fkTabela`
                            AND `RegiaoHasTabela`.`fkRegiao`=".$retornoRegiao['id'],
                          true);
    $consultaTabelasRegioes ->data_seek(0);
    while ($retornoTabelaRegiao = $consultaTabelasRegioes->fetch_assoc()){
      //Para cada tabela da Região, confere se uma tabela de mesmo tipo já existe, se não existir, adiciona à lista. 
      //Tabela já existente automaticamente já veio do Estado ou da Região de maior prioridade.
  
      $repeticao = 0;
      foreach($nomesTabelas as $nomeTabela){
        if($retornoTabelaRegiao['nome']==$nomeTabela)
          $repeticao++;
      }
      if($repeticao==0){
        array_push($tabelas, $retornoTabelaRegiao);
        array_push($nomesTabelas, $retornoTabelaRegiao['nome']);  
      }
    }
  }
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Envio de Ficha Cadastral (Loja) - Login</title>
    <link rel="stylesheet" href="../gerencia.css" />
  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>    
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <h3>Envio de Ficha Cadastral (Loja) - Login</h3>
    <div class="gerencia">
      <center>
        <form name="selecaoTipoFicha" method="post" action="novaFichaCadastral.php">
          <table width="400">
            <tr>
              <td style="text-align:right;">Método de Financiamento</td>
              <td style="width:50%;">
                <select name="idTabela" required style="width:100%;">
                  <option selected label=" " disabled value></option>
                  <?php
                    foreach($tabelas as $tabela) 
                      echo "<option value='".$tabela['id']."'>".$tabela['nome']."</option>";
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">Ano do Item Financiado</td>
              <td>
                <select name="anoItem" required style="width:100%;">
                <option selected label=" "  disabled value></option>
                  <?php
                    for($ano=date("Y");$ano>=1900;$ano--) 
                      echo "<option value='$ano'>$ano</option>";
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="adiciona"><input type="submit" value="Entrar" /></td>
            </tr>
            <tr>
              <td colspan="2" class="adiciona" style="color:yellow;">*Desconsiderar o campo de ANO de financiamento caso não seja relevante à operação.</td>
            </tr>
          </table>
        </form>
      </center>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>    
  </body>
</html>
<?php $c->desconecta(); ?>
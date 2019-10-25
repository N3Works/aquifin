<?php $voltar = 'sair'; ?>
<?php //include "checagemLoja.php"; ?>
<?php
  if(isset($_POST['idTabela']))
    $_SESSION['idTabela'] = $_POST['idTabela'];
  if(isset($_POST['anoItem']))
    $_SESSION['anoItem'] = $_POST['anoItem'];
  
  //echo 'tabela2: '; echo $_SESSION['idTabela'];
  include "../Conexao.php";
  
  $c = new Conexao();;
  
  $res = $c->STMTSemPrepare("SELECT *
                FROM tabela
                INNER JOIN tabelasAnoProduto
                ON tabela.id = tabelasAnoProduto.fkTabelaAlvo
                WHERE tabelasAnoProduto.fkTabelaOrigem=".$_SESSION['idTabela'],
              true);
  //echo 'tabela3: '; echo $_SESSION['idTabela'];
  $res->data_seek(0);  
  while ($linha = $res->fetch_assoc()){
    if($_SESSION['anoItem']>=$linha['anoInicial'] && 
       $_SESSION['anoItem']<=$linha['anoFinal'])
       $_SESSION['idTabela']=$linha['id'];
  }
  
  $fatores = Array();
  $parcelas = Array();
  $fatorParcelaIndice = Array();
  $res = $c->STMTSemPrepare("SELECT *
                FROM (
                  SELECT *
                    FROM `fator`
                    INNER JOIN (
                      SELECT DISTINCT `fkFator`
                      FROM  `TabelaHasIndice`
                      WHERE `fkTabela`=". $_SESSION['idTabela'] ."
                    ) as filtro
                    ON filtro.`fkFator`=`fator`.`id`
                ) as selecao ORDER BY `nome`",
              true);
  $res->data_seek(0);              
  while ($linha = $res->fetch_assoc()){
    array_push($fatores, $linha);
  }
  
  $res = $c->STMTSemPrepare("SELECT *
                FROM (
                  SELECT *
                  FROM `parcelas`
                  INNER JOIN (
                    SELECT DISTINCT `fkParcelas`
                    FROM  `TabelaHasIndice`
                    WHERE `fkTabela`=". $_SESSION['idTabela'] ."
                  ) as filtro
                  ON `filtro`.`fkParcelas`=`parcelas`.`id`
                ) as selecao ORDER BY `valor`",
              true);
  $res->data_seek(0);              
  while ($linha = $res->fetch_assoc()){
    array_push($parcelas, $linha);
  }
  
  $res = $c->STMTSemPrepare(  "SELECT * FROM `TabelaHasIndice` INNER JOIN `parcelas` ON `fkParcelas`=`id` WHERE `fkTabela`=" . $_SESSION['idTabela'] . " ORDER BY `valor`", true);
  $res->data_seek(0);              
  while ($linha = $res->fetch_assoc()){
    array_push($fatorParcelaIndice, $linha);
  }
  $tc='';
  $tc_alternativo='';
  $nomeTabela='';
  $anoOP = $_POST['anoItem'];
  $res = $c->STMTSemPrepare("SELECT * FROM `tabela` WHERE `id`=". $_SESSION['idTabela'], true);
  $res->data_seek(0);              
  while ($linha = $res->fetch_assoc()){
    $tc=$linha['tc'];
	$tc_alternativo=$linha['tc_alternativo'];
	//echo $tc_alternativo;
    $nomeTabela = $linha['ref'];
  }

?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Envio de Ficha Cadastral (Loja)</title>
    <link rel="stylesheet" href="../gerencia.css" />
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/checkDate.js"></script>
    <script type="text/javascript" src="../js/mascaracpf.js"></script>
    <script type="text/javascript" src="../js/avancaDDD.js"></script>
    <!-- <script type="text/javascript" src="../js/cep.js"></script> -->
    <script type="text/javascript" src="../js/validacao.js"></script>    
    <script type="text/javascript">

      function limitTextareaLine(e) {
        if(e.keyCode == 13 && $(this).val().split("\n").length >= $(this).attr('rows')) {
          return false;
        }
      }

      $(function() {
        $('textarea.limited').keydown(limitTextareaLine);
      });

      function validacaoLoja(){
        var strCamposComErroValidacao = "";
        strCamposComErroValidacao = validaAreaText('dadosPessoais');
        strCamposComErroValidacao = strCamposComErroValidacao + validaAreaText('dadosProfissionais');
        strCamposComErroValidacao = strCamposComErroValidacao + validaAreaText('dadosGarantia');
        strCamposComErroValidacao = strCamposComErroValidacao + validaAreaText('referencias');
        strCamposComErroValidacao = strCamposComErroValidacao + validaAreaText('adicional');
        if (strCamposComErroValidacao != "") {
          strMensagemValidacao = "\n Para continuar é necessário preencher os seguintes campos obrigatórios: " +
              "\n <b>" + strCamposComErroValidacao + "</b>" +
              "\n\nCaso hajam duvidas entre em contato através de " +
              "\n    Telefones: (51)3081-6555 / (51) 3592-6775 " +
              "\n    Whatsapp (51) 99513 0988 " +
              "\n    E-mail: Contato@aquifinanciamentos.com.br ";

          document.getElementById("divErros").style.display = 'block';
          document.getElementById("msgErros").innerHTML += strMensagemValidacao;
          alert('Foram encontrados problemas no envio da Proposta. \nVerifique as pendências no fundo da página.')
          window.location.hash = "divErros";
        } else document.getElementById("fichaCadastralViaLoja").submit();
      }
      
      var fatores = new Array();
      var parcelas = new Array();
      var fatorParcelaIndice = new Array();
      var fatorHasParcela = new Array();
      var parcelaHasFator = new Array();
      //Preenchido por PHP
      <?php
        foreach($fatores as $fator){
          echo "fatores.push([".$fator['id'].",'".$fator['nome']."']);\n";
        }
        
        foreach($parcelas as $parcela){
          echo "parcelas.push([".$parcela['id'].",".$parcela['valor']."]);\n";
        }
      
        foreach($fatorParcelaIndice as $fpi){
          echo "fatorParcelaIndice.push([".$fpi['fkFator'].",".$fpi['fkParcelas'].",".$fpi['Indice']."]);\n";
        }
        
      ?>
      for(var i = 0; i < fatores.length; i++){
        fatorHasParcela.push([]);
        fatorHasParcela[i][0] = fatores[i][0];
        for(var j = 0; j < fatorParcelaIndice.length; j++){
          if(fatores[i][0]==fatorParcelaIndice[j][0])
            fatorHasParcela[i].push(fatorParcelaIndice[j][1]);
        }
      }
      
      for(var i = 0; i < parcelas.length; i++){
        parcelaHasFator.push([]);
        parcelaHasFator[i][0] = parcelas[i][0];
        for(var j = 0; j < fatorParcelaIndice.length; j++){
          if(parcelas[i][0]==fatorParcelaIndice[j][1])
            parcelaHasFator[i].push(fatorParcelaIndice[j][0]);
        }
      }
    </script>

  </head>
  <body>
    <?php include '../partes/barraTopo.php'; ?>
    <?php include '../partes/complementoGerencia.php'; ?>
    <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120"/>
    <h3>Envio de Ficha cadastral (Loja)</h3>
    <form id="fichaCadastralViaLoja" name="fichaCadastralViaLoja" method="post" action="../formularios/arquivos.php"> 
      <input id="tc" name="tc" type="hidden" value="<?php echo $tc; ?>"/>
	  <input id="tc_alternativo" name="tc_alternativo" type="hidden" value="<?php echo $tc_alternativo; ?>"/>
      <div class="gerencia">
        <center>
          <?php include "calculo.php"; ?>
        </center>
      </div>    
      <div class="gerencia">
        <?php include "../formulario/dadosPessoais.php"; ?>
        <input type="button" onclick="validaArea('dadosPessoais');" value="Validar" />
      </div>
      <div class="gerencia">
        <?php include "../formulario/dadosProfissionais.php"; ?>
        <input type="button" onclick="validaArea('dadosProfissionais');" value="Validar" />
      </div>
      <div class="gerencia">
        <?php include "../formulario/referencias.php"; ?>
        <input type="button" onclick="validaArea('referencias');" value="Validar" />
      </div>
      <div class="gerencia">
        <?php include "../formulario/dadosPessoaisGarantidor.php"; ?>
        <?php include "../formulario/dadosProfissionaisGarantidor.php"; ?>
        <?php include "../formulario/referenciasGarantidor.php"; ?>
      </div>
      <div class="gerencia">
        <?php include "../formulario/dadosGarantia.php"; ?>
        <input type="button" onclick="validaArea('dadosGarantia');" value="Validar" />                        
      </div>
      <div class="gerencia">
        <?php include "../formulario/adicional.php"; ?>
        <input type="button" onclick="validaArea('adicional');" value="Validar" />                        
      </div>
      <div class="gerencia" id="divErros" style="display: none">
        <div class="alert-box error" id="msgErros">
          <span id="msgErros">ERRO:<br></span>
        </div>
      </div>
      <div class="gerencia" >
        <input type="button" onclick="validacaoLoja();" value="Validar e Enviar" style="width: 100%; padding: 10px 0;"/>
      </div>
    </form>
    <div id="aguardeCep">
      <p>Aguarde enquanto localizamos seu endereço</p>
      <p>Não se esqueça de preencher o número e completemento</p>
    </div>
    <?php include '../partes/complementoGerencia2.php'; ?>
    <script type="text/javascript" src="../js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
      });
    </script>
  </body>
</html>
<?php $c->desconecta(); ?>
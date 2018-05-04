<?php $voltar = false; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Aqui Financiamentos - Realize seus sonhos</title>
    <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="favicon.ico" >
    <!-- <link rel="stylesheet" type="text/css" href="style.css">  -->
    <link rel="stylesheet" type="text/css" href="novoEstilo.css">  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>  
    <script type="text/javascript" src="js/metodo.js"></script>
    <script type="text/javascript" src="js/mascaracpf.js"></script>           
    <script type="text/javascript" src="js/preload.js"></script>
    <script type="text/javascript" src="js/cep.js"></script>
    <script type="text/javascript" src="js/navegacao.js"></script>
    <script type="text/javascript" src="js/avancaDDD.js"></script>
    <script type="text/javascript" src="js/validacao.js"></script>
    <script type="text/javascript" src="js/verifica.js"></script>
    <script type="text/javascript" src="js/checkDate.js"></script>
  </head>
  <body>
    <?php include 'partes/barraTopo.php'; ?>
    <div id="body">
      <div id="tudo">
        <?php include 'partes/logo.php'; ?>
              <div id="conteudo">
                    <div id="home">
                        <img id="sonho" src="img/home.png" onclick="exibeFormulario();" />
                    </div>
        </div>  
        
          </div>
    </div>
    <?php include 'partes/rodape.php'; ?>
        <div id="light">
          <div id="capa">
        <div id="metodo">
          <table>
            <tr>
              <td colspan="2"><h1>SELECIONE O MÉTODO</h1></td>
            </tr>
            <tr>
              <td><input type="button" class="cliente" value="Simulação" onclick="metodo(2)" /></td>
              <td><input type="button" class="cliente" value="Solicitação" onclick="metodo(3)" /></td>
            </tr>
          </table>
        </div>
                <div id="aguardeCep">
                  <p>Aguarde enquanto localizamos seu endereço</p>
                    <p>Não se esqueça de preencher o número e completemento</p>
                </div>
        <div id="solicitacao">
          <form name="ficha" action="formularios/arquivos.php" method="post" enctype="multipart/form-data">            
            <ul id="etapas">
              <li id="dadosPessoais" class="etapaHolder">
                <div class="dl form">
                  <?php include 'formulario/dadosPessoais.php'; ?>
                </div>
                <div class="dl avanca">
                  <input type="button" class="fr" onclick="avanca('dadosPessoais');"  />
                </div>
              </li>
              <li id="dadosProfissionais" class="etapaHolder">
                <div class="dr form">
                  <?php include 'formulario/dadosProfissionais.php'; ?>
                </div>
                <div class="dr avanca">
                  <input type="button" class="fl volta" onclick="volta('dadosPessoais')"  />
                  <input type="button" class="fr" onclick="avanca('dadosProfissionais')"  />
                </div>
              </li>
              <li id="dadosPessoaisGarantidor" class="etapaHolder">
                <div class="dl form">
                  <?php include 'formulario/dadosPessoaisGarantidor.php'; ?>
                </div>
                <div class="dl avanca">
                  <input type="button" class="fl volta" onclick="volta('dadosProfissionais')"  />
                  <input type="button" class="fr" onclick="avanca('dadosPessoaisGarantidor')"  />
                </div>
              </li>
              <li id="dadosProfissionaisGarantidor" class="etapaHolder">
                <div class="dr form">
                  <?php include 'formulario/dadosProfissionaisGarantidor.php'; ?>
                </div>
                <div class="dr avanca">
                  <input type="button" class="fl volta" onclick="volta('dadosPessoaisGarantidor')"  />
                  <input type="button" class="fr" onclick="avanca('dadosProfissionaisGarantidor')"  />
                </div>
              </li>
              <li id="referencias" class="etapaHolder">
                <div class="dl form">
                  <?php include 'formulario/referencias.php'; ?>
                </div>
                <div class="dl avanca">
                  <input type="button" class="fl volta" onclick="volta('dadosProfissionaisGarantidor')"  />
                  <input type="button" class="fr" onclick="avanca('referencias')"  />
                </div>
                
              </li>
              <li id="dadosGarantia" class="etapaHolder">
                <div class="dr form">
                  <?php include 'formulario/dadosGarantia.php'; ?>
                </div>
                <div class="dr avanca">
                  <input type="button" class="fl volta" onclick="volta('referencias')"  />
                  <input type="submit" class="fr" value="Enviar" style="background: #FFF; color:#333;" />
                </div>
              </li>                
            </ul>
            <input id="cepok" name="cepok" type="hidden" />
            <input id="cepempok" name="cepempok" type="hidden" />
            <input id="simu" name="simu" type="hidden" />
          </form>
        </div>
      </div>
    </div>
        <?php include 'partes/faleConosco.php'; ?>
    <div id="one" style="top:-100px;left:10%;width:10px;height:10px;background:blue;position:absolute;"> </div>
    <div id="two" style="top:-100px;width:10px;height:10px;background:red;position:absolute;"> </div>
    <input type="text" style="position:absolute;top:-500px;" id="hid" />
    <script>
      $('#solicitacao').hide();
      $('#aguardeCep').hide();
      $('#enviaform').hide();
      
      $('#solicitacao').mouseleave(function(){
        outbox=true;
      }).mouseover(function(){
        outbox=false;  
      });

      $('#contato').mouseleave(function(){
        outbox=true;
      }).mouseover(function(){
        outbox=false;  
      });  

      $('#metodo').mouseleave(function(){
        outbox=true;
      }).mouseover(function(){
        outbox=false;  
      });    

      $(document).mousedown(function(e){ 
        if(e.button==0){
        if(outbox && box){
          $('#capa').hide("slow");  
          $('#capacontato').hide("slow");      
          outbox=false;
          box = false;
        }
        }
      });
    </script>
    </body>
</html> 
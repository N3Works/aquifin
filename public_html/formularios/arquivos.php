
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Envio de Ficha Cadastral (Loja)</title>
        <link rel="stylesheet" href="../gerencia.css" />
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../js/checkDate.js"></script>
        <script type="text/javascript" src="../js/mascaracpf.js"></script>
        <script type="text/javascript" src="../js/avancaDDD.js"></script>
        <script type="text/javascript">
            function voltar(){
                window.history.back();
            }
            function novaProposta(){
                window.location.href = '../loja/selecionarTipoFicha.php';
            }
        </script>
    </head>
    <body>
        <?php
            $voltar = 'sair';
            include '../partes/barraTopo.php';
            include '../partes/complementoGerencia.php';
            echo('<img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="960" height="120" </img>');
        ?>
        <div class="gerencia">
            <div class="alert-box warning" id="msgNotice"><span id="msgErros">Resposta do sistema:</span></br>
                <?php
                    include 'coletaDados.php';
                    include 'salvarDados.php';
                    include 'geraArquivo.php';
//                    include 'enviaEmail.php';
                ?>
            </div>
            <div style="text-align: center;" >
                <input type="button" id="btnVoltar" class="loja" value="Voltar" onClick="voltar()" />
                <input type="button" id="btnNovaProposta" class="loja" value="Nova proposta" onClick="novaProposta()" />
            </div>
        </div>

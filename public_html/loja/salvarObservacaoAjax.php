<?php
/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 14/10/2019
 * Time: 23:17
 */
include "../Conexao.php";

$c = new mysqli('216.172.172.44','aquifi88_aquifin','CharlottE93','aquifi88_aquifinanciame');

$date = date('Y-m-d H:i:s');

$sql = 'INSERT INTO observacoes_ficha_cadastral (observacao, data_cadastro, id_ficha_cadastral) VALUES('
        .'\''.$_POST['observacaoFichaCadastral'].'\''
        .',\''.$date.'\''
        .','.$_POST['fichaId']
        .')' ;

$result = $c->query($sql);

/* close connection */
$c->close();

echo 'Observação inserida com sucesso';

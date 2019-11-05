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

$sql = 'UPDATE ficha_cadastral set info_finais_nomecontato = "'
    .$_POST['infoContato']
    .'" where id = '
    .$_POST['fichaId'];

$result = $c->query($sql);

/* close connection */
$c->close();

echo 'Informação de Contato alterada com sucesso';

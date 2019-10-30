<?php
/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 14/10/2019
 * Time: 23:17
 */
include "../Conexao.php";

$c = new mysqli('216.172.172.44','aquifi88_aquifin','CharlottE93','aquifi88_aquifinanciame');

$sql = "UPDATE ficha_cadastral SET situacao = " . $_POST['situacao'] . ' WHERE id = ' . $_POST['fichaId'];

$result = $c->query($sql);

/* close connection */
$c->close();

echo 'Situação alterada com sucesso!';

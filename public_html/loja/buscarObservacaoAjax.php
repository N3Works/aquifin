<?php

include "../Conexao.php";

//$c = new mysqli('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame');
$c = new mysqli('216.172.172.44','aquifi88_aquifin','CharlottE93','aquifi88_aquifinanciame');

//$c = ConexaoMySqli();

$sql = "SELECT * FROM observacoes_ficha_cadastral";

$result = $c->query($sql);

/* numeric array */
$observacoes = $result->fetch_all(MYSQLI_ASSOC);

/* free result set */
$result->close();

/* close connection */
$c->close();

$dataTables = array(
    'meta' => array(
    
    /*    'page' => $page,
        'perpage' => $perpage,
        'sort' => $_REQUEST['datatable']['sort']['sort'],
        'field' => $_REQUEST['datatable']['sort']['field'],
        'pages' => round($resultTotal / $perpage),
        'total' => $resultTotal,
        'end' => ( $endPage < $resultTotal ? $endPage : $resultTotal), */
    ),
    'draw' => 1,
    'data' => $observacoes,
);



echo json_encode($dataTables);
<?php
/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 14/10/2019
 * Time: 23:17
 */

include "../Conexao.php";

//$c = new mysqli('186.202.152.71','aquifinanciame','CharlottE93','aquifinanciame');
$c = new mysqli('216.172.172.44','aquifi88_aquifin','CharlottE93','aquifi88_aquifinanciame');

//$c = ConexaoMySqli();

$sql = "SELECT * FROM ficha_cadastral";
$sqlTotal = "SELECT count(*) as total FROM ficha_cadastral";

if (isset($_REQUEST['datatable']['query']['generalSearch'])) {

    $where = '';

    if (isset($_REQUEST['datatable']['query']['generalSearch']['text'])) {
        $search = $_REQUEST['datatable']['query']['generalSearch']['text'];
        if ($search) {
            if (strpos($search, '/') === false) {
                $where = ' WHERE ( dados_pessoais_nome LIKE \'%'. $search .'%\' 
                 OR data_cadastro LIKE \'%'. $search .'%\' 
                 OR info_finais_lojacontato LIKE \'%'. $search .'%\' 
                 OR dados_pessoais_cidade LIKE \'%'. $search .'%\' 
                 OR dados_pessoais_ufend LIKE \'%'. $search .'%\' 
                 OR info_finais_nomecontato LIKE \'%'. $search .'%\' ) ';
            } else {
                $dateBreak = explode('/', $search);

                $where = ' WHERE data_cadastro LIKE \'%';
                if (count($dateBreak) == 1) {
                    $where .= $dateBreak[0] . '%\'';
                }
                if (count($dateBreak) == 2) {
                    $where .=  $dateBreak[1] . '-'. $dateBreak[0] . '%\'';
                }
                if (count($dateBreak) == 3) {
                    $where .=  $dateBreak[2] . '-' . $dateBreak[1] . '-' . $dateBreak[0] . '%\'';
                }
            }
        }
    }

    if (isset($_REQUEST['datatable']['query']['generalSearch']['filtrarSituacao'])) {
        $filtroSituacao = $_REQUEST['datatable']['query']['generalSearch']['filtrarSituacao'];
        if ($filtroSituacao) {
            if ($where) {
                $where .= ' AND situacao = ' . $filtroSituacao;
            } else {
                $where .= ' WHERE situacao = ' . $filtroSituacao;
            }
        }
    }

    $sql .= $where;
    $sqlTotal .= $where;
}

if (
    isset($_REQUEST['datatable']['sort']) 
    && !empty(trim($_REQUEST['datatable']['sort']['field']))
) {
    $sql .= ' order by ' . $_REQUEST['datatable']['sort']['field'] . ' ' . $_REQUEST['datatable']['sort']['sort'];
} 

$page = ($_REQUEST['datatable']['pagination']['page'] ? $_REQUEST['datatable']['pagination']['page'] : 10);
$perpage = ($_REQUEST['datatable']['pagination']['perpage'] ? $_REQUEST['datatable']['pagination']['perpage'] : 10);


$resultTotal = $c->query($sqlTotal);
$resultTotal = $resultTotal->fetch_array();
$resultTotal = (int)$resultTotal['total'];

$sql .= ' LIMIT '. (($page -1) * $perpage) .','.$perpage ;



$result = $c->query($sql);



/* numeric array */
$fichas = $result->fetch_all(MYSQLI_ASSOC);

/* free result set */
$result->close();

/* close connection */
$c->close();

$endPage = (($page -1) * $perpage) + $perpage + 1;

$dataTables = array(
    'meta' => array(
        'page' => $page,
        'perpage' => $perpage,
        'sort' => $_REQUEST['datatable']['sort']['sort'],
        'field' => $_REQUEST['datatable']['sort']['field'],
        'pages' => round($resultTotal / $perpage),
        'total' => $resultTotal,
        'end' => ( $endPage < $resultTotal ? $endPage : $resultTotal),
    ),
    'draw' => 1,
    'data' => $fichas,
);



echo json_encode($dataTables);

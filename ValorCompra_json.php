<?php

session_start();

$link = mysql_connect($_SESSION['db']['hostname'], $_SESSION['db']['username'], $_SESSION['db']['password']);
if (!$link) {
    die('N�o foi poss�vel conectar: ' . mysql_error());
}

$db = mysql_select_db($_SESSION['db']['database'], $link);
if (!$db) {
    die('N�o foi poss�vel selecionar banco de dados: ' . mysql_error());
}

#echo 'Conex�o bem sucedida';

$result = mysql_query(
        'SELECT
            *
        FROM
            app.Tab_' . $_GET['tabela'] . ' AS T
        WHERE
            T.idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . ' AND
			T.Empresa = ' . $_SESSION['log']['Empresa'] . ' 
        ORDER BY T.Nome' . $_GET['tabela'] . ' ASC'
);

while ($row = mysql_fetch_assoc($result)) {

    $event_array[] = array(
        'id' => $row['idTab_' . $_GET['tabela']],
        'valor' => str_replace(".", ",", $row['ValorCompra' . $_GET['tabela']]),
    );
}

echo json_encode($event_array);
mysql_close($link);
?>

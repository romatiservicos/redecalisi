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

if ($_GET['q']==1) {

    $result = mysql_query(
            'SELECT
                TSV.idTab_Servico,
                CONCAT(TSV.NomeServico, " --- R$ ", TSV.ValorCompraServico) AS NomeServico,
                TSV.ValorCompraServico              
            FROM
                Tab_Servico AS TSV					
            WHERE
                TSV.idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . ' AND
                (TSV.Empresa = ' . $_SESSION['log']['id'] . ' OR
				 TSV.Empresa = ' . $_SESSION['log']['Empresa'] . ')
			ORDER BY 
				TSV.NomeServico ASC 
    ');

    while ($row = mysql_fetch_assoc($result)) {

        $event_array[] = array(
            'id' => $row['idTab_Servico'],
            'name' => utf8_encode($row['NomeServico']),
            'value' => $row['ValorCompraServico'],
        );
    }

}

elseif ($_GET['q'] == 2) {

    $result = mysql_query(
            'SELECT
                TPV.idTab_Produtos,
				CONCAT(IFNULL(TPV.CodProd,""), " -- ", IFNULL(TP3.Prodaux3,""), " -- ", IFNULL(TPV.Produtos,""), " -- ", IFNULL(TP1.Prodaux1,""), " -- ", IFNULL(TP2.Prodaux2,""), " -- ", IFNULL(TPV.UnidadeProduto,""), " -- ", IFNULL(TFO.NomeFornecedor,"")) AS NomeProduto,
				TPV.ValorCompraProduto,
				TPV.Categoria
            FROM
                Tab_Produtos AS TPV
					LEFT JOIN App_Fornecedor AS TFO ON TFO.idApp_Fornecedor = TPV.Fornecedor
					LEFT JOIN Tab_Prodaux3 AS TP3 ON TP3.idTab_Prodaux3 = TPV.Prodaux3
					LEFT JOIN Tab_Prodaux2 AS TP2 ON TP2.idTab_Prodaux2 = TPV.Prodaux2
					LEFT JOIN Tab_Prodaux1 AS TP1 ON TP1.idTab_Prodaux1 = TPV.Prodaux1
            WHERE
                TPV.idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . ' AND
				TPV.Empresa = ' . $_SESSION['log']['Empresa'] . '
			ORDER BY  
				TPV.CodProd ASC,
				TPV.Categoria ASC,
				TP3.Prodaux3,				
				TPV.Produtos ASC,
				TP1.Prodaux1,
				TP2.Prodaux2
    ');

    while ($row = mysql_fetch_assoc($result)) {

        $event_array[] = array(
            'id' => $row['idTab_Produtos'],
            'name' => utf8_encode($row['NomeProduto']),
            'value' => $row['ValorCompraProduto'],
        );
    }

}
elseif ($_GET['q'] == 3) {

    $result = mysql_query(
            'SELECT                
				P.idApp_Profissional,
				CONCAT(F.Abrev, " --- ", P.NomeProfissional) AS NomeProfissional				
            FROM
                App_Profissional AS P
					LEFT JOIN Tab_Funcao AS F ON F.idTab_Funcao = P.Funcao
            WHERE
                P.idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . ' AND
                P.idSis_Usuario = ' . $_SESSION['log']['id'] . '
                ORDER BY F.Abrev ASC, P.NomeProfissional ASC'
    );

    while ($row = mysql_fetch_assoc($result)) {

        $event_array[] = array(
            'id' => $row['idApp_Profissional'],
            'name' => utf8_encode($row['NomeProfissional']),
        );
    }

}

echo json_encode($event_array);
mysql_close($link);
?>

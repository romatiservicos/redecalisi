<?php

session_start();

$link = mysql_connect($_SESSION['db']['hostname'], $_SESSION['db']['username'], $_SESSION['db']['password']);
#$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('N�o foi poss�vel conectar: ' . mysql_error());
}

$db = mysql_select_db($_SESSION['db']['database'], $link);
if (!$db) {
    die('N�o foi poss�vel selecionar banco de dados: ' . mysql_error());
}

#echo 'Conex�o bem sucedida';

$query = ($_SESSION['log']['Nome'] && isset($_SESSION['log']['Nome'])) ?
    'P.idSis_Usuario = ' . $_SESSION['log']['Nome'] . ' AND ' : FALSE;

$result = mysql_query(
        'SELECT
            C.idApp_Consulta,
            C.idApp_Cliente,
            R.NomeCliente,
			R.Telefone1,
            D.NomeContatoCliente,
            P.Nome,
            C.DataInicio,
            C.DataFim,
            C.Procedimento,
            C.Paciente,
            C.Obs,
            C.idTab_Status,
            TC.TipoConsulta,
            C.Evento
        FROM
            app.App_Agenda AS A,
            app.App_Consulta AS C
                LEFT JOIN app.App_Cliente AS R ON C.idApp_Cliente = R.idApp_Cliente
                LEFT JOIN app.App_ContatoCliente AS D ON C.idApp_ContatoCliente = D.idApp_ContatoCliente
                LEFT JOIN app.Sis_Usuario AS P ON P.idSis_Usuario = C.idSis_Usuario
                LEFT JOIN app.Tab_TipoConsulta AS TC ON C.idTab_TipoConsulta = TC.idTab_TipoConsulta
        WHERE
			C.idTab_Modulo = ' . $_SESSION['log']['idTab_Modulo'] . ' AND
           			
			' . $query . ' 			
            A.idApp_Agenda = C.idApp_Agenda

			
        ORDER BY C.DataInicio ASC'
);

while ($row = mysql_fetch_assoc($result)) {

    if ($row['Evento']) {
        $c = '_evento';
        //(strlen(utf8_encode($row['Obs'])) > 20) ? $title = substr(utf8_encode($row['Obs']), 0, 20).'...' : $title = utf8_encode($row['Obs']);
        $title = utf8_encode($row['Obs']);
		#$title = utf8_encode($row['Nome']);
		$subtitle = utf8_encode($row['Nome']);
		$profissional = utf8_encode($row['Nome']);
    } else {
        $c = '/' . $row['idApp_Cliente'];

        if ($row['Paciente'] == 'D') {
            $title = utf8_encode($row['NomeContatoCliente']);
            $subtitle = utf8_encode($row['NomeCliente']);
            $profissional = utf8_encode($row['Nome']);
			$telefone1 = utf8_encode($row['Telefone1']);
        }
        else {
            $title = utf8_encode($row['NomeCliente']);
			#$title = utf8_encode($row['Nome']);
			$subtitle = utf8_encode($row['Nome']);
            $profissional = utf8_encode($row['Nome']);
			$telefone1 = utf8_encode($row['Telefone1']);

        }

    }

    $url = 'consulta/alterar' . $c . '/' . $row['idApp_Consulta'];

    if ($row['DataFim'] < date('Y-m-d H:i:s')) {

        //$url = false;
        $textColor = 'grey';

        if ($row['Evento'])
            $status = '#e6e6e6';
        else {
            if ($row['idTab_Status'] == 1)
                $status = '#EBCCA1';
            elseif ($row['idTab_Status'] == 2)
                $status = ' #95d095';
            elseif ($row['idTab_Status'] == 3)
                $status = '#99B6D0';
            else
                $status = '#E4BEBD';
        }
    }
    else {

        //$url = 'consulta/alterar/'.$row['idApp_Paciente'].'/'.$row['idApp_Consulta'];
        $textColor = 'black';

        if ($row['Evento'])
            $status = '#a6a6a6';
        else {
            if ($row['idTab_Status'] == 1)
                $status = '#f0ad4e';
            elseif ($row['idTab_Status'] == 2)
                $status = '#5cb85c';
            elseif ($row['idTab_Status'] == 3)
                $status = 'darken(#428bca, 6.5%)';
            else
                $status = '#d9534f';
        }
    }

    $event_array[] = array(
        'id' => $row['idApp_Consulta'],
        'title' => $title,
        'subtitle' => $subtitle,
        'start' => str_replace('', 'T', $row['DataInicio']),
        'end' => str_replace('', 'T', $row['DataFim']),
        'allDay' => false,
        'url' => $url,
        'color' => $status,
        'textColor' => $textColor,
        'TipoConsulta' => utf8_encode($row['TipoConsulta']),
        'Procedimento' => utf8_encode($row['Procedimento']),
		'Telefone1' => utf8_encode($row['Telefone1']),
        'Obs' => utf8_encode($row['Obs']),
        'Evento' => $row['Evento'],
        'Paciente' => $row['Paciente'],
        #   'ContatoCliente' => $contatocliente,
        'Profissional' => $profissional,
    );
}

echo json_encode($event_array);
mysql_close($link);
?>

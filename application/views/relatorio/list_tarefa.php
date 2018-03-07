<div class="container-fluid">
    <div class="row">

        <div>
			<table class="table table-bordered table-condensed table-striped">	
				<tfoot>
                    <tr>
                        <th colspan="3" class="active">Total encontrado: <?php echo $report->num_rows(); ?> resultado(s)</th>
                    </tr>
                </tfoot>
			</table>
            <table class="table table-bordered table-condensed table-striped">

                <thead>
                    <tr>                       											
						<!--<th class="active">Respons�vel da Tarefa</th>-->
						<th class="active">Tarefa / Miss�o</th>																	                       
						<th class="active">Data da Tarefa:</th>
						<th class="active">Prazo de Conclus�o</th>
						<th class="active">Tarefa Conclu�da?</th>
						<th class="active">Data da Conclus�o da Tarefa</th>
						<th class="active">Rotina?:</th>
						<th class="active">Prioridade?</th>						
						<!--<th class="active">Respons�vel da A��o</th>-->						
						<!--<th class="active">A��o</th>
						<th class="active">Data da A��o</th>
						<th class="active">A��o Conclu�da?</th>																	
						<th class="active">N.Tarefa</th>-->
																		
						
                    </tr>
                </thead>

                <tbody>

                    <?php
                    foreach ($report->result_array() as $row) {

                        #echo '<tr>';
                        echo '<tr class="clickable-row" data-href="' . base_url() . 'tarefa/alterar/' . $row['idApp_Tarefa'] . '">';
                           
							#echo '<td>' . $row['NomeProfissional'] . '</td>';
							echo '<td>' . $row['ObsTarefa'] . '</td>'; //  = Tarefa
							echo '<td>' . $row['DataTarefa'] . '</td>';
							echo '<td>' . $row['DataPrazoTarefa'] . '</td>';
							echo '<td>' . $row['TarefaConcluida'] . '</td>'; // = Tarefa Conclu�da?
							echo '<td>' . $row['DataConclusao'] . '</td>';
							echo '<td>' . $row['Rotina'] . '</td>'; // = Rotina
							echo '<td>' . $row['Prioridade'] . '</td>'; // = Prioridade								
							#echo '<td>' . $row['Profissional'] . '</td>';							
							#echo '<td>' . $row['Procedtarefa'] . '</td>';
							#echo '<td>' . $row['DataProcedtarefa'] . '</td>';
							#echo '<td>' . $row['ConcluidoProcedtarefa'] . '</td>';																																															
							#echo '<td>' . $row['idApp_Tarefa'] . '</td>';
																					
							
                        echo '</tr>';
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


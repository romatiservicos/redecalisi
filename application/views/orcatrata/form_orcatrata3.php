<?php if (isset($msg)) echo $msg; ?>


<div class="container-fluid">
	<div class="row">

		<div class="col-md-1"></div>
		<div class="col-md-10 ">

			<?php echo validation_errors(); ?>

			<div class="panel panel-<?php echo $panel; ?>">

				<div class="panel-heading"><strong><?php echo $titulo; ?></strong></div>
				<div class="panel-body">

					<?php echo form_open_multipart($form_open_path); ?>
							<!--
							<div class="text-left t">
								<h4><?php echo '<strong>Prof.: ' . $_SESSION['log']['Nome'] . '</strong>' ?></h4>
							</div>
							-->
					<!--App_OrcaTrata-->
						<div class="form-group">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<div class="row">										
										<div class="col-md-4">
											<label for="idApp_Cliente">Cliente *</label>
											<select data-placeholder="Selecione uma op��o..." class="form-control Chosen" <?php echo $readonly; ?>
													id="idApp_Cliente" name="idApp_Cliente">
												<option value="">-- Sel. um Cliente --</option>
												<?php
												foreach ($select['idApp_Cliente'] as $key => $row) {
													if ($orcatrata['idApp_Cliente'] == $key) {
														echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
													} else {
														echo '<option value="' . $key . '">' . $row . '</option>';
													}
												}
												?>
											</select>
										</div>
										<div class="col-md-4">
											<label for="Orcamento">Or�amento</label>
											<select data-placeholder="Selecione uma op��o..." class="form-control Chosen" <?php echo $readonly; ?>
													id="Orcamento" name="Orcamento">
												<option value="">-- Sel. um Or�am. --</option>
												<?php
												foreach ($select['Orcamento'] as $key => $row) {
													if ($orcatrata['Orcamento'] == $key) {
														echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
													} else {
														echo '<option value="' . $key . '">' . $row . '</option>';
													}
												}
												?>
											</select>
										</div>
										<div class="col-md-4">
											<label for="TipoDevolucao">Tipo de Devolu��o</label>
											<select data-placeholder="Selecione uma op��o..." class="form-control Chosen" <?php echo $readonly; ?>
													id="TipoDevolucao" name="TipoDevolucao">
												<option value="">-- Sel. Tipo de Devolu��o --</option>
												<?php
												foreach ($select['TipoDevolucao'] as $key => $row) {
													if ($orcatrata['TipoDevolucao'] == $key) {
														echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
													} else {
														echo '<option value="' . $key . '">' . $row . '</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
							<div class="panel panel-primary">
								<div class="panel-heading collapsed" role="tab" id="heading1" data-toggle="collapse" data-parent="#accordion1" data-target="#collapse1" aria-expanded="false">
									<h4 class="panel-title">
										<a class="accordion-toggle">
											<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
											Produtos & Servi�os
										</a>
									</h4>
								</div>

								<div id="collapse1" class="panel-collapse" role="tabpanel" aria-labelledby="heading1" aria-expanded="false">
									<div class="panel-body">

										<!--#######################################-->

										<input type="hidden" name="SCount" id="SCount" value="<?php echo $count['SCount']; ?>"/>

										<div class="input_fields_wrap">

										<?php
										for ($i=1; $i <= $count['SCount']; $i++) {
										?>

										<?php if ($metodo > 1) { ?>
										<input type="hidden" name="idApp_ServicoVenda<?php echo $i ?>" value="<?php echo $servico[$i]['idApp_ServicoVenda']; ?>"/>
										<?php } ?>

										<div class="form-group" id="1div<?php echo $i ?>">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
														<div class="col-md-2">
															<label for="QtdVendaServico">Qtd:</label>
															<input type="text" class="form-control Numero" maxlength="3" id="QtdVendaServico<?php echo $i ?>" placeholder="0"
																	onkeyup="calculaSubtotal(this.value,this.name,'<?php echo $i ?>','QTD','Servico')"
																	autofocus name="QtdVendaServico<?php echo $i ?>" value="<?php echo $servico[$i]['QtdVendaServico'] ?>">
														</div>
														<div class="col-md-4">
															<label for="idTab_Servico">Servi�o:</label>
															<?php if ($i == 1) { ?>
															<!--<a class="btn btn-xs btn-info" href="<?php echo base_url() ?>servico/cadastrar/servico" role="button">
																<span class="glyphicon glyphicon-plus"></span> <b>Novo Servi�o</b>
															</a>-->
															<?php } ?>
															<select data-placeholder="Selecione uma op��o..." class="form-control" onchange="buscaValor(this.value,this.name,'Servico',<?php echo $i ?>)" <?php echo $readonly; ?>
																	id="lista" name="idTab_Servico<?php echo $i ?>">
																<option value="">-- Selecione uma op��o --</option>
																<?php
																foreach ($select['Servico'] as $key => $row) {
																	if ($servico[$i]['idTab_Servico'] == $key) {
																		echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
																	} else {
																		echo '<option value="' . $key . '">' . $row . '</option>';
																	}
																}
																?>
															</select>
														</div>
														<div class="col-md-3">
															<label for="ValorVendaServico">Valor do Servi�o:</label>
															<div class="input-group" id="txtHint">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" id="idTab_Servico<?php echo $i ?>" maxlength="10" placeholder="0,00"
																	onkeyup="calculaSubtotal(this.value,this.name,'<?php echo $i ?>','VP','Servico')"
																	name="ValorVendaServico<?php echo $i ?>" value="<?php echo $servico[$i]['ValorVendaServico'] ?>">
															</div>

														</div>
														<div class="col-md-3">
															<label for="SubtotalServico">Subtotal:</label>
															<div class="input-group">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalServico<?php echo $i ?>"
																	   name="SubtotalServico<?php echo $i ?>" value="<?php echo $servico[$i]['SubtotalServico'] ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<label for="ObsServico<?php echo $i ?>">Obs:</label><br>
															<input type="text" class="form-control" id="ObsServico<?php echo $i ?>" maxlength="250"
																   name="ObsServico<?php echo $i ?>" value="<?php echo $servico[$i]['ObsServico'] ?>">
														</div>
														<div class="col-md-3">
															<label for="ConcluidoServico">Conclu�do? </label><br>
															<div class="form-group">
																<div class="btn-group" data-toggle="buttons">
																	<?php
																	foreach ($select['ConcluidoServico'] as $key => $row) {
																		(!$servico[$i]['ConcluidoServico']) ? $servico[$i]['ConcluidoServico'] = 'N' : FALSE;

																		if ($servico[$i]['ConcluidoServico'] == $key) {
																			echo ''
																			. '<label class="btn btn-warning active" name="radiobutton_ConcluidoServico' . $i . '" id="radiobutton_ConcluidoServico' . $i .  $key . '">'
																			. '<input type="radio" name="ConcluidoServico' . $i . '" id="radiobuttondinamico" '
																			. 'autocomplete="off" value="' . $key . '" checked>' . $row
																			. '</label>'
																			;
																		} else {
																			echo ''
																			. '<label class="btn btn-default" name="radiobutton_ConcluidoServico' . $i . '" id="radiobutton_ConcluidoServico' . $i .  $key . '">'
																			. '<input type="radio" name="ConcluidoServico' . $i . '" id="radiobuttondinamico" '
																			. 'autocomplete="off" value="' . $key . '" >' . $row
																			. '</label>'
																			;
																		}
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="col-md-2">
															<label><br></label><br>
															<button type="button" id="<?php echo $i ?>" class="remove_field btn btn-danger">
																<span class="glyphicon glyphicon-trash"></span>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>

										<?php
										}
										?>

										</div>
										<!--
										<div class="form-group">
											<div class="row">
												<div class="col-md-3"></div>
												<div class="col-md-3 text-left">
													<a class="btn btn-md btn-danger" onclick="adicionaServico()">
														<span class="glyphicon glyphicon-plus"></span> Servi�os
													</a>
												</div>
											</div>
										</div>

										<hr>
										-->
										<input type="hidden" name="PCount" id="PCount" value="<?php echo $count['PCount']; ?>"/>

										<div class="input_fields_wrap2">

										<?php
										for ($i=1; $i <= $count['PCount']; $i++) {
										?>

										<?php if ($metodo > 1) { ?>
										<input type="hidden" name="idApp_ProdutoVenda<?php echo $i ?>" value="<?php echo $produto[$i]['idApp_ProdutoVenda']; ?>"/>
										<?php } ?>

										<div class="form-group" id="2div<?php echo $i ?>">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
														<div class="col-md-1">
															<label for="QtdVendaProduto">Qtd<?php echo $i ?>:</label>
															<input type="text" class="form-control Numero" maxlength="3" id="QtdVendaProduto<?php echo $i ?>" placeholder="0"
																	onkeyup="calculaSubtotal(this.value,this.name,'<?php echo $i ?>','QTD','Produto')"
																	autofocus name="QtdVendaProduto<?php echo $i ?>" value="<?php echo $produto[$i]['QtdVendaProduto'] ?>">
														</div>
														<div class="col-md-4">
															<label for="idTab_Produto">Produto:</label>
															<?php if ($i == 1) { ?>
															<!--<a class="btn btn-xs btn-info" href="<?php echo base_url() ?>produto/cadastrar/produto" role="button">
																<span class="glyphicon glyphicon-plus"></span> <b>Novo Produto</b>
															</a>-->
															<?php } ?>
															<select data-placeholder="Selecione uma op��o..." class="form-control Chosen" onchange="buscaValor2Tabelas(this.value,this.name,'Valor',<?php echo $i ?>,'Produto')" <?php echo $readonly; ?>
																	 id="listadinamicab<?php echo $i ?>" name="idTab_Produto<?php echo $i ?>">
																<option value="">-- Selecione uma op��o --</option>
																<?php
																foreach ($select['Produto'] as $key => $row) {
																	if ($produto[$i]['idTab_Produto'] == $key) {
																		echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
																	} else {
																		echo '<option value="' . $key . '">' . $row . '</option>';
																	}
																}
																?>
															</select>
														</div>

														<div class="col-md-2">
															<label for="ValorVendaProduto">Valor do Produto:</label>
															<div class="input-group">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" id="idTab_Produto<?php echo $i ?>" maxlength="10" placeholder="0,00"
																	onkeyup="calculaSubtotal(this.value,this.name,'<?php echo $i ?>','VP','Produto')"
																	name="ValorVendaProduto<?php echo $i ?>" value="<?php echo $produto[$i]['ValorVendaProduto'] ?>">
															</div>
														</div>
														<div class="col-md-2">
															<label for="SubtotalProduto">Subtotal:</label>
															<div class="input-group">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalProduto<?php echo $i ?>"
																	   name="SubtotalProduto<?php echo $i ?>" value="<?php echo $produto[$i]['SubtotalProduto'] ?>">
															</div>
														</div>
														<div class="col-md-2">
															<label for="DataValidadeProduto<?php echo $i ?>">Val. do Produto:</label>
															<div class="input-group <?php echo $datepicker; ?>">
																<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																	   name="DataValidadeProduto<?php echo $i ?>" value="<?php echo $produto[$i]['DataValidadeProduto']; ?>">
																<span class="input-group-addon" disabled>
																	<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
														<div class="col-md-1">
															<label><br></label><br>
															<button type="button" id="<?php echo $i ?>" class="remove_field2 btn btn-danger">
																<span class="glyphicon glyphicon-trash"></span>
															</button>
														</div>														
													</div>
												</div>
											</div>
										</div>

										<?php
										}
										?>

										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<a class="add_field_button2 btn btn-warning">
														<span class="glyphicon glyphicon-plus"></span> Adic. Produtos
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>		
						</div>
						
						<div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
							<div class="panel panel-primary">
								<div class="panel-heading collapsed" role="tab" id="heading4" data-toggle="collapse" data-parent="#accordion4" data-target="#collapse4" aria-expanded="false">								<h4 class="panel-title">
										<a class="accordion-toggle">
											<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
											Or�amento & Forma de Pagam.
										</a>
									</h4>
								</div>

								<div id="collapse4" class="panel-collapse" role="tabpanel" aria-labelledby="heading4" aria-expanded="false">
									<div class="panel-body">
										<div class="form-group">
											<div class="panel panel-danger">
												<div class="panel-heading">
													<div class="row">
														<div class="col-md-3">
															<label for="ValorOrca">Devolu��o:</label><br>
															<div class="input-group" id="txtHint">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" id="ValorOrca" maxlength="10" placeholder="0,00"
																	   name="ValorOrca" value="<?php echo $orcatrata['ValorOrca'] ?>">
															</div>
														</div>

														<div class="col-md-3">
															<label for="ValorEntradaOrca">Desconto</label><br>
															<div class="input-group" id="txtHint">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" id="ValorEntradaOrca" maxlength="10" placeholder="0,00"
																	onkeyup="calculaResta(this.value)"
																	name="ValorEntradaOrca" value="<?php echo $orcatrata['ValorEntradaOrca'] ?>">
															</div>
														</div>

														<div class="col-md-3">
															<label for="ValorRestanteOrca">Resta Pagar:</label><br>
															<div class="input-group" id="txtHint">
																<span class="input-group-addon" id="basic-addon1">R$</span>
																<input type="text" class="form-control Valor" id="ValorRestanteOrca" maxlength="10" placeholder="0,00" readonly=""
																	   name="ValorRestanteOrca" value="<?php echo $orcatrata['ValorRestanteOrca'] ?>">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<div class="panel panel-danger">
												<div class="panel-heading">
													<div class="row">
														<div class="col-md-3">
															<label for="QtdParcelasOrca">Qtd. Parc.:</label><br>
															<input type="text" class="form-control Numero" id="QtdParcelasOrca" maxlength="3" placeholder="0"
																   name="QtdParcelasOrca" value="<?php echo $orcatrata['QtdParcelasOrca'] ?>">
														</div>
														<div class="col-md-3">
															<label for="FormaPagamento">Forma de Pagam.:</label>
															<select data-placeholder="Selecione uma op��o..." class="form-control" <?php echo $readonly; ?>
																	id="FormaPagamento" name="FormaPagamento">
																<option value="">-- Selecione uma op��o --</option>
																<?php
																foreach ($select['FormaPagamento'] as $key => $row) {
																	if ($orcatrata['FormaPagamento'] == $key) {
																		echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
																	} else {
																		echo '<option value="' . $key . '">' . $row . '</option>';
																	}
																}
																?>
															</select>
														</div>
														<div class="col-md-3">
															<label for="DataVencimentoOrca">1� Venc.</label>
															<div class="input-group <?php echo $datepicker; ?>">
																<input type="text" class="form-control Date" id="DataVencimentoOrca" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																	   name="DataVencimentoOrca" value="<?php echo $orcatrata['DataVencimentoOrca']; ?>">
																<span class="input-group-addon" disabled>
																	<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
														<br>
														<div class="form-group">
															<div class="col-md-3 text-left">
																<button class="btn btn-danger" type="button" data-toggle="collapse" onclick="calculaParcelas()"
																		data-target="#Parcelas" aria-expanded="false" aria-controls="Parcelas">
																	<span class="glyphicon glyphicon-menu-down"></span> Gerar Parcelas
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>															
				<!--#######################################-->
						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="heading2" data-toggle="collapse" data-parent="#accordion2" data-target="#collapse2">
									<h4 class="panel-title">
										<a class="accordion-toggle">
											<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
											Parcelas
										</a>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse" role="tabpanel" aria-labelledby="heading2" aria-expanded="false">
									
									<div class="panel-body">
										<!--App_parcelasRec-->
										<div class="input_fields_parcelas">

										<?php
										for ($i=1; $i <= $orcatrata['QtdParcelasOrca']; $i++) {
										?>

											<?php if ($metodo > 1) { ?>
											<input type="hidden" name="idApp_ParcelasRecebiveis<?php echo $i ?>" value="<?php echo $parcelasrec[$i]['idApp_ParcelasRecebiveis']; ?>"/>
											<?php } ?>


											<div class="form-group">
												<div class="panel panel-info">
													<div class="panel-heading">
														<div class="row">
															<div class="col-md-2">
																<label for="ParcelaRecebiveis">Parcela:</label><br>
																<input type="text" class="form-control" maxlength="6" readonly=""
																	   name="ParcelaRecebiveis<?php echo $i ?>" value="<?php echo $parcelasrec[$i]['ParcelaRecebiveis'] ?>">
															</div>
															<div class="col-md-2">
																<label for="ValorParcelaRecebiveis">Valor Parcela:</label><br>
																<div class="input-group" id="txtHint">
																	<span class="input-group-addon" id="basic-addon1">R$</span>
																	<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" id="ValorParcelaRecebiveis<?php echo $i ?>"
																		   name="ValorParcelaRecebiveis<?php echo $i ?>" value="<?php echo $parcelasrec[$i]['ValorParcelaRecebiveis'] ?>">
																</div>
															</div>
															<div class="col-md-2">
																<label for="DataVencimentoRecebiveis">Data Venc. Parc.</label>
																<div class="input-group DatePicker">
																	<input type="text" class="form-control Date" id="DataVencimentoRecebiveis<?php echo $i ?>" maxlength="10" placeholder="DD/MM/AAAA"
																		   name="DataVencimentoRecebiveis<?php echo $i ?>" value="<?php echo $parcelasrec[$i]['DataVencimentoRecebiveis'] ?>">
																	<span class="input-group-addon" disabled>
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
															<div class="col-md-2">
																<label for="ValorPagoRecebiveis">Valor Pago:</label><br>
																<div class="input-group" id="txtHint">
																	<span class="input-group-addon" id="basic-addon1">R$</span>
																	<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" id="ValorPagoRecebiveis<?php echo $i ?>"
																		   name="ValorPagoRecebiveis<?php echo $i ?>" value="<?php echo $parcelasrec[$i]['ValorPagoRecebiveis'] ?>">
																</div>
															</div>
															<div class="col-md-2">
																<label for="DataPagoRecebiveis">Data Pag.</label>
																<div class="input-group DatePicker">
																	<input type="text" class="form-control Date" id="DataPagoRecebiveis<?php echo $i ?>" maxlength="10" placeholder="DD/MM/AAAA"
																		   name="DataPagoRecebiveis<?php echo $i ?>" value="<?php echo $parcelasrec[$i]['DataPagoRecebiveis'] ?>">
																	<span class="input-group-addon" disabled>
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
															<div class="col-md-2">
																<label for="QuitadoRecebiveis">Quitado????</label><br>
																<div class="form-group">
																	<div class="btn-group" data-toggle="buttons">
																		<?php
																		foreach ($select['QuitadoRecebiveis'] as $key => $row) {
																			(!$parcelasrec[$i]['QuitadoRecebiveis']) ? $parcelasrec[$i]['QuitadoRecebiveis'] = 'N' : FALSE;

																			if ($parcelasrec[$i]['QuitadoRecebiveis'] == $key) {
																				echo ''
																				. '<label class="btn btn-warning active" name="radiobutton_QuitadoRecebiveis' . $i . '" id="radiobutton_QuitadoRecebiveis' . $i .  $key . '">'
																				. '<input type="radio" name="QuitadoRecebiveis' . $i . '" id="radiobuttondinamico" '
																				. 'onchange="carregaQuitado(this.value,this.name,'.$i.')" '
																				. 'autocomplete="off" value="' . $key . '" checked>' . $row
																				. '</label>'
																				;
																			} else {
																				echo ''
																				. '<label class="btn btn-default" name="radiobutton_QuitadoRecebiveis' . $i . '" id="radiobutton_QuitadoRecebiveis' . $i .  $key . '">'
																				. '<input type="radio" name="QuitadoRecebiveis' . $i . '" id="radiobuttondinamico" '
																				. 'onchange="carregaQuitado(this.value,this.name,'.$i.')" '
																				. 'autocomplete="off" value="' . $key . '" >' . $row
																				. '</label>'
																				;
																			}
																		}
																		?>
																	</div>
																</div>
															</div>															
														</div>
													</div>
												</div>
											</div>

										<?php
										}
										?>
										</div>

									</div>
								</div>
							</div>
						</div>
						
						<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
							<div class="panel panel-primary">
								 <div class="panel-heading" role="tab" id="heading3" data-toggle="collapse" data-parent="#accordion3" data-target="#collapse3">
									<h4 class="panel-title">
										<a class="accordion-toggle">
											<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
											Procedimentos
										</a>
									</h4>
								</div>

								<div id="collapse3" class="panel-collapse" role="tabpanel" aria-labelledby="heading3" aria-expanded="false">
									<div class="panel-body">

										<input type="hidden" name="PMCount" id="PMCount" value="<?php echo $count['PMCount']; ?>"/>

										<div class="input_fields_wrap3">

										<?php
										for ($i=1; $i <= $count['PMCount']; $i++) {
										?>

										<?php if ($metodo > 1) { ?>
										<input type="hidden" name="idApp_Procedimento<?php echo $i ?>" value="<?php echo $procedimento[$i]['idApp_Procedimento']; ?>"/>
										<?php } ?>

										<div class="form-group" id="3div<?php echo $i ?>">
											<div class="panel panel-info">
												<div class="panel-heading">
													<div class="row">
														<!--
														<div class="col-md-3">
															<label for="Profissional<?php echo $i ?>">Profissional:</label>
															<?php if ($i == 1) { ?>
															<?php } ?>
															<select data-placeholder="Selecione uma op��o..." class="form-control"
																	 id="listadinamicac<?php echo $i ?>" name="Profissional<?php echo $i ?>">
																<option value="">-- Selecione uma op��o --</option>
																<?php
																foreach ($select['Profissional'] as $key => $row) {
																	if ($procedimento[$i]['Profissional'] == $key) {
																		echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
																	} else {
																		echo '<option value="' . $key . '">' . $row . '</option>';
																	}
																}
																?>
															</select>
														</div>
														-->

														<div class="col-md-4">
															<label for="Procedimento<?php echo $i ?>">Procedimento:</label>
															<textarea class="form-control" id="Procedimento<?php echo $i ?>" <?php echo $readonly; ?>
																	  name="Procedimento<?php echo $i ?>"><?php echo $procedimento[$i]['Procedimento']; ?></textarea>
														</div>
														<div class="col-md-3">
															<label for="DataProcedimento<?php echo $i ?>">Data do Proced.:</label>
															<div class="input-group <?php echo $datepicker; ?>">
																<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																	   name="DataProcedimento<?php echo $i ?>" value="<?php echo $procedimento[$i]['DataProcedimento']; ?>">
																<span class="input-group-addon" disabled>
																	<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
														<div class="col-md-3">
															<label for="ConcluidoProcedimento">Proc. Concl.? </label><br>
															<div class="form-group">
																<div class="btn-group" data-toggle="buttons">
																	<?php
																	foreach ($select['ConcluidoProcedimento'] as $key => $row) {
																		(!$procedimento[$i]['ConcluidoProcedimento']) ? $procedimento[$i]['ConcluidoProcedimento'] = 'N' : FALSE;

																		if ($procedimento[$i]['ConcluidoProcedimento'] == $key) {
																			echo ''
																			. '<label class="btn btn-warning active" name="radiobutton_ConcluidoProcedimento' . $i . '" id="radiobutton_ConcluidoProcedimento' . $i .  $key . '">'
																			. '<input type="radio" name="ConcluidoProcedimento' . $i . '" id="radiobuttondinamico" '
																			. 'autocomplete="off" value="' . $key . '" checked>' . $row
																			. '</label>'
																			;
																		} else {
																			echo ''
																			. '<label class="btn btn-default" name="radiobutton_ConcluidoProcedimento' . $i . '" id="radiobutton_ConcluidoProcedimento' . $i .  $key . '">'
																			. '<input type="radio" name="ConcluidoProcedimento' . $i . '" id="radiobuttondinamico" '
																			. 'autocomplete="off" value="' . $key . '" >' . $row
																			. '</label>'
																			;
																		}
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="col-md-2">
															<label><br></label><br>
															<button type="button" id="<?php echo $i ?>" class="remove_field3 btn btn-danger">
																<span class="glyphicon glyphicon-trash"></span>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>

										<?php
										}
										?>

										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<a class="add_field_button3 btn btn btn-warning" onclick="adicionaProcedimento()">
														<span class="glyphicon glyphicon-plus"></span> Adicionar Procedimento
													</a>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						
						<div class="panel-group" id="accordion8" role="tablist" aria-multiselectable="true">
							<div class="panel panel-primary">
								<div class="panel-heading collapsed" role="tab" id="heading8" data-toggle="collapse" data-parent="#accordion8" data-target="#collapse8" aria-expanded="false">								<h4 class="panel-title">
										<a class="accordion-toggle">
											<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
											Status da Devolu��o
										</a>
									</h4>
								</div>

								<div id="collapse8" class="panel-collapse" role="tabpanel" aria-labelledby="heading8" aria-expanded="false">
									<div class="panel-body">
										<div class="form-group">
											<div class="panel panel-danger">
												<div class="panel-heading">
													<div class="col-md-1"></div>
													<div class="form-group text-center">
														<div class="row">
															<div class="col-md-3 form-inline">
																<label for="AprovadoOrca">Apr.(Fech)?</label><br>
																<div class="form-group">
																	<div class="btn-group" data-toggle="buttons">
																		<?php
																		foreach ($select['AprovadoOrca'] as $key => $row) {
																			if (!$orcatrata['AprovadoOrca'])
																				$orcatrata['AprovadoOrca'] = 'N';

																			($key == 'S') ? $hideshow = 'showradio' : $hideshow = 'hideradio';

																			if ($orcatrata['AprovadoOrca'] == $key) {
																				echo ''
																				. '<label class="btn btn-warning active" name="AprovadoOrca_' . $hideshow . '">'
																				. '<input type="radio" name="AprovadoOrca" id="' . $hideshow . '" '
																				. 'autocomplete="off" value="' . $key . '" checked>' . $row
																				. '</label>'
																				;
																			} else {
																				echo ''
																				. '<label class="btn btn-default" name="AprovadoOrca_' . $hideshow . '">'
																				. '<input type="radio" name="AprovadoOrca" id="' . $hideshow . '" '
																				. 'autocomplete="off" value="' . $key . '" >' . $row
																				. '</label>'
																				;
																			}
																		}
																		?>

																	</div>
																</div>
															</div>
															<div class="col-md-3 form-inline">
																<label for="ServicoConcluido">Conclu�do?</label><br>
																<div class="form-group">
																	<div class="btn-group" data-toggle="buttons">
																		<?php
																		foreach ($select['ServicoConcluido'] as $key => $row) {
																			(!$orcatrata['ServicoConcluido']) ? $orcatrata['ServicoConcluido'] = 'N' : FALSE;

																			if ($orcatrata['ServicoConcluido'] == $key) {
																				echo ''
																				. '<label class="btn btn-warning active" name="radiobutton_ServicoConcluido" id="radiobutton_ServicoConcluido' . $key . '">'
																				. '<input type="radio" name="ServicoConcluido" id="radiobutton" '
																				. 'autocomplete="off" value="' . $key . '" checked>' . $row
																				. '</label>'
																				;
																			} else {
																				echo ''
																				. '<label class="btn btn-default" name="radiobutton_ServicoConcluido" id="radiobutton_ServicoConcluido' . $key . '">'
																				. '<input type="radio" name="ServicoConcluido" id="radiobutton" '
																				. 'autocomplete="off" value="' . $key . '" >' . $row
																				. '</label>'
																				;
																			}
																		}
																		?>
																	</div>
																</div>
															</div>								
															<div class="col-md-3 form-inline">
																<label for="QuitadoOrca">Quitada?</label><br>
																<div class="form-group">
																	<div class="btn-group" data-toggle="buttons">
																		<?php
																		foreach ($select['QuitadoOrca'] as $key => $row) {
																			(!$orcatrata['QuitadoOrca']) ? $orcatrata['QuitadoOrca'] = 'N' : FALSE;

																			if ($orcatrata['QuitadoOrca'] == $key) {
																				echo ''
																				. '<label class="btn btn-warning active" name="radiobutton_QuitadoOrca" id="radiobutton_QuitadoOrca' . $key . '">'
																				. '<input type="radio" name="QuitadoOrca" id="radiobutton" '
																				. 'autocomplete="off" value="' . $key . '" checked>' . $row
																				. '</label>'
																				;
																			} else {
																				echo ''
																				. '<label class="btn btn-default" name="radiobutton_QuitadoOrca" id="radiobutton_QuitadoOrca' . $key . '">'
																				. '<input type="radio" name="QuitadoOrca" id="radiobutton" '
																				. 'autocomplete="off" value="' . $key . '" >' . $row
																				. '</label>'
																				;
																			}
																		}
																		?>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-1"></div>
													<div class="form-group text-center">
														<div class="row">
															<div class="col-md-3">
																<label for="DataOrca">Devolu��o em:</label>
																<div class="input-group <?php echo $datepicker; ?>">
																	<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																			name="DataOrca" value="<?php echo $orcatrata['DataOrca']; ?>">
																	<span class="input-group-addon" disabled>
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
															<div class="col-md-3">
																<label for="DataConclusao">Conclu�do em:</label>
																<div class="input-group <?php echo $datepicker; ?>">
																	<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																		   name="DataConclusao" value="<?php echo $orcatrata['DataConclusao']; ?>">
																	<span class="input-group-addon" disabled>
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
															<div class="col-md-3">
																<label for="DataQuitado">Quitado em:</label>
																<div class="input-group <?php echo $datepicker; ?>">
																	<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																		   name="DataQuitado" value="<?php echo $orcatrata['DataQuitado']; ?>">
																	<span class="input-group-addon" disabled>
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
															<!--
															<div class="form-group text-center">
																<div id="AprovadoOrca" <?php echo $div['AprovadoOrca']; ?>>
																	<div class="col-md-3 form-inline">
																		<label for="QuitadoOrca">Or�am. Quitado?</label><br>
																		<div class="form-group">
																			<div class="btn-group" data-toggle="buttons">
																				<?php
																				foreach ($select['QuitadoOrca'] as $key => $row) {
																					(!$orcatrata['QuitadoOrca']) ? $orcatrata['QuitadoOrca'] = 'N' : FALSE;

																					if ($orcatrata['QuitadoOrca'] == $key) {
																						echo ''
																						. '<label class="btn btn-warning active" name="radiobutton_QuitadoOrca" id="radiobutton_QuitadoOrca' . $key . '">'
																						. '<input type="radio" name="QuitadoOrca" id="radiobutton" '
																						. 'autocomplete="off" value="' . $key . '" checked>' . $row
																						. '</label>'
																						;
																					} else {
																						echo ''
																						. '<label class="btn btn-default" name="radiobutton_QuitadoOrca" id="radiobutton_QuitadoOrca' . $key . '">'
																						. '<input type="radio" name="QuitadoOrca" id="radiobutton" '
																						. 'autocomplete="off" value="' . $key . '" >' . $row
																						. '</label>'
																						;
																					}
																				}
																				?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															-->
														</div>
													</div>
													<div class="col-md-1"></div>
													<div class="form-group text-center">
														<div class="row">
															<div class="col-md-6">
															<label for="ObsOrca">OBS:</label>
																<textarea class="form-control" id="ObsOrca" <?php echo $readonly; ?>
																		  name="ObsOrca"><?php echo $orcatrata['ObsOrca']; ?></textarea>
															</div>
															<div class="col-md-3">
																<label for="DataRetorno">Retornar em:</label>
																<div class="input-group <?php echo $datepicker; ?>">
																	<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
																		   name="DataRetorno" value="<?php echo $orcatrata['DataRetorno']; ?>">
																	<span class="input-group-addon" disabled>
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	

						<!--
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="DataEntradaOrca">Validade do Or�.:</label>
									<div class="input-group <?php echo $datepicker; ?>">
										<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
											   name="DataEntradaOrca" value="<?php echo $orcatrata['DataEntradaOrca']; ?>">
										<span class="input-group-addon" disabled>
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<label for="DataPrazo">Prazo de Entrega:</label>
									<div class="input-group <?php echo $datepicker; ?>">
										<input type="text" class="form-control Date" <?php echo $readonly; ?> maxlength="10" placeholder="DD/MM/AAAA"
												name="DataPrazo" value="<?php echo $orcatrata['DataPrazo']; ?>">
										<span class="input-group-addon" disabled>
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>

							</div>
						</div>

						<hr>
						-->
						
						<div class="form-group">
							<div class="row">
								<!--<input type="hidden" name="idApp_Cliente" value="<?php echo $_SESSION['Cliente']['idApp_Cliente']; ?>">-->
								<input type="hidden" name="idApp_OrcaTrata" value="<?php echo $orcatrata['idApp_OrcaTrata']; ?>">
								<?php if ($metodo > 1) { ?>
								<!--<input type="hidden" name="idApp_Procedimento" value="<?php echo $procedimento['idApp_Procedimento']; ?>">
								<input type="hidden" name="idApp_ParcelasRec" value="<?php echo $parcelasrec['idApp_ParcelasRec']; ?>">-->
								<?php } ?>
								<?php if ($metodo == 2) { ?>
									<!--
									<div class="col-md-12 text-center">
										<button class="btn btn-lg btn-danger" id="inputDb" data-loading-text="Aguarde..." name="submit" value="1" type="submit">
											<span class="glyphicon glyphicon-trash"></span> Excluir
										</button>
										<button class="btn btn-lg btn-warning" id="inputDb" onClick="history.go(-1);
													return true;">
											<span class="glyphicon glyphicon-ban-circle"></span> Cancelar
										</button>
									</div>
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-trash"></span> Confirmar Exclus�o
									</button>                        -->

									<div class="col-md-6">
										<button class="btn btn-lg btn-primary" id="inputDb" data-loading-text="Aguarde..." type="submit">
											<span class="glyphicon glyphicon-save"></span> Salvar
										</button>
									</div>
									<div class="col-md-6 text-right">
										<button  type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-loading-text="Aguarde..." data-target=".bs-excluir-modal-sm">
											<span class="glyphicon glyphicon-trash"></span> Excluir
										</button>
									</div>

									<div class="modal fade bs-excluir-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header bg-danger">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Tem certeza que deseja excluir?</h4>
												</div>
												<div class="modal-body">
													<p>Ao confirmar esta opera��o todos os dados ser�o exclu�dos permanentemente do sistema.
														Esta opera��o � irrevers�vel.</p>
												</div>
												<div class="modal-footer">
													<div class="col-md-6 text-left">
														<button type="button" class="btn btn-warning" data-dismiss="modal">
															<span class="glyphicon glyphicon-ban-circle"></span> Cancelar
														</button>
													</div>
													<div class="col-md-6 text-right">
														<a class="btn btn-danger" href="<?php echo base_url() . 'orcatrata/excluir/' . $orcatrata['idApp_OrcaTrata'] ?>" role="button">
															<span class="glyphicon glyphicon-trash"></span> Confirmar Exclus�o
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } else { ?>
									<div class="col-md-6">
										<button class="btn btn-lg btn-primary" id="inputDb" data-loading-text="Aguarde..." type="submit">
											<span class="glyphicon glyphicon-save"></span> Salvar
										</button>
									</div>

								<?php } ?>
							</div>
						</div>

						</form>

				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

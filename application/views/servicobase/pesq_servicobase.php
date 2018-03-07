<?php if (isset($msg)) echo $msg; ?>

<div class="container-fluid">	
	<div class="row">

		<div class="col-md-2"></div>
		<div class="col-md-8">

			<?php echo validation_errors(); ?>

			<div class="panel panel-primary">

				<div class="panel-heading"><strong><?php echo $titulo; ?></strong></div>
				<div class="panel-body">

					<?php echo form_open($form_open_path, 'role="form"'); ?>
						<div class="row">
							<!--
							<div class="col-md-2">
								<label for="TipoServicoBase">Tipo de Servico</label>								
								<select data-placeholder="Selecione uma opção..." class="form-control" <?php echo $readonly; ?>
										id="TipoServicoBase" autofocus name="TipoServicoBase">
									<option value="">-- Sel. Tipo de Servico --</option>
									<?php
									foreach ($select['TipoServicoBase'] as $key => $row) {
										(!$query['TipoServicoBase']) ? $query['TipoServicoBase'] = 'V' : FALSE;
										if ($query['TipoServicoBase'] == $key) {
											echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
										} else {
											echo '<option value="' . $key . '">' . $row . '</option>';
										}
									}
									?>
								</select>
							</div>
							-->
							<div class="col-md-5">
								<label for="ServicoBase">Nome do Serviço:*</label><br>
								<input type="text" class="form-control" maxlength="200"
										name="ServicoBase" value="<?php echo $query['ServicoBase'] ?>">
							</div>
							<div class="col-md-3">
								<label for="CodServ">Cod. Serv.:</label><br>
								<input type="text" class="form-control" maxlength="200"
										name="CodServ" value="<?php echo $query['CodServ'] ?>">
							</div>
						</div>
						<br>                
						<div class="form-group">
							<div class="row">
								<input type="hidden" name="idTab_ServicoBase" value="<?php echo $query['idTab_ServicoBase']; ?>">
								<?php if ($metodo == 2) { ?>

									<div class="col-md-6">
										<button class="btn btn-lg btn-primary" id="inputDb" data-loading-text="Aguarde..." type="submit">
											<span class="glyphicon glyphicon-save"></span> Salvar
										</button>
									</div>
									<div class="col-md-3 text-right">											
										<a class="btn btn-lg btn-warning" href="<?php echo base_url() ?>servico/cadastrar" role="button" type="submit"> 
											<span class="glyphicon glyphicon-list"></span> Plano & <span class="glyphicon glyphicon-usd"></span>Preco de Venda
										</a>
									</div>
									<div class="col-md-3 text-right">
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
													<p>Ao confirmar esta operação todos os dados serão excluídos permanentemente do sistema.
														Esta operação é irreversível.</p>
												</div>
												<div class="modal-footer">
													<div class="col-md-6 text-left">
														<button type="button" class="btn btn-warning" data-dismiss="modal">
															<span class="glyphicon glyphicon-ban-circle"></span> Cancelar
														</button>
													</div>
													<div class="col-md-6 text-right">
														<a class="btn btn-danger" href="<?php echo base_url() . 'servicobase/excluir/' . $query['idTab_ServicoBase'] ?>" role="button">
															<span class="glyphicon glyphicon-trash"></span> Confirmar Exclusão
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
									<div class="col-md-3 text-right">											
										<a class="btn btn-lg btn-warning" href="<?php echo base_url() ?>servico/cadastrar" role="button" type="submit"> 
											<span class="glyphicon glyphicon-list"></span> Plano & <span class="glyphicon glyphicon-usd"></span>Preco de Venda
										</a>
									</div>								
								<?php } ?>
							</div>
						</div>                
					</form>

					<br>                
					
					<?php if (isset($list)) echo $list; ?>

				</div>

			</div>

		</div>
		<div class="col-md-2"></div>

	</div>
</div>
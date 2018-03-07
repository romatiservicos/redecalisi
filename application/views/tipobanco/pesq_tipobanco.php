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
							<div class="col-md-2">
								<label for="TipoBanco">Banco:*</label><br>
								<input type="text" class="form-control" maxlength="200"
									   autofocus name="TipoBanco" value="<?php echo $query['TipoBanco'] ?>">
							</div>
							<div class="col-md-2">
								<label for="AgTipoBanco">Agência:</label><br>
								<input type="text" class="form-control" maxlength="200"
									   autofocus name="AgTipoBanco" value="<?php echo $query['AgTipoBanco'] ?>">
							</div>
							<div class="col-md-3">
								<label for="ContaTipoBanco">Conta Corrente:</label><br>
								<input type="text" class="form-control" maxlength="200"
									   autofocus name="ContaTipoBanco" value="<?php echo $query['ContaTipoBanco'] ?>">
							</div>
							<div class="col-md-5">
								<label for="NomeTipoBanco">Nome do Favorecido:</label><br>
								<input type="text" class="form-control" maxlength="200"
									   autofocus name="NomeTipoBanco" value="<?php echo $query['NomeTipoBanco'] ?>">
							</div>
						</div>
						<br>               
						<div class="form-group">
							<div class="row">
								<input type="hidden" name="idTab_TipoBanco" value="<?php echo $query['idTab_TipoBanco']; ?>">
								<?php if ($metodo == 2) { ?>

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
														<a class="btn btn-danger" href="<?php echo base_url() . 'tipobanco/excluir/' . $query['idTab_TipoBanco'] ?>" role="button">
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
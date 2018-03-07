<?php if ($msg) echo $msg; ?>

<div class="container-fluid">
    <div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 ">


				<?php echo validation_errors(); ?>

				<div class="panel panel-primary">

					<div class="panel-heading"><strong><?php echo $titulo; ?></strong></div>
					<div class="panel-body">

						<?php echo form_open('relatorio/produtos', 'role="form"'); ?>

						<div class="form-group">
							<div class="row">
								
								<div class="col-md-7">
									<label for="Ordenamento">Desccri��o</label>
									<select data-placeholder="Selecione uma op��o..." class="form-control Chosen"
											id="Produtos" name="Produtos">
										<?php
										foreach ($select['Produtos'] as $key => $row) {
											if ($query['Produtos'] == $key) {
												echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
											} else {
												echo '<option value="' . $key . '">' . $row . '</option>';
											}
										}
										?>
									</select>
								</div>
	
								<div class="col-md-5">
									<label for="Ordenamento">Ordenamento:</label>

									<div class="form-group">
										<div class="row">
											<div class="col-md-7">
												<select data-placeholder="Selecione uma op��o..." class="form-control Chosen"
														id="Campo" name="Campo">
													<?php
													foreach ($select['Campo'] as $key => $row) {
														if ($query['Campo'] == $key) {
															echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
														} else {
															echo '<option value="' . $key . '">' . $row . '</option>';
														}
													}
													?>
												</select>
											</div>

											<div class="col-md-5">
												<select data-placeholder="Selecione uma op��o..." class="form-control Chosen"
														id="Ordenamento" name="Ordenamento">
													<?php
													foreach ($select['Ordenamento'] as $key => $row) {
														if ($query['Ordenamento'] == $key) {
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
							<div class="row">
								<div class="col-md-4">
									<label for="Ordenamento">Categoria</label>
									<select data-placeholder="Selecione uma op��o..." class="form-control Chosen"
											id="Prodaux3" name="Prodaux3">
										<?php
										foreach ($select['Prodaux3'] as $key => $row) {
											if ($query['Prodaux3'] == $key) {
												echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
											} else {
												echo '<option value="' . $key . '">' . $row . '</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="col-md-4">
									<label for="Ordenamento">Aux1</label>
									<select data-placeholder="Selecione uma op��o..." class="form-control Chosen"
											id="Prodaux1" name="Prodaux1">
										<?php
										foreach ($select['Prodaux1'] as $key => $row) {
											if ($query['Prodaux1'] == $key) {
												echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
											} else {
												echo '<option value="' . $key . '">' . $row . '</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="col-md-4">
									<label for="Ordenamento">Aux2</label>
									<select data-placeholder="Selecione uma op��o..." class="form-control Chosen"
											id="Prodaux2" name="Prodaux2">
										<?php
										foreach ($select['Prodaux2'] as $key => $row) {
											if ($query['Prodaux2'] == $key) {
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
						<div class="form-group">
							<div class="row">		
								<div class="col-md-2"></div>
								<div class="col-md-8 ">									
									<div class="col-md-6 text-left">
										<button class="btn btn-lg btn-primary " name="pesquisar" value="0" type="submit">
											<span class="glyphicon glyphicon-search"></span> Pesquisar
										</button>
									</div>
									<div class="col-md-6 text-right">											
											<a class="btn btn-lg btn-danger" href="<?php echo base_url() ?>produtos/cadastrar" role="button"> 
												<span class="glyphicon glyphicon-plus"></span> Novo Produto ou Servi�o
											</a>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>						
						</div>
						</form>
						<br>
						<?php echo (isset($list)) ? $list : FALSE ?>
					</div>
				</div>

		</div>	
		<div class="col-md-1"></div>			
    </div>
</div>

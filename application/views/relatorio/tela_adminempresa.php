<?php if ($msg) echo $msg; ?>


	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">

				<?php echo validation_errors(); ?>
				<?php echo form_open('relatorio/admin', 'role="form"'); ?>

				<div class="col-md-1"></div>
				<div class="col-md-5">

						<div class="panel panel-primary">
							<div class="panel-heading"><strong><?php echo $titulo1; ?></strong></div>
							<div class="panel-body">
								
								<div class="form-group">
									<div class="row">														

										<div class="col-md-10">
											<label for="">Pessoas & Empresas:</label>
											
											<div class="form-group col-md-10 text-left">
												<div class="row">																				
													<a class="btn btn-md btn-success" href="<?php echo base_url() ?>relatorio/clientes" role="button"> 
														<span class="glyphicon glyphicon-user"></span> Clientes
													</a>
												</div>
											</div>	
											<div class="form-group col-md-10 text-left">	
												<div class="row">		
													<a class="btn btn-md btn-success" href="<?php echo base_url() ?>relatorio/funcionario" role="button"> 
														<span class="glyphicon glyphicon-user"></span> Funcion�rios
													</a>
												</div>
											</div>	
											<div class="form-group col-md-10 text-left">	
												<div class="row">		
													<a class="btn btn-md btn-success" href="<?php echo base_url() ?>relatorio/fornecedor" role="button"> 
														<span class="glyphicon glyphicon-user"></span> Fornecedores
													</a>
												</div>	
											</div>																										
										</div>

										<div class="col-md-10">										
											<label for="">Produtos & Servi�os:</label>
											
											<div class="form-group col-md-10 text-left">
												<div class="row">													
													<a class="btn btn-md btn-primary" href="<?php echo base_url() ?>convenio/cadastrar" role="button"> 
														<span class="glyphicon glyphicon-qrcode"></span> Planos de Venda
													</a>
												</div>	
											</div>													
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a class="btn btn-md btn-primary" href="<?php echo base_url() ?>produtos/cadastrar" role="button"> 
														<span class="glyphicon glyphicon-qrcode"></span> Produtos
													</a>
												</div>	
											</div>													
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a class="btn btn-md btn-primary" href="<?php echo base_url() ?>servico/cadastrar" role="button"> 
														<span class="glyphicon glyphicon-qrcode"></span> Servi�os
													</a>											
												</div>	
											</div>													
										</div>

										<div class="col-md-10">											
											<label for="">Entradas & Sa�das:</label>
											
											<div class="form-group col-md-10 text-left">
												<div class="row">													
													<a class="btn btn-md btn-info" href="<?php echo base_url() ?>relatorio/clientes" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Or�amentos
													</a>
												</div>	
											</div>													
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a class="btn btn-md btn-info" href="<?php echo base_url() ?>despesas/cadastrar" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Despesas
													</a>
												</div>	
											</div>													
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a class="btn btn-md btn-info" href="<?php echo base_url() ?>consumo/cadastrar" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Consumo
													</a>											
												</div>	
											</div>											
										</div>																								

									</div>
								</div>
								</form>
							</div>
						</div>
	
				</div>	
				<div class="col-md-5">	

						<div class="panel panel-primary">
							<div class="panel-heading"><strong><?php echo $titulo2; ?></strong></div>
							<div class="panel-body">
								<div class="form-group">
									<div class="row">								
										<div class="col-md-10">											
											<label for="">Financeiro:</label>
											
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a  type="button" class="btn btn-md btn-info" href="<?php echo base_url() ?>relatorio/orcamento" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Or�amentos
													</a>											
												</div>	
											</div>											
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a  type="button" class="btn btn-md btn-info" href="<?php echo base_url() ?>relatorio/despesas" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Despesas
													</a>
												</div>	
											</div>											
											<div class="form-group col-md-10 text-left">
												<div class="row">										
													<a  type="button" class="btn btn-md btn-info" href="<?php echo base_url() ?>relatorio/receitas" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Recebimentos
													</a>
												</div>	
											</div>																	
										</div>
										<div class="col-md-10">											
											<label for="">Produtos:</label>
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary" href="<?php echo base_url() ?>relatorio/produtos" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Tabela de Pre�os
													</a>
												</div>	
											</div>											
											<div class="form-group col-md-10 text-left">
												<div class="row">
													<a type="button" class="btn btn-md btn-primary" href="<?php echo base_url() ?>relatorio/produtoscomp" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Comprados
													</a>
												</div>	
											</div>	
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary" href="<?php echo base_url() ?>relatorio/produtosvend" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Vendidos
													</a>
												</div>	
											</div>	
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary" href="<?php echo base_url() ?>relatorio/consumo" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Consumidos
													</a>
												</div>	
											</div>		
										</div>
										<div class="col-md-10">
											<label for="">Servi�os & Procedimentos:</label>
											
											<div class="form-group col-md-10 text-left">
												<div class="row">
													<a type="button" class="btn btn-md btn-warning" href="<?php echo base_url() ?>relatorio/servicosprest" role="button"> 
														<span class="glyphicon glyphicon-plus"></span> Servi�os Prestados
													</a>
												</div>	
											</div>	
											<div class="form-group col-md-10 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-warning" href="<?php echo base_url() ?>relatorio/orcamentopc" role="button"> 
														<span class="glyphicon glyphicon-list-alt"></span> Procedimentos
													</a>
												</div>	
											</div>																									
										</div>																
									</div>
								</div>
								</form>
							</div>
						</div>

				</div>
				<div class="col-md-1"></div>				
			</div>
		</div>
	</div>

	<div class="col-md-3"></div>


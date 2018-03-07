<?php if ($msg) echo $msg; ?>

	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">

				<?php echo validation_errors(); ?>
				<?php echo form_open('relatorio/admin', 'role="form"'); ?>

				
				<div class="col-md-4">

					<div class="panel panel-primary">
						<div class="panel-heading"><strong><?php echo $titulo1; ?></strong></div>
						<div class="panel-body">
							
							<div class="form-group">
								<div class="row">														

									<div class="col-md-12">
										<label for="">Pessoas & Empresas:</label>

										<div class="form-group col-md-12 text-left">	
											<div class="row">		
												<a class="btn btn-md btn-success btn-block" href="<?php echo base_url() ?>loginempresafilial/index" role="button"> 
													<span class="glyphicon glyphicon-user"></span> Usu�rios
												</a>
											</div>
										</div>
									
										<div class="form-group col-md-12 text-left">
											<div class="row">																				
												<a class="btn btn-md btn-success btn-block" href="<?php echo base_url() ?>relatorio/clientes" role="button"> 
													<span class="glyphicon glyphicon-user"></span> Clientes
												</a>
											</div>
										</div>

										<div class="form-group col-md-12 text-left">	
											<div class="row">		
												<a class="btn btn-md btn-success btn-block" href="<?php echo base_url() ?>relatorio/fornecedor" role="button"> 
													<span class="glyphicon glyphicon-user"></span> Fornecedores
												</a>
											</div>	
										</div>																										
									</div>

									<div class="col-md-12">										
										<label for="">Produtos & Valores:</label>
										<!--
										<div class="form-group col-md-12 text-left">
											<div class="row">		
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>servico/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Servi�os-Tabela Antiga 
												</a>
											</div>	
										</div>
										<div class="form-group col-md-12 text-left">
											<div class="row">		
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>produto/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Produtos-Tabela Antiga
												</a>
											</div>	
										</div>
										-->
										<div class="form-group col-md-12 text-left">
											<div class="row">		
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/produtos" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Produtos & Pre�os
												</a>
											</div>	
										</div>
										<div class="form-group col-md-12 text-left">
											<div class="row">													
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>prodaux3/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Categoria
												</a>
											</div>	
										</div>
										<div class="form-group col-md-12 text-left">
											<div class="row">													
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>prodaux1/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Aux1
												</a>
											</div>	
										</div>
										<div class="form-group col-md-12 text-left">
											<div class="row">													
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>prodaux2/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Aux2
												</a>
											</div>	
										</div>									
										<div class="form-group col-md-12 text-left">
											<div class="row">													
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>convenio/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Planos & Conv�nios
												</a>
											</div>	
										</div>													
										<div class="form-group col-md-12 text-left">
											<div class="row">													
												<a class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>formapag/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Forma de Pagamento
												</a>
											</div>	
										</div>												
										<!--
										<div class="form-group col-md-10 text-left">
											<div class="row">		
												<a class="btn btn-md btn-primary" href="<?php echo base_url() ?>servicos/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-qrcode"></span> Servi�os
												</a>											
											</div>	
										</div>
										-->
									</div>

									<div class="col-md-12">											
										<label for="">Tipos de Sa�das:</label>
										<div class="form-group col-md-12 text-left">
											<div class="row">		
												<a class="btn btn-md btn-info btn-block" href="<?php echo base_url() ?>tipodespesa/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-pencil"></span> Tipo de Despesa
												</a>
											</div>	
										</div>											
										<div class="form-group col-md-12 text-left">
											<div class="row">		
												<a class="btn btn-md btn-info btn-block" href="<?php echo base_url() ?>tipoconsumo/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-pencil"></span> Tipo de Consumo
												</a>
											</div>	
										</div>											
									</div>
									<div class="col-md-12">
										<label for="">Procedimentos:</label>
										<div class="form-group col-md-12 text-left">
											<div class="row">		
												<a type="button" class="btn btn-md btn-warning btn-block" href="<?php echo base_url() ?>relatorio/orcamentopc" role="button"> 
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
				<div class="col-md-4">	

						<div class="panel panel-primary">
							<div class="panel-heading"><strong><?php echo $titulo2; ?></strong></div>
							<div class="panel-body">
								<div class="form-group">
									<div class="row">								
										<div class="col-md-12">											
											<label for="">Financeiro:</label>
											
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a  type="button" class="btn btn-md btn-info btn-block" href="<?php echo base_url() ?>relatorio/orcamento" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Or�amentos
													</a>											
												</div>	
											</div>											
											<div class="form-group col-md-12 text-left">
												<div class="row">										
													<a  type="button" class="btn btn-md btn-info btn-block" href="<?php echo base_url() ?>relatorio/receitas" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Receitas & Entradas
													</a>
												</div>	
											</div>
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a  type="button" class="btn btn-md btn-info btn-block" href="<?php echo base_url() ?>relatorio/despesas" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Despesas & Sa�das
													</a>
												</div>	
											</div>
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a  type="button" class="btn btn-md btn-info btn-block" href="<?php echo base_url() ?>relatorio/balanco" role="button"> 
														<span class="glyphicon glyphicon-usd"></span> Balan�o
													</a>
												</div>	
											</div>											
										</div>
										<div class="col-md-12">											
											<label for="">Produtos:</label>
											<div class="form-group col-md-12 text-left">
												<div class="row">
													<a type="button" class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/produtoscomp" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Comprados
													</a>
												</div>	
											</div>
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/produtosvend" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Vendidos
													</a>
												</div>	
											</div>
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/produtosdevol" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Devolvidos
													</a>
												</div>	
											</div>
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/consumo" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Produtos Consumidos
													</a>
												</div>	
											</div>
											<div class="form-group col-md-12 text-left">
												<div class="row">		
													<a type="button" class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/estoque" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Estoque
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
				<div class="col-md-4">	
					
					<div class="panel panel-danger">
						<div class="panel-heading"><strong><?php echo $titulo4; ?></strong><strong> - Como Receber?</strong></div>
						<div class="panel-body">
							
							<div class="form-group">
								<div class="row">								
									
									<div class="col-md-12">																			
										<div class="text-center t">
											<h3><?php echo '<small></small><strong> Nos Indicando </strong><small></small>'  ?></h3>
										</div>
										
										<div class="form-group col-md-12 text-left">	
											<div class="row">										
												<a  class="btn btn-md btn-danger btn-block" href="<?php echo base_url() ?>tipobanco/cadastrar" role="button"> 
													<span class="glyphicon glyphicon-usd"></span> Cadastrar Conta Corrente
												</a>
											</div>
										</div>
										<!--
										<div class="form-group col-md-12 text-left">													
											<div class="row">	
												<a  class="btn btn-md btn-danger btn-block" href="<?php echo base_url() ?>loginassociadoempresafilial/registrar" role="button"> 
													<span class="glyphicon glyphicon-user"></span> Cadastrar Empresa Indicada
												</a>
											</div>
										</div>
										-->
										<div class="form-group col-md-12 text-left">														
											<div class="row">	
												<a  class="btn btn-md btn-danger btn-block" href="<?php echo base_url() ?>relatorio/empresaassociado" role="button"> 
													<span class="glyphicon glyphicon-list"></span> Cadastrar Indica��es
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
				
				<!--
				<div class="col-md-4">	

						<div class="panel panel-primary">
							<div class="panel-heading"><strong><?php echo $titulo3; ?></strong></div>
							<div class="panel-body">
								<div class="form-group">
									<div class="row">								
										<div class="col-md-12">											
											<label for="">Servi�os:</label>

											<div class="form-group col-md-12 text-left">
												<div class="row">
													<a type="button" class="btn btn-md btn-primary btn-block" href="<?php echo base_url() ?>relatorio/servicosprest" role="button"> 
														<span class="glyphicon glyphicon-barcode"></span> Servi�os Prestados
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
				-->				
			</div>
		</div>
	</div>

	<div class="col-md-2"></div>


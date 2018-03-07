<div class="container" id="login">

    <?php #echo validation_errors(); ?>

    <?php if (isset($msg)) echo $msg; ?>

    <?php echo form_open('loginfuncionario/registrar', 'role="form"'); ?>

    <!--
    <p class="text-center">
        <a href="<?php echo base_url() . '/' . $_SESSION['log']['modulo']; ?>">
        <a href="<?php echo base_url() ?>">
            <img src="<?php echo base_url() . 'arquivos/imagens/' . $_SESSION['log']['modulo'] . '.png' ; ?>" width="25%" />
        </a>
    </p>
    -->
	<p class="text-center">
        <a href="<?php echo base_url(); ?>loginfuncionario">
            <img src="<?php echo base_url() . 'arquivos/imagens/' . $modulo . '.png'; ?>" />
        </a>
    </p>
    <h2 class="form-signin-heading text-center">Dados do Novo Consultor</h2>
	<!--
	<label for="NomeEmpresa">Nome da Empresa:</label>
	<input type="text" class="form-control" id="NomeEmpresa" maxlength="45" 
		   name="NomeEmpresa" value="<?php echo $query['NomeEmpresa']; ?>">
	<?php echo form_error('NomeEmpresa'); ?>
	<br>
	-->

	<label for="Nome">Nome do Consultor:</label>
	<input type="text" class="form-control" id="Nome" maxlength="255"
		   autofocus name="Nome" value="<?php echo $query['Nome']; ?>">
	<?php echo form_error('Nome'); ?>
	<br>
	
	<label for="Celular">Celular:</label>
	<input type="text" class="form-control Celular Celular" id="Celular" maxlength="11"
		   name="Celular" placeholder="(XX)999999999" value="<?php echo $query['Celular']; ?>">
	<?php echo form_error('Celular'); ?>
	<br>

	<label for="DataNascimento">Data de Nascimento:</label>
	<input type="text" class="form-control Date" id="inputDate0" maxlength="10"
		   name="DataNascimento" placeholder="DD/MM/AAAA" value="<?php echo $query['DataNascimento']; ?>">
	<?php echo form_error('DataNascimento'); ?>
	<br>

	<label for="Sexo">Sexo:</label>
	<select data-placeholder="Selecione um TROCA..." class="form-control" id="Sexo" name="Sexo">
		<option value="">-- Selecione uma op��o --</option>
		<?php
		foreach ($select['Sexo'] as $key => $row) {
			if ($query['Sexo'] == $key) {
				echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
			} else {
				echo '<option value="' . $key . '">' . $row . '</option>';
			}
		}
		?>
	</select>
	<?php echo form_error('Sexo'); ?>
	<br>
<!--	
	<label for="Funcao">Funcao:*</label>
	<select data-placeholder="Selecione uma op��o..." class="form-control" id="Funcao" name="Funcao">		
		<option value="">-- Selecione uma Funcao --</option>
		<?php
		foreach ($select['Funcao'] as $key => $row) {
			if ($query['Funcao'] == $key) {
				echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
			} else {
				echo '<option value="' . $key . '">' . $row . '</option>';
			}
		}
		?>   
	</select> 
	<?php echo form_error('Funcao'); ?>
	<br>
	
	<label for="TipoProfissional">Profiss�o:*</label>
	<select data-placeholder="Selecione uma op��o..." class="form-control" id="TipoProfissional" name="TipoProfissional">		
		<option value="">-- Selecione um Profissional --</option>
		<?php
		foreach ($select['TipoProfissional'] as $key => $row) {
			if ($query['TipoProfissional'] == $key) {
				echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
			} else {
				echo '<option value="' . $key . '">' . $row . '</option>';
			}
		}
		?>   
	</select> 
	<?php echo form_error('TipoProfissional'); ?>
	<br>	

	<label for="Permissao">N�vel de Permiss�o:*</label>
	<select data-placeholder="Selecione uma op��o..." class="form-control" id="Permissao" name="Permissao">			
		<option value="">-- Selecione uma Permissao --</option>
		<?php
		foreach ($select['Permissao'] as $key => $row) {
			if ($query['Permissao'] == $key) {
				echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
			} else {
				echo '<option value="' . $key . '">' . $row . '</option>';
			}
		}
		?>   
	</select> 
	<?php echo form_error('Permissao'); ?>
	<br>	
-->	
	<label for="CpfUsuario">Cpf:</label>
	<input type="text" class="form-control" id="CpfUsuario" maxlength="11"
		   name="CpfUsuario" value="<?php echo $query['CpfUsuario']; ?>">
	<?php echo form_error('CpfUsuario'); ?>
	<br>
	
	<label for="RgUsuario">Rg:</label>
	<input type="text" class="form-control" id="RgUsuario" maxlength="9"
		   name="RgUsuario" value="<?php echo $query['RgUsuario']; ?>">
	<?php echo form_error('RgUsuario'); ?>
	<br>
	
	<label for="OrgaoExpUsuario">OrgaoExp:</label>
	<input type="text" class="form-control" id="OrgaoExpUsuario" maxlength="10"
		   name="OrgaoExpUsuario" value="<?php echo $query['OrgaoExpUsuario']; ?>">
	<?php echo form_error('OrgaoExpUsuario'); ?>
	<br>
	
	<label for="EstadoEmUsuario">Estado Emissor:</label>
	<input type="text" class="form-control" id="EstadoEmUsuario" maxlength="2"
		   name="EstadoEmUsuario" value="<?php echo $query['EstadoEmUsuario']; ?>">
	<?php echo form_error('EstadoEmUsuario'); ?>
	<br>
	
	<label for="DataEmUsuario">Data de Emiss�o:</label>
	<input type="text" class="form-control Date" id="inputDate0" maxlength="10"
		   name="DataEmUsuario" placeholder="DD/MM/AAAA" value="<?php echo $query['DataEmUsuario']; ?>">
	<?php echo form_error('DataEmUsuario'); ?>
	<br>
	
	<label for="EnderecoUsuario">Endere�o:</label>
	<input type="text" class="form-control" id="EnderecoUsuario" maxlength="200"
		   name="EnderecoUsuario" value="<?php echo $query['EnderecoUsuario']; ?>">
	<?php echo form_error('EnderecoUsuario'); ?>
	<br>
	
	<label for="BairroUsuario">Bairro:</label>
	<input type="text" class="form-control" id="BairroUsuario" maxlength="50"
		   name="BairroUsuario" value="<?php echo $query['BairroUsuario']; ?>">
	<?php echo form_error('BairroUsuario'); ?>
	<br>
	
	<!--
	<label for="MunicipioUsuario">Municipio:</label>
	<input type="text" class="form-control" id="MunicipioUsuario" maxlength="2"
		   name="MunicipioUsuario" value="<?php echo $query['MunicipioUsuario']; ?>">
	<?php echo form_error('MunicipioUsuario'); ?>
	<br>
	-->
	
	<label for="MunicipioUsuario">Munic�pio:</label>
	<select data-placeholder="Selecione um Munic�pio..." class="form-control" <?php echo $disabled; ?>
			id="MunicipioUsuario" name="MunicipioUsuario">
		<option value="">-- Selec.um Munic�pio --</option>
		<?php
		foreach ($select['MunicipioUsuario'] as $key => $row) {
			if ($query['MunicipioUsuario'] == $key) {
				echo '<option value="' . $key . '" selected="selected">' . $row . '</option>';
			} else {
				echo '<option value="' . $key . '">' . $row . '</option>';
			}
		}
		?>
	</select>				
	<?php echo form_error('Municipio'); ?>
	<br>
	
	<label for="CepUsuario">Cep:</label>
	<input type="text" class="form-control" id="CepUsuario" maxlength="8"
		   name="CepUsuario" value="<?php echo $query['CepUsuario']; ?>">
	<?php echo form_error('CepUsuario'); ?>
	<br>
	
	<label for="Email">Email:</label>
	<input type="text" class="form-control" id="Email" maxlength="50"
		   name="Email" value="<?php echo $query['EstadoEmUsuario']; ?>">
	<?php echo form_error('Email'); ?>
	<br>
	
	<label for="Usuario">Usu�rio:</label>
	<input type="text" class="form-control" id="Usuario" maxlength="45"
		   name="Usuario" value="<?php echo $query['Usuario']; ?>">
	<?php echo form_error('Usuario'); ?>
	<br>

	<label for="Senha">Senha:</label>
	<input type="password" class="form-control" id="Senha" maxlength="45"
		   name="Senha" value="<?php echo $query['Senha']; ?>">
	<?php echo form_error('Senha'); ?>
	<br>

	<label for="Senha">Confirmar Senha:</label>
	<input type="password" class="form-control" id="Confirma" maxlength="45"
		   name="Confirma" value="<?php echo $query['Confirma']; ?>">
	<?php echo form_error('Confirma'); ?>
	<br>			
	

    <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-log-in"></span> Salvar Novo Consultor</button>
	<br>
	<a class="btn btn-lg btn-info btn-block" href="<?php echo base_url(); ?>login/index" role="button"> Acesso dos Consultores <span class="glyphicon glyphicon-log-out"></span></a>
	<!--<a class="btn btn btn-primary btn-warning btn-block" href="<?php echo base_url(); ?>loginempresafilial/index" role="button">Acesso do Admin. da Empresa</a>-->		
</form>

</div>

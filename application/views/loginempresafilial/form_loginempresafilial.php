<div class="container text-center" id="login">

    <?php echo validation_errors(); ?>

    <?php if (isset($msg)) echo $msg; ?>

    <?php echo form_open('loginempresafilial', 'role="form"'); ?>

    <p class="text-center">
        <a href="<?php echo base_url(); ?>loginempresafilial">
            <img src="<?php echo base_url() . 'arquivos/imagens/' . $modulo . '.png'; ?>" />
        </a>
    </p>
    <!--<h2 class="form-signin-heading text-center">Agenda <?php echo ucfirst($nome_modulo) ?></h2><h4><b>***** vers�o alpha *****</b></h4>-->
    <h2 class="form-signin-heading text-center">Rede Calisi de Vendas</h2>	
	
	<label class="sr-only">Usu�rio</label>
    <input type="text" id="inputText" class="form-control" placeholder="Usu�rio ou E-mail" autofocus name="UsuarioEmpresaFilial" value="<?php echo set_value('UsuarioEmpresaFilial'); ?>">	   
	<label class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="Senha" value="">
    <input type="hidden" name="modulo" value="<?php echo $modulo; ?>">
    <button class="btn btn-lg btn-warning btn-block" type="submit">Acesso do Administrador</button>
    <p><a href="<?php echo base_url(); ?>loginempresafilial/recuperar/?usuario=<?php echo set_value('UsuarioEmpresaFilial'); ?>">Esqueci Admin./senha!</a></p>
    <br>
	<a class="btn btn-lg  btn-primary btn-block" href="<?php echo base_url(); ?>login/index" role="button">Acesso dos Consultores</a>	   
	<a class="btn btn  btn-danger btn-block" href="<?php echo base_url(); ?>loginfuncionario/registrar" role="button">Cadastrar Novo Consultor</a>
	<!--<a class="btn btn  btn-danger btn-block" href="<?php echo base_url(); ?>loginempresafilial/registrar" role="button">Cadastrar Nova Empresa</a>-->

</form>

</div>
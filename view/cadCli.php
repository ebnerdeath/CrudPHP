<?php
require '../util/ValidaSessao.php';
include 'MenuPrincipal.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JEBLanches - Cadastro de Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/tether.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

</head>

<body>
	    <div class="container-fluid offset-lg-1 offset-md-1 col-lg-10 col-md-10" id="campos-form">
			<form class="form" method="POST">
			    <div class="row" id="row1">
				    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12" >
				  		<label for="txtNome">Nome</label>
				  		<input type="text" class="form-control" id="txtNome" name="txtNome" title="Informe o nome">
					</div>
				</div>
				<div class="row" id="row2">
				    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="txtCpf">Cpf</label>
				  		<input type="text" class="form-control" id="txtCpf" name="txtCpf" title="Informe o CPF">
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12">
				  		<label for="txtRg">RG</label>
				  		<input type="text" class="form-control" id="txtRg" name="txtRg" title="Informe o RG">
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="txtDataNasc">Data de Nascimento</label>
				  		<input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" title="Informe a data de nascimento">
					</div>
				</div>
				<div class="row" id="row3">
				    <div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="btnTipo">Tipo:</label>
				  		<div class="dropdown">
						 <button class="btn btn-default dropdown-toggle" type="button" id="btnTipo" name="btnTipo" data-toggle="dropdown">Selecione
						 <span class="caret"></span></button>
					     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						  <li onclick="setaItemTipo('Selecione');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Selecione</a></li>
						  <li onclick="setaItemTipo('Física');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Física</a></li>
						  <li onclick="setaItemTipo('Jurídica');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Jurídica</a></li>
						 </ul>
						</div>
				  		<!--  <input type="text" class="form-control" id="txtCpf" name="txtCpf" title="EXEMPLO DE TOOLTIP FACIL">   -->
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12">
				  		<label for="btnSexo">Sexo:</label>
				  		<div class="dropdown">
						 <button class="btn btn-default dropdown-toggle" type="button" id="btnSexo" name="btnSexo" data-toggle="dropdown">Selecione
						 <span class="caret"></span></button>
					     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						  <li onclick="setaItemSexo('Selecione');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Selecione</a></li>
						  <li onclick="setaItemSexo('Masculino');" role="presentation"><a role="menuitem" tabindex="-1">Masculino</a></li>
						  <li onclick="setaItemSexo('Feminino');" role="presentation"><a role="menuitem" tabindex="-1">Feminino</a></li>
						 </ul>
						</div>
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="txtCnpj">Cnpj</label>
				  		<input type="text" class="form-control" id="txtCnpj" name="txtCnpj" title="Informe o cnpj">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="txtTelFix">Telefone Fixo</label>
				  		<input type="text" class="form-control" id="txtTelFix" name="txtTelFix" title="Informe qual é o telefone fixo">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="txtTelCel">Telefone Celular</label>
				  		<input type="text" class="form-control" id="txtTelCel" name="txtTelCel" title="Informe qual é o telefone celular">
					</div>
				</div>
				<div class="row" id="row4">
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="txtContato">Contato</label>
				  		<input type="text" class="form-control" id="txtContato" name="txtContato" title="Informe qual é o contato">
					</div>
					<div class="form-group col-lg-8 col-md-8 col-sm-12 col-12" >
				  		<label for="txtEmail">E-mail</label>
				  		<input type="email" class="form-control" id="txtEmail" name="txtEmail" title="Informe qual é o cep">
					</div>
				</div>
				<div class="row" id="row5">
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="txtCep">Cep</label>
				  		<input type="text" class="form-control" id="txtCep" name="txtCep" title="Informe qual é o cep">
					</div>
					<div class="form-group col-lg-10 col-md-10 col-sm-12 col-12" >
				  		<label for="lblEndereco">Endereco</label>
				  		<input type="text" class="form-control" id="txtEndereco" name="txtEndereo" title="Informe qual é o endereco">
					</div>
				</div>
				<div class="row" id="row6">
					<div class="form-group col-lg-3 col-md-2 col-sm-12 col-12" >
				  		<label for="txtNumero">Número</label>
				  		<input type="text" class="form-control" id="txtNumero" name="txtNumero" title="Informe qual é o número">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12">
				  		<label for="btnUF">UF</label>
				  		<div class="dropdown">
						 <button class="btn btn-default dropdown-toggle" type="button" id="btnUF" name="btnUF" data-toggle="dropdown">Selecione
						 <span class="caret"></span></button>
					     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
							<li onclick="setaItemUF('Selecione');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Selecione</a></li>
							<li onclick="setaItemUF('Acre');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Acre</a></li>
							<li onclick="setaItemUF('Alagoas');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Alagoas</a></li>
							<li onclick="setaItemUF('Amazonas');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Amazonas</a></li>
							<li onclick="setaItemUF('Amapá');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Amapá</a></li>
							<li onclick="setaItemUF('Bahia');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Bahia</a></li>
							<li onclick="setaItemUF('Ceará');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Ceará</a></li>
							<li onclick="setaItemUF('Distrito Federal');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Distrito Federal</a></li>
							<li onclick="setaItemUF('Espírito Santo');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Espírito Santo</a></li>
							<li onclick="setaItemUF('Goiás');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Goiás</a></li>
							<li onclick="setaItemUF('Maranhão');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Maranhão</a></li>
							<li onclick="setaItemUF('Mato Grosso');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Mato Grosso</a></li>
							<li onclick="setaItemUF('Mato Grosso do Sul');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Mato Grosso do Sul</a></li>
							<li onclick="setaItemUF('Minas Gerais');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Minas Gerais</a></li>
							<li onclick="setaItemUF('Pará');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Pará</a></li>
							<li onclick="setaItemUF('Paraíba');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Paraíba</a></li>
							<li onclick="setaItemUF('Paraná');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Paraná</a></li>
							<li onclick="setaItemUF('Pernambuco');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Pernambuco</a></li>
							<li onclick="setaItemUF('Piauí');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Piauí</a></li>
							<li onclick="setaItemUF('Rio de Janeiro');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Rio de Janeiro</a></li>
							<li onclick="setaItemUF('Rio Grande do Norte');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Rio Grande do Norte</a></li>
							<li onclick="setaItemUF('Rondônia');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Rondônia</a></li>
							<li onclick="setaItemUF('Rio Grande do Sul');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Rio Grande do Sul</a></li>
							<li onclick="setaItemUF('Roraima');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Roraima</a></li>
							<li onclick="setaItemUF('Santa Catarina');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Santa Catarina</a></li>
							<li onclick="setaItemUF('Sergipe');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Sergipe</a></li>
							<li onclick="setaItemUF('São Paulo');" role="presentation"><a role="menuitem" tabindex="-1" href="#">São Paulo</a></li>
							<li onclick="setaItemUF('Tocantins');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Tocantins</a></li>
						 </ul>
						</div>
					</div>
					<div class="form-group col-lg-5 col-md-5 col-sm-12 col-12" >
				  		<label for="txtCidade">Cidade</label>
				  		<input type="text" class="form-control" id="txtCidade" name="txtCidade" title="Informe qual é a cidade">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="txtComplemento">Complemento</label>
				  		<input type="text" class="form-control" id="txtComplemento" name="txtComplemento" title="Informe qual é o complemento">
					</div>
				</div>
					<a href="#" class="btn btn-info offset-lg-5 offset-lg-5 " role="button">Listar</a>
					<button type="button" class="btn btn-secondary" role="button" onclick="location.reload()">Limpar Campos</button>
					<button type="button" onclick="inserePostCliente();" class="btn btn-success" role="button">Salvar</button>
			</form>
		</div>
    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/popper.js"></script>
	<script src="../assets/js/MenuPrincipal.js"></script>
	<script src="../assets/js/cadCli.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	
</body>

</html>
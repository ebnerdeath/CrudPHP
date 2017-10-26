<?php
require '../util/ValidaSessao.php';
require '../dao/FuncionarioDao.php';
require '../model/Funcionario.php';
include 'MenuPrincipal.php';
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JEBLanches - Lista de Funcionarios</title>

    <!-- Custom styles for this template -->
    <!--  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">  -->

</head>

    <body>
		<h4 class="display-3" Listagem de Funcionários </h4>	
    <div class="container">
			<table class="table table-hover">
				<thead>
						<tr>
								<th>Nome</th>
								<th>Usuario</th>
								<th>Senha</th>
						</tr>
				</thead>
        <tbody>
						<?php
						$funcionariodao = new FuncionarioDao();
						$arr = $funcionariodao->read();
            foreach($arr as $funcionario){
								echo'<tr>';
                	echo'<td>' .$funcionario->getNome() .'</td>';
                	echo'<td>' .$funcionario->getUsuario() .'</td>';
									echo'<td>' .$funcionario->getSenha() .'</td>';
									echo'<td class="actions text-right">';
										echo'<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>';
										echo'<a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>';
										echo'<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="#"><i class="fa fa-trash"></i> Excluir</a>';
									echo'</td>';
                echo '</td>';
            }
						?>
				
							
	

				</tbody>
				
			</table>
		</div>





	<!-- Modal ALTERAR -->
      <div class="modal fade" id="modalAlterar" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Cabecalho do modal -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Alterar Cliente</h4>
            </div>
            <!-- Corpo do modal -->
            <div class="modal-body">
              <!-- Formulario que vai cuidar de imputar os dados para o back-end chamando a funcao submitPostCliente() no arquivo listCli.js -->
              <form>
                <div class="form-group">
                  <label for="codigoUpdate">Código</label>
                  <input type="text" class="form-control" name="codigoUpdate" id="codigoUpdate" readonly>
                </div>
                <div class="form-group">
                  <label for="nomeUpdate">Nome</label>
                  <input type="text" class="form-control" name="nomeUpdate" id="nomeUpdate">
                </div>

                <div class="row" id="row2">
				    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="cpfUpdate">Cpf</label>
				  		<input type="text" class="form-control" id="cpfUpdate" name="cpfUpdate" title="Informe o CPF">
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12">
				  		<label for="rgUpdate">RG</label>
				  		<input type="text" class="form-control" id="rgUpdate" name="rgUpdate" title="Informe o RG">
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="dataNascUpdate">Data de Nascimento</label>
				  		<input type="date" class="form-control" id="dataNascUpdate" name="dataNascUpdate" title="Informe a data de nascimento">
					</div>
				</div>
				<div class="row" id="row3">
				    <div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="btnTipoUpdate">Tipo:</label>
				  		<div class="dropdown">
						 <button class="btn btn-default dropdown-toggle" type="button" id="btnTipoUpdate" name="btnTipoUpdate" data-toggle="dropdown">Selecione
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
				  		<label for="btnSexoUpdate">Sexo:</label>
				  		<div class="dropdown">
						 <button class="btn btn-default dropdown-toggle" type="button" id="btnSexoUpdate" name="btnSexoUpdate" data-toggle="dropdown">Selecione
						 <span class="caret"></span></button>
					     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						  <li onclick="setaItemSexo('Selecione');" role="presentation"><a role="menuitem" tabindex="-1" href="#">Selecione</a></li>
						  <li onclick="setaItemSexo('Masculino');" role="presentation"><a role="menuitem" tabindex="-1">Masculino</a></li>
						  <li onclick="setaItemSexo('Feminino');" role="presentation"><a role="menuitem" tabindex="-1">Feminino</a></li>
						 </ul>
						</div>
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="cnpjUpdate">Cnpj</label>
				  		<input type="text" class="form-control" id="cnpjUpdate" name="cnpjUpdate" title="Informe o cnpj">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="telFixUpdate">Telefone Fixo</label>
				  		<input type="text" class="form-control" id="telFixUpdate" name="telFixUpdate" title="Informe qual é o telefone fixo">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="telCelUpdate">Telefone Celular</label>
				  		<input type="text" class="form-control" id="telCelUpdate" name="telCelUpdate" title="Informe qual é o telefone celular">
					</div>
				</div>
				<div class="row" id="row4">
					<div class="form-group col-lg-4 col-md-4 col-sm-12 col-12" >
				  		<label for="contatoUpdate">Contato</label>
				  		<input type="text" class="form-control" id="contatoUpdate" name="contatoUpdate" title="Informe qual é o contato">
					</div>
					<div class="form-group col-lg-8 col-md-8 col-sm-12 col-12" >
				  		<label for="emailUpdate">E-mail</label>
				  		<input type="email" class="form-control" id="emailUpdate" name="emailUpdate" title="Informe qual é o email">
					</div>
				</div>
				<div class="row" id="row5">
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="cepUpdate">Cep</label>
				  		<input type="text" class="form-control" id="cepUpdate" name="cepUpdate" title="Informe qual é o cep">
					</div>
					<div class="form-group col-lg-10 col-md-10 col-sm-12 col-12" >
				  		<label for="enderecoUpdate">Endereco</label>
				  		<input type="text" class="form-control" id="enderecoUpdate" name="enderecoUpdate" title="Informe qual é o endereco">
					</div>
				</div>
				<div class="row" id="row6">
					<div class="form-group col-lg-3 col-md-2 col-sm-12 col-12" >
				  		<label for="numeroUpdate">Número</label>
				  		<input type="text" class="form-control" id="numeroUpdate" name="numeroUpdate" title="Informe qual é o número">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12">
				  		<label for="btnUFUpdate">UF</label>
				  		<div class="dropdown">
						 <button class="btn btn-default dropdown-toggle" type="button" id="btnUFUpdate" name="btnUFUpdate" data-toggle="dropdown">Selecione
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
				  		<label for="cidadeUpdate">Cidade</label>
				  		<input type="text" class="form-control" id="cidadeUpdate" name="cidadeUpdate" title="Informe qual é a cidade">
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-12 col-12" >
				  		<label for="complementoUpdate">Complemento</label>
				  		<input type="text" class="form-control" id="complementoUpdate" name="complementoUpdate" title="Informe qual é o complemento">
					</div>
                </form>
              </div>
            <!-- Footer do modal -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" onclick="alteraPostCliente();" class="btn btn-success" name="btnUpdateSalvar" id="btnUpdateSalvar">Salvar</button></td>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal DELETE -->
      <div class="modal fade" id="modalDelete" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Cabecalho do modal -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Excluir Cliente</h4>
            </div>
            <!-- Corpo do modal -->
            <div class="modal-body">
              <!-- Formulario que vai cuidar de imputar os dadados para o back-end -->
              <form method="POST">
                <div class="form-group">
                  <label for="codigoDelete">Código</label>
                  <input type="text" class="form-control" name="codigoDelete" id="codigoDelete" readonly>
                </div>
                <div class="form-group">
                  <label for="nomeDelete">Nome</label>
                  <input type="text" class="form-control" name="nomeDelete" id="nomeDelete" readonly>
                </div>
                <div class="form-group">
                  <label for="cpfDelete">Cpf</label>
                  <input type="text" class="form-control" name="cpfDelete" id="cpfDelete" readonly>
                </div>
              </form>
             </div>
	            <!-- Footer do modal -->
	         <div class="modal-footer">
	         	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	            <button type="button" onclick="deletaPostCliente();" class="btn btn-success">Confirmar</button></td>
	         </div>
            
          </div>
        </div>
      </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/popper.js"></script>
	<script src="../assets/js/ListFunc.js"></script>
	<script src="../assets/js/CadCli.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	
</body>



</html>

<script type="text/javascript">

//Recupera o valor da linha com jquery para o modal alterar
$(function(){
	$(document).on('click', '#btnAlterar', function(e) {
		e.preventDefault;
			var codigo = $(this).closest('tr').find('td[data-id]').data('id');
	        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
	        var cpf = $(this).closest('tr').find('td[data-cpf]').data('cpf');
	        
	        $('#codigoUpdate').val(codigo);
	        $('#nomeUpdate').val(nome);
	        $('#cpfUpdate').val(cpf);
		});
});

// Recupera o valor da linha com jquery para o modal delete
$(function(){
    $(document).on('click', '#btnExcluir', function(e) {
        e.preventDefault;
        var codigo = $(this).closest('tr').find('td[data-id]').data('id');
        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
        var cpf = $(this).closest('tr').find('td[data-cpf]').data('cpf');
        
        $('#codigoDelete').val(codigo);
        $('#nomeDelete').val(nome);
        $('#cpfDelete').val(cpf);
    });
});

</script>
var sidebar = false;
	
	//Funcao utilizada para quando abrir a pagina aparecer uma mensagem Conectado com sucesso!
	//$( document ).ready(function() {
		//$.alert({
			//theme: 'dark',
			//animation: 'zoom',
		    //closeAnimation: 'scale',
			//title: '',
		    //content: 'Conectado com sucesso!',
		//});
	//	$('#alertSucesso').hide();
	//});

	// Menu Toggle Script
	function menuToggle(){ 
      $("#wrapper").toggleClass("toggled");
      sidebar == false ?  rigthDiv() : leftDiv();
    }
    
	function rigthDiv(){
		sidebar = true;
		  $("#table-form").removeClass("offset-lg-1 offset-md-1 offset-sm-1 offset-1 col-md-10 col-lg-10 col-sm-10");
		  $("#table-form" ).addClass("offset-lg-2 offset-md-4 col-lg-10 col-md-7");
	}

	function leftDiv(){
		sidebar = false;
		$("#table-form").removeClass("offset-lg-2 offset-md-4 col-lg-10 col-md-7");
		$("#table-form" ).addClass("offset-lg-1 offset-md-1 offset-sm-1 offset-1 col-md-10 col-lg-10 col-sm-10");
	}
	
	function meuAlert(titulo,conteudo,link){
		$.alert({     title: titulo,     content: conteudo, });
		window.location.href = link;
	}
	
	function alteraPostCliente(){
		let codigo = $('#codigoUpdate').val();
		let nome = $('#nomeUpdate').val();
		let cpf = $('#cpfUpdate').val();
		let rg = $('#rgUpdate').val();
		let datanasc = $('#dataNascUpdate').val();
		let tipo = $('#btnTipoUpdate').text();
		let sexo = $('#btnSexoUpdate').text();
		let cnpj = $('#cnpjUpdate').val();
		let telfix = $('#telFixUpdate').val();
		let telcel = $('#telCelUpdate').val();
		let contato = $('#contatoUpdate').val();
		let email = $('#emailUpdate').val();
		let cep = $('#cepUpdate').val();
		let endereco = $('#enderecoUpdate').val();
		let numero = $('#numeroUpdate').val();
		let uf = $('#btnUFUpdate').text();
		let cidade = $('#cidadeUpdate').val();
		let complemento = $('#complementoUpdate').val();
		
		$.post('http://localhost:8080/JEBLanches/AlteraClienteServlet', 
			{ codigoUpdate: codigo,
			  nomeUpdate : nome,
			  cpfUpdate : cpf,
			  rgUpdate : rg,
			  dataNascUpdate : datanasc,
			  btnTipoUpdate : tipo,
			  btnSexoUpdate : sexo,
			  cnpjUpdate : cnpj,
			  telfixUpdate : telfix,
			  telcelUpdate: telcel,
			  contatoUpdate : contato,
			  emailUpdate : email,
			  cep : cepUpdate,
			  endereco: enderecoUpdate,
			  numero : numeroUpdate,
			  uf : btnUFUpdate,
			  cidade : cidadeUpdate,
			  complemento : complementoUpdate
			  },
				function(retorno){
				$('#modalAlterar').modal('hide');
				alert('Dados alterados com sucesso!');
				location.reload();
			}).fail(function(){
				alert('Erro ao salvar, estamos trabalhando para resolver seu problema!');
				location.reload();
		});
		
	}
	
	function deletaPostCliente(){
		let codigo = $('#codigoDelete').val();
		let nome = $('#nomeDelete').val();
		let cpf = $('#cpfDelete').val();
		
		$.post('http://localhost:8080/JEBLanches/DeletaClienteServlet', 
			{ codigoDelete: codigo,
			  nomeDelete : nome,
			  cpfDelete : cpf },
				function(retorno){
				$('#modalDeletar').modal('hide');
				alert('O cliente foi excluído com sucesso!');
				location.reload();
			}).fail(function(){
				alert('Erro ao excluir, estamos trabalhando para resolver seu problema!');
				location.reload();
		});
	}
	
	/*
	 * Pesquisar por que nao carrega no navegador
	 * 
	 * function readRowTable(document){
		var codigo = $(document).closest('tr').find('td[data-id]').data('id');
        var nome = $(document).closest('tr').find('td[data-nome]').data('nome');
        var cpf = $(document).closest('tr').find('td[data-cpf]').data('cpf');
        
        $('#codigoUpdate').val(codigo);
        $('#nomeUpdate').val(nome);
        $('#cpfUpdate').val(cpf);
	}
	*/
	

	//Recupera o valor da linha com jquery para o modal alterar
$(function(){
	$(document).on('click', '#btnAlterar', function(e) {
		e.preventDefault;
					var codigo = $(this).closest('tr').find('td[data-id]').data('id');
	        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
	        var usuario = $(this).closest('tr').find('td[data-usuario]').data('usuario');
	        var senha = $(this).closest('tr').find('td[data-senha]').data('senha');

	        $('#codigoAlterar').val(codigo);
	        $('#nomeAlterar').val(nome);
	        $('#usuarioAlterar').val(usuario);
					$('#senhaAlterar').val(senha);
		});
});

// Recupera o valor da linha com jquery para o modal delete
$(function(){
	$(document).on('click', '#btnExcluir', function(e) {
		e.preventDefault;
					var codigo = $(this).closest('tr').find('td[data-id]').data('id');
	        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
	        var usuario = $(this).closest('tr').find('td[data-usuario]').data('usuario');
	        var senha = $(this).closest('tr').find('td[data-senha]').data('senha');

	        $('#codigoExcluir').val(codigo);
	        $('#nomeExcluir').val(nome);
	        $('#usuarioExcluir').val(usuario);
					$('#senhaExcluir').val(senha);
		});
});

// Recupera o valor da linha com jquery para o modal delete
$(function(){
	$(document).on('click', '#btnVisualizar', function(e) {
		e.preventDefault;
					var codigo = $(this).closest('tr').find('td[data-id]').data('id');
	        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
	        var usuario = $(this).closest('tr').find('td[data-usuario]').data('usuario');
	        var senha = $(this).closest('tr').find('td[data-senha]').data('senha');

	        $('#codigoVisualizar').val(codigo);
	        $('#nomeVisualizar').val(nome);
	        $('#usuarioVisualizar').val(usuario);
					$('#senhaVisualizar').val(senha);
		});
});
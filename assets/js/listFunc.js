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


$(document).ready(function(){
	$("#confirmaExclusao").click(function(){
		var a=$('#formExcluir').serialize();
		$.ajax({
			type:'POST',
			url:'../util/ServicoFuncionario.php?servico=DELETE',
			data:a,
			beforeSend:function() {
        //
			},
			complete:function() {
        //	
			},
			success:function(result) {
				location.reload();
			}
		});
	});
});

$(document).ready(function(){
	$("#confirmaAlteracao").click(function(){
		var a=$('#formAlterar').serialize();
		$.ajax({
			type:'POST',
			url:'../service/ServicoFuncionario.php?servico=UPDATE',
			data:a,
			beforeSend:function() {
        //
			},
			complete:function() {
        //	
			},
			success:function(result) {
				location.reload();
			}
		});
	});
});
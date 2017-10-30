var sidebar = false;

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
	        //var senha = $(this).closest('tr').find('td[data-senha]').data('senha');

	        $('#codigoAlterar').val(codigo);
	        $('#nomeAlterar').val(nome);
	        $('#usuarioAlterar').val(usuario);
		});
});

// Recupera o valor da linha com jquery para o modal delete
$(function(){
	$(document).on('click', '#btnExcluir', function(e) {
		e.preventDefault;
			var codigo = $(this).closest('tr').find('td[data-id]').data('id');
	        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
	        var usuario = $(this).closest('tr').find('td[data-usuario]').data('usuario');

	        $('#codigoExcluir').val(codigo);
	        $('#nomeExcluir').val(nome);
	        $('#usuarioExcluir').val(usuario);
		});
});

// Recupera o valor da linha com jquery para o modal delete
$(function(){
	$(document).on('click', '#btnVisualizar', function(e) {
		e.preventDefault;
			var codigo = $(this).closest('tr').find('td[data-id]').data('id');
	        var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
	        var usuario = $(this).closest('tr').find('td[data-usuario]').data('usuario');

	        $('#codigoVisualizar').val(codigo);
	        $('#nomeVisualizar').val(nome);
	        $('#usuarioVisualizar').val(usuario);
		});
});


$(document).ready(function(){
	$("#confirmaExclusao").click(function(){
		var a=$('#formExcluir').serialize();
		$.ajax({
			type:'POST',
			url:'../service/ServicoFuncionario.php?servico=DELETE',
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

$(document).ready(function(){
	$("#salvarInsercao").click(function(){
		if($("#nomeInserir").val()==""){ 
			alertify.error('O campo nome necessita ser preenchido!');
		}else
		if($("#usuarioInserir").val()==""){
			alertify.error('O campo usuário necessita ser preenchido!');
		}else
		if($("#senhaInserir").val()==""){
			alertify.error('O campo senha necessita ser preenchido!');
		}else{
			var a=$('#formInserir').serialize();
			$.ajax({
				type:'POST',
				url:'../service/ServicoFuncionario.php?servico=INSERT',
				data:a,
				beforeSend:function() {
			//
				},
				complete:function() {
			//	
				},
				success:function(result) {
					alertify.success('Cadastro realizado com sucesso!');
					//$('#formInserir input').val("");
					//$('.modal').modal('hide'); 
					location.reload();

				}
			});
		}
	});
});
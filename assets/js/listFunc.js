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
				alertify.error('Dados excluídos com sucesso!');
				$('#formDeletarinput').val("");
				$('#modalDeletar').modal('hide'); 
				consomeRead();
			}
		});
	});
});

$(document).ready(function(){
	$("#confirmaAlteracao").click(function(){
		if($("#nomeAlterar").val()==""){ 
			alertify.error('O campo nome necessita ser preenchido!');
		}else
		if($("#usuarioAlterar").val()==""){
			alertify.error('O campo usuário necessita ser preenchido!');
		}else
		if($("#senhaAlterar").val()==""){
			alertify.error('O campo senha necessita ser preenchido!');
		}else{
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
					alertify.warning('Dados alterados com sucesso!');
					$('#formAlterar input').val("");
					$('#modalAlterar').modal('hide'); 
					consomeRead();
				}
			});
		}	
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
					$('#formInserir input').val("");
					$('#modalInserir').modal('hide'); 
					consomeRead();
				}
			});
		}
	});
});

//QUANDO ABRIR O DOCUMENTO SEMPRE ATUALIZA A TABELA
$(document).ready(function(){
	consomeRead();
 });

 function consomeRead(){
let url = '../service/ServicoFuncionario.php?servico=READ' 
	$.get(url, function(data){
		let template =``;

		for(x in data){
			template += `<tr>`;
			template += `<td data-id="${data[x]['id']}"> ${data[x]['id']}</td>`;
			template += `<td data-nome="${data[x]['nome']}"> ${data[x]['nome']}</td>`;
			template += `<td data-usuario="${data[x]['usuario']}"> ${data[x]['usuario']}</td>`;
			template += `<td><p data-placement="top" data-toggle="tooltip" title="Visualizar"><button id="btnVisualizar" class="btn btn-success btn-xs" data-title="Visualizar" data-toggle="modal" data-target="#modalVisualizar"><span class="fa fa-eye"></span></button></p></td>`;
			template += `<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button id="btnAlterar" class="btn btn-primary btn-xs" data-title="Editar" data-toggle="modal" data-target="#modalAlterar"> <span class="fa fa-pencil"></span></button></p></td>`;
			template += `<td><p data-placement="top" data-toggle="tooltip" title="Excluir"><button id="btnExcluir" class="btn btn-danger btn-xs" data-title="Deletar" data-toggle="modal" data-target="#modalDeletar" ><span class="fa fa-trash"></span></button></p></td>`;
			template += `</tr>`;
		} 
		document.getElementById("linhasTabela").innerHTML = template;
		console.table(data);
	});
}
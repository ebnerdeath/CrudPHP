$(document).ready(function(){
	$("#resposta").hide();
});

$(document).ready(function(){
	$("#btnInserir").click(function(){
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
				}
			});
		}
	});
});



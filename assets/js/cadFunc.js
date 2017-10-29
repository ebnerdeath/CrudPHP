$(document).ready(function(){
	$("#btnInserir").click(function(){
        var a=$('#formInserir').serialize();
        console.log(a);
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
                $("#resposta").html(result);
                $('#formInserir input').val("");
			}
		});
	});
});
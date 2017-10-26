function setaItemTipo(item){
	$('button#btnTipo').text(item);
}

function setaItemSexo(item){
	$('button#btnSexo').text(item);
}

function setaItemUF(item){
	$('button#btnUF').text(item);
}

function inserePostCliente(){
	let nome = $('#txtNome').val();
	let cpf = $('#txtCpf').val();
	let rg = $('#txtRg').val();
	let datanasc = $('#txtDataNasc').val();
	let tipo = $('#btnTipo').text();
	let sexo = $('#btnSexo').text();
	let cnpj = $('#txtCnpj').val();
	let telfix = $('#txtTelFix').val();
	let telcel = $('#txtTelCel').val();
	let contato = $('#txtContato').val();
	let email = $('#txtEmail').val();
	let cep = $('#txtCep').val();
	let endereco = $('#txtEndereco').val();
	let numero = $('#txtNumero').val();
	let uf = $('#btnUF').text();
	let cidade = $('#txtCidade').val();
	let complemento = $('#txtComplemento').val();
	
	$.post('http://localhost:8080/JEBLanches/InsereClienteServlet', 
		{ txtNome: nome,
		  txtCpf : cpf,
		  txtRg : rg, 
		  txtDataNasc : datanasc,
		  btnTipo : tipo,
		  btnSexo : sexo,
		  txtCnpj : cnpj,
		  txtTelFix : telfix,
		  txtTelCel : telcel,
		  txtContato : contato,
		  txtEmail : email,
		  txtCep : cep,
		  txtEndereco : endereco,
		  txtNumero : numero,
		  btnUF : uf,
		  txtCidade : cidade,
		  txtComplemento : complemento,
		},
			function(retorno){
			console.log(retorno);
			alert('O cliente foi inserido com sucesso!');
			window.location.href ="http://localhost:8080/JEBLanches/listCli.jsp";
		}).fail(function(){
			console.log(retorno);
			alert('Erro ao inserir, estamos trabalhando para resolver seu problema!');
			window.location.href ="http://localhost:8080/JEBLanches/cadCli.jsp";
	});
}
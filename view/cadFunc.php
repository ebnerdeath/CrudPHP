<?php
require '../util/ValidaSessao.php';
include 'MenuPrincipal.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JEBLanches - Cadastro de Funcionários</title>

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
			<form id="formInserir" class="form" method="POST">
				    <div class="row" id="row1">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12" >
                            <label for="nomeInserir">Nome</label>
                            <input type="text" class="form-control" id="nomeInserir" name="nomeInserir" title="Informe o nome">
                        </div>
                    </div>
				    <div class="row" id="row2">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
                            <label for="usuarioInserir">Usuario</label>
                            <input type="text" class="form-control" id="usuarioInserir" name="usuarioInserir" title="Informe o usuário!">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12">
                            <label for="senhaInserir">Senha</label>
                            <input type="text" class="form-control" id="senhaInserir" name="senhaInserir" title="Informe a senha!">
                        </div>
				    </div>
					<a href="ListFunc.php" class="btn btn-info offset-lg-4 offset-lg-4 " role="button">Listar</a>
					<button type="button" class="btn btn-secondary" role="button" onclick="location.reload()">Limpar Campos</button>
					<button id="btnInserir" name="btnInserir" type="button" class="btn btn-success" role="button">Salvar</button>
			</form>
            <div id="resposta"></div>
		</div>
    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/popper.js"></script>
	<script src="../assets/js/MenuPrincipal.js"></script>
	<script src="../assets/js/cadFunc.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	
</body>

</html>
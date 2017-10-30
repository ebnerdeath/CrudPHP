<?php
    require '../util/ValidaSessao.php';
?>


<html lang="en">

<head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JEBLanches - Seja Bem Vindo</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/tether.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/MenuPrincipal.css" rel="stylesheet">
    <link href="../assets/css/alertify.css" rel="stylesheet">
    <link href="../assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

</head>

<body>
  	<div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Menu Principal
                    </a>
                </li>
                <li>
					<a href="MenuPrincipal.php"> Iní­cio</a>                
                </li>
                <li>
					<a href="#"> Novo Pedido</a>                
                </li>
                <li>
                    <a href="listCli.jsp">Clientes</a>
                </li>
                <li>
                    <a href="#">Produtos</a>
                </li>
                <li>
                    <a href="#">Relatorios</a>
                </li>
                <li>
                    <a href="ListFunc.php">Funcionarios</a>
                </li>
                <li>
                    <a href="#">Vendas</a>
                </li>
                <li>
                    <a href="index.php">Fazer Logoff</a>
                </li>
            </ul>
        </div>

        <a class="btn btn-default" id="menu-toggle" onclick="menuToggle()" aria-label="Skip to main navigation">
  			<i class="fa fa-bars" aria-hidden="true"></i>
		</a>
    </div>
    <!-- /#wrapper -->
		
    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/jquery-3.2.1.js"></script>
    <script src="../assets/js/tether.js"></script>
    <script src="../assets/js/alertify.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/MenuPrincipal.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
</body>

</html>
<?php
require_once '../model/Funcionario.php';
require_once '../dao/FuncionarioDao.php';
require '../util/DestroiSessao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="../../favicon.ico"> -->

  <title>JEBLanches</title>

  <!-- Bootstrap CSS -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/tether.css" rel="stylesheet">

  <!-- Estilo customizado para essa tela -->
  <link href="../assets/css/index.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <h1>Seja bem-vindo ao JEBLanches</h1>
    <div class="col-md-4 col-md-offset-2 col-md-offset-">
       <?php
          $funcionario = new Funcionario("0","0","0");
          $funcionariodao = new FuncionarioDao();
          if(isset($_POST['acessar'])):

            $usuario = $_POST['txtUsuario'];
            $senha = $_POST['txtSenha'];

            if($funcionariodao->validaLogin($usuario,$senha)){
              session_start();
              $_SESSION["validacao"] = "true";
              header("Location: MenuPrincipal.php");
            }
          endif;  
       ?>
      <form method="POST">
        <div class="form-group">
          <label for="txtUsuario" class="form-control-label">Usuário</label>
          <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Informe o seu usuário..." required autofocus>
        </div>
        <div class="form-group">
          <label for="txtSenha" class="form-control-label">Senha</label>
          <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Informe a sua senha..." required>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar-me
          </label>
        </div>
        <button name="acessar" class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
      </form>
    </div>
  </div>
  <!-- /container -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../assets/js/jquery-3.2.1.js"></script>
  <script src="../assets/js/tether.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>

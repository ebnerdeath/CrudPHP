<?php
require '../util/ValidaSessao.php';
require '../dao/FuncionarioDao.php';
require '../model/Funcionario.php';
include 'MenuPrincipal.php';
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JEBLanches - Lista de Funcionarios</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!--  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">  -->

</head>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>Lista de Funcionários</h4>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">      
              <thead>
								<th>ID</th>
                <th>Nome</th>
                <th>Usuario</th>
                <th>Senha</th>
								<th>Visualizar</th>
								<th>Editar</th>
                <th>Excluir</th>
              </thead>
							<tbody>
							<?php
							$funcionariodao = new FuncionarioDao();
							// Inicia sessões
							if($funcionariodao->read()!=null){
								$arr = $funcionariodao->read();
								foreach($arr as $key => $funcionario){
									$arrObj[] = $funcionario;
										echo'<tr>';
										echo'<td data-id="'.$funcionario->getId().'">'.$funcionario->getId().'</td>';
										echo'<td data-nome="'.$funcionario->getNome().'">'.$funcionario->getNome().'</td>';
										echo'<td data-usuario="'.$funcionario->getUsuario().'">'.$funcionario->getUsuario().'</td>';
										echo'<td data-senha="'.$funcionario->getSenha().'">'.$funcionario->getSenha().'</td>';
										
										echo'<td><p data-placement="top" data-toggle="tooltip" title="Visualizar"><button id="btnVisualizar" class="btn btn-success btn-xs" data-title="Visualizar" data-toggle="modal" data-target="#modalVisualizar"><span class="fa fa-eye"></span></button></p></td>';
										
										echo'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button id="btnAlterar" class="btn btn-primary btn-xs" data-title="Editar" data-toggle="modal" data-target="#modalAlterar"> <span class="fa fa-pencil"></span></button></p></td>';
										
										echo'<td><p data-placement="top" data-toggle="tooltip" title="Excluir"><button id="btnExcluir" class="btn btn-danger btn-xs" data-title="Deletar" data-toggle="modal" data-target="#modalDeletar" ><span class="fa fa-trash"></span></button></p></td>';
									echo'</tr>';
								}
							}	
							?>	
							</tbody>  
					</table>
        </div>
			<!-- Modal ALTERAR -->
			<div class="modal fade" id="modalAlterar" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- Cabecalho do modal -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Alterar Funcionário</h4>
					</div>
					<!-- Corpo do modal -->
					<div class="modal-body">
						<!-- Formulario que vai cuidar de excluir os dados no back-end -->
						<form method="POST">
							<div class="form-group">
								<label for="codigoAlterar">Código</label>
								<input type="text" class="form-control" name="codigoAlterar" id="codigoAlterar" readonly>
							</div>
							<div class="form-group">
								<label for="nomeAlterar">Nome</label>
								<input type="text" class="form-control" name="nomeAlterar" id="nomeAlterar">
							</div>
							<div class="form-group">
								<label for="usuarioAlterar">Usuario</label>
								<input type="text" class="form-control" name="usuarioAlterar" id="usuarioAlterar">
							</div>
							<div class="form-group">
								<label for="senhaAlterar">Senha</label>
								<input type="text" class="form-control" name="senhaAlterar" id="senhaAlterar">
							</div>
						</form>
					</div>
					<!-- Footer do modal -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success">Confirmar</button></td>
					</div>  
				</div>
			</div>
			</div>


      <!-- Modal DELETE -->
      <div class="modal fade" id="modalDeletar" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Cabecalho do modal -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Excluir Funcionário</h4>
            </div>
            <!-- Corpo do modal -->
            <div class="modal-body">
						<?php
							$funcionario = new Funcionario(0,"0","0","0");
							$funcionariodao = new FuncionarioDao();
							if(isset($_POST['confirmaExclusao'])):

								$id = $_POST['codigoExcluir'];
								if($funcionariodao->delete($id)){
									header("Location: ListFunc.php");
								}								
							endif;  
						?>
              <!-- Formulario que vai cuidar de excluir os dados no back-end -->
              <form method="POST">
                <div class="form-group">
                  <label for="codigoExcluir">Código</label>
                  <input type="text" class="form-control" name="codigoExcluir" id="codigoExcluir" readonly>
                </div>
                <div class="form-group">
                  <label for="nomeExcluir">Nome</label>
                  <input type="text" class="form-control" name="nomeExcluir" id="nomeExcluir" readonly>
                </div>
                <div class="form-group">
                  <label for="usuarioExcluir">Usuario</label>
                  <input type="text" class="form-control" name="usuarioExcluir" id="usuarioExcluir" readonly>
                </div>
								<div class="form-group">
                  <label for="senhaExcluir">Senha</label>
                  <input type="text" class="form-control" name="senhaExcluir" id="senhaExcluir" readonly>
                </div>
								<!-- Footer do modal -->
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
									<button name="confirmaExclusao" id="confirmaExclusao" type="submit" class="btn btn-success">Confirmar</button></td>
								</div> 
              </form>
            </div>
	          	
      		</div>
    	</div>
  	</div>

		<!-- Modal VISUALIZAR -->
		<div class="modal fade" id="modalVisualizar" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Cabecalho do modal -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Visualizar Funcionário</h4>
            </div>
            <!-- Corpo do modal -->
            <div class="modal-body">
              <!-- Formulario que vai cuidar de excluir os dados no back-end -->
              <form method="POST">
                <div class="form-group">
                  <label for="codigoVisualizar">Código</label>
                  <input type="text" class="form-control" name="codigoVisualizar" id="codigoVisualizar" readonly>
                </div>
                <div class="form-group">
                  <label for="nomeVisualizar">Nome</label>
                  <input type="text" class="form-control" name="nomeVisualizar" id="nomeVisualizar" readonly>
                </div>
                <div class="form-group">
                  <label for="usuarioVisualizar">Usuario</label>
                  <input type="text" class="form-control" name="usuarioVisualizar" id="usuarioVisualizar" readonly>
                </div>
								<div class="form-group">
                  <label for="senhaVisualizar">Senha</label>
                  <input type="text" class="form-control" name="senhaVisualizar" id="senhaVisualizar" readonly>
                </div>
              </form>
            </div>
	          <!-- Footer do modal -->
	    			<div class="modal-footer">
	      			<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
	      		</div>  
      		</div>
    	</div>
  	</div>

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/js/popper.js"></script>
	<script src="../assets/js/ListFunc.js"></script>
	<script src="../assets/js/ListFunc.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	
</body>
</html>

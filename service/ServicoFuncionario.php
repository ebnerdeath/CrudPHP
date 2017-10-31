<?php
require '../dao/FuncionarioDao.php';
require '../model/Funcionario.php';

    if( isset( $_GET['servico'] ) ) { 

    $servico = $_GET['servico'];

        if ($servico == "INSERT") {
            $funcionariodao = new FuncionarioDao();

            $nome = $_POST['nomeInserir'];
            $usuario = $_POST['usuarioInserir'];
            $senha = $_POST['senhaInserir'];
            
            $funcionario = new Funcionario(0,$nome,$usuario,$senha);
            $funcionariodao->create($funcionario);
            print "Cadastro Realizado!";
        } else
        if ($servico == "UPDATE") {
            $funcionariodao = new FuncionarioDao();
            
            $id = $_POST['codigoAlterar'];
            $nome = $_POST['nomeAlterar'];
            $usuario = $_POST['usuarioAlterar'];
            $senha = $_POST['senhaAlterar'];

            $funcionario = new Funcionario($id,$nome,$usuario,$senha);

            $funcionariodao->update($funcionario);
        } else
        if ($servico == "DELETE") {
            $funcionariodao = new FuncionarioDao();
            
            $id = $_POST['codigoExcluir'];
            echo('ID: '.$id);
            $funcionario = new Funcionario($id);
            
            $funcionariodao->delete($id);
        }else
        if ($servico == "READ") {
            $funcionariodao = new FuncionarioDao();
            
            return $funcionariodao->read();
        }
    }  
?>
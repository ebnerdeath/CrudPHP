<?php
    // Inicia sessões
    if(!isset($_SESSION)){
        session_start();
    }
        // Verifica se existe os dados da sessão de login
    if(!isset($_SESSION["validacao"])){
        //  Usuário não logado! Redireciona para a página de login
        header("Location: ../view/index.php");
        exit;
    }
?>

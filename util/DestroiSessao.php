<?php
// Inicia sessões
session_start();
// Verifica se existe os dados da sessão de login
if(isset($_SESSION["validacao"])){
    unset($_SESSION['validacao']);
}
?>
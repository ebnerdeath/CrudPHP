<?php
    $server = "localhost";
    $bd = "crud";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
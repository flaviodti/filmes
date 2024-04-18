<?php

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if($usuario == '123' && $senha == '456'){
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = 'Flavio';
    header("Location: cadastroFilmes.php");
}else{
    die("senha incorreta");
}
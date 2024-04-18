<?php
include("conexao.php");

$genero = $_POST['genero'];
$ano = $_POST['ano'];
$titulo = $_POST['titulo'];

$sql = "insert into filmes (genero, titulo, ano) values ($genero,'$titulo',$ano)";

if($conn->query($sql)){
    header("Location: index.php?resposta=1");
    $conn->close();
    die();
}else{
    header("Location: index.php?resposta=0");
    $conn->close();
    die();
}
$conn->close();
?>
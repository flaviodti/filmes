<?php
include("conexao.php");

$genero = $_POST['genero'];
$ano = $_POST['ano'];
$titulo = $_POST['titulo'];

$sql = "insert into filmes (genero, titulo, ano) values ($genero,'$titulo',$ano)";

if($conn->query($sql)){
    echo "registro incluido com sucesso";
}else{
    echo "erro: ".$conn->error;
}
$conn->close();
?>
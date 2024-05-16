<?php
include("conexao.php");

$filme = $_POST['filme'];


$sql = "delete from filmes where filme = $filme";

if($conn->query($sql)){
    header("Location: cadastroFilmes.php?resposta=3");
    $conn->close();
    die();
}else{
    header("Location: cadastroFilmes.php?resposta=4");
    $conn->close();
    die();
}
$conn->close();
?>
<?php include 'conexao.php'; 

// Buscar filmes já cadastrados
$sql = "SELECT f.filme,f.titulo,f.ano,g.descricao as genero, g.genero as idGenero FROM filmes f
inner join generos g on (g.genero=f.genero)";
$result = $conn->query($sql);
?>
<html>
    <head>    
        <title>Cadastro de Filmes</title>
        <script>
            <?php 
            if(isset($_GET['resposta']) && $_GET['resposta']==1){
                ?>alert("incluido com sucesso");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==0){
                ?>alert("erro ao inserir");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==3){
                ?>alert("excluído com sucesso");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==4){
                ?>alert("erro ao excluir");<?php
            } ?>
        </script>
    </head>
    <body>
        <h1>Cadastro de Filmes</h1>
        <form action = "login.php" method="post">
           
                Usuario: <input type="text" name="usuario" id="usuario">
                senha: <input type="password" name="senha" id="senha">
                <input type="submit" value="enviar">
        </form>
       
    </body>
</html>

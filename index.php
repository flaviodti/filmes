<?php
include("conexao.php");
?>
<html>
    <head>    
        <title>Cadastro de Filmes</title>
    </head>
    <body>
        <h1>Cadastro de Filmes</h1>
        <form action = "cadastrar.php" method="post">
            Genero: <?php
                $sqlGeneros = "select genero, descricao from generos where status=1";
                $resultado = $conn->query($sqlGeneros);
                ?>
                <select name="genero" id="genero">
                    <option value="">selecione uma opção</option>
                <?php
                while($row = $resultado->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row["genero"];?>"><?php echo $row["descricao"];?></option>
                    <?php
                }
                ?>
                </select>
                Ano: <input type="number" name="ano" id="ano">
                Titulo: <input type="text" name="titulo" id="titulo">
                <input type="submit" value="enviar">
        </form>

    </body>
</html>
<?php
    $conn->close();
?>
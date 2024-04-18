<?php include 'conexao.php'; 

// Buscar filmes já cadastrados
$sql = "SELECT * FROM filmes";
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
            } ?>
        </script>
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
        <h2>Filmes Cadastrados</h2>
            <table border="1">
                <tr>
                    <th>Gênero</th>
                    <th>Título</th>
                    <th>Ano</th>
                </tr>
                <?php if ($result->num_rows > 0){ ?>
                    <?php while($row = $result->fetch_object()){ ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row->genero); ?></td>
                            <td><?php echo htmlspecialchars($row->titulo); ?></td>
                            <td><?php echo htmlspecialchars($row->ano); ?></td>
                        </tr>
                    <?php } ?>
                <?php }else{ ?>
                    <tr>
                        <td colspan="4">Nenhum filme cadastrado.</td>
                    </tr>
                <?php } ?>
            </table>
    </body>
</html>
<?php
    $conn->close();
?>
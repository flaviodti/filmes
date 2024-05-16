<?php include 'conexao.php'; 
session_start();
// Buscar filmes já cadastrados
$sql = "SELECT f.filme,f.titulo,f.ano,g.descricao as genero, g.genero as idGenero 
            FROM filmes f
            inner join generos g on (g.genero=f.genero)";
$result = $conn->query($sql);
?>
<html>
    <head>    
        <title>Cadastro de Filmes</title>
        <script>
            function troca(filme){
                
                document.getElementById("titulo_"+filme).style.display='none';
                document.getElementById("ano_"+filme).style.display='none';
                document.getElementById("tituloE_"+filme).style.display='';
                document.getElementById("anoE_"+filme).style.display='';
                document.getElementById("salvar_"+filme).style.display='';
                document.getElementById("editar_"+filme).style.display='none';
                
                
            }

            <?php 
            if(isset($_GET['resposta']) && $_GET['resposta']==1){
                ?>alert("incluido com sucesso");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==0){
                ?>alert("erro ao inserir");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==3){
                ?>alert("excluído com sucesso");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==4){
                ?>alert("erro ao excluir");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==5){
                ?>alert("aditado com sucesso");<?php
            }else if(isset($_GET['resposta']) && $_GET['resposta']==6){
                ?>alert("erro ao editar");<?php
            } ?>
        </script>
    </head>
    <body>
        <h2>Bem vindo <?=$_SESSION['nome'];?></h2>
        <h1>Cadastro de Filmes</h1>
        <form action = "cadastrar.php" method="post">
            Genero: <?php
                $sqlGeneros = "select genero, descricao from generos where status=1";
                $resultado = $conn->query($sqlGeneros);
                ?>
                <select name="genero" id="genero">
                    <option value="">selecione uma opção</option>
                    <?php
                    while($row2 = $resultado->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row2["genero"];?>"><?php echo $row2["descricao"];?></option>
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
                    <th>Salvar Alterações</th>
                    <th>Excluir</th>
                </tr>
                <?php if ($result->num_rows > 0){ ?>
                    <?php while($row = $result->fetch_object()){ ?>
                        <tr>
                     
                            <td>
                                <?php
                                $sqlGeneros = "select genero, descricao from generos where status=1";
                                $resultado = $conn->query($sqlGeneros);
                                ?>
                                <form action="alterar.php" method="post" name="form_<?=$row->filme;?>">
                                <select name="genero" id="genero">
                                    <option value="">selecione uma opção</option>
                                    <?php
                                    while($row2 = $resultado->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row2["genero"];?>" <?=($row2["genero"]==$row->idGenero)?'selected':'';?> ><?php echo $row2["descricao"];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            
                            <td><div id="tituloE_<?=$row->filme;?>" style="display: none;"><input name="titulo" type="text" value="<?php echo htmlspecialchars($row->titulo); ?>"></div>
                                <div id="titulo_<?=$row->filme;?>"><?php echo htmlspecialchars($row->titulo); ?></div></td>
                            <td><div id="anoE_<?=$row->filme;?>" style="display: none;"><input name="ano" type="text" value="<?php echo htmlspecialchars($row->ano); ?>"></div>
                                <div id="ano_<?=$row->filme;?>"><?php echo htmlspecialchars($row->ano); ?></div></td>
                            <td><div id="editar_<?=$row->filme;?>" style="cursor:pointer;" onclick="troca(<?=$row->filme;?>);">Editar</div>
                            <div id="salvar_<?=$row->filme;?>" style="cursor:pointer; display:none;" onclick="document.form_<?=$row->filme;?>.submit()">Salvar</div></td>
                            <input type="hidden" name="filme" value="<?=$row->filme;?>">    
                            </form>
                            <td><form action="excluir.php" method="post">
                                <input type="hidden" name="filme" value=<?=$row->filme;?>>
                                <input type="submit" value="Excluir">
                            </form></td>
                        </tr>
                
                    <tr>
                        <td colspan="4">Nenhum filme cadastrado.</td>
                    </tr>
                <?php }
                } ?>
            </table>
    </body>
</html>
<?php
    $conn->close();
?>
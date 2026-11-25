<?php

include "config/conexao.php";

$pesquisa = $_GET["pesquisa"] ?? "";

$sql = "SELECT * FROM produtos
        WHERE nome LIKE '%$pesquisa%'";
        
$resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Lista de Produtos</h2>

        <form action="listar.php" method="GET">
            <input type="text" name="pesquisa"
            placeholder="Digite o nome do produto">
            <button type="submit">🔍 Pesquisa</button>
            <br><br>
            <a href="listar.php">Limpar</a>
        </form>

        <table>
            <br><br>
            <tr>
                <th>ID</th>
                <th>Imagens</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ação</th>
            </tr>
            <?php while($produto = $resultado->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $produto["id"]; ?></td>
                <td>

                <?php if ($produto["imagem"]): ?>
                    <img width="70px" src="uploads/<?=$produto["imagem"] ?>">
                    <?php else: ?>
                        <span>Sem imagem</span>
                        <?php endif; ?>
                </td>
                <td><?php echo $produto["nome"]; ?></td>
                <td><?php echo $produto["categoria"]; ?></td>
                <td><?php echo $produto["preco"]; ?></td>
                <td><?php echo $produto["qtd"]; ?></td>

                <td>
                    <a href="editar.php?id=<?php echo $produto["id"]; ?>">Editar</a> ㅤ|ㅤ 
                    <a href="excluir.php?id=<?php echo $produto["id"]; ?>">Excluir</a>
                </td>
            
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href="cadastrar.html" class="botao">Voltar para o cadastro</a>
    </div>

</body>
</html>

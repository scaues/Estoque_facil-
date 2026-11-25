<?php

include "config/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];

// CORREÇÃO: Tabela correta (produtos) e vírgula adicionada após o nome
$sql = "UPDATE produtos set
        nome = '$nome',
        categoria = '$categoria',
        preco = '$preco',
        qtd = '$quantidade'
        WHERE id = $id";

if ($conexao->query($sql)) {
    echo "✅ Produto atualizado com sucesso!";
} else {
    echo "❌ Erro ao atualizar produto.";
}

// CORREÇÃO: Fechamento da tag a
echo "<br><a href='listar.php'> Voltar para a lista </a>";

?>
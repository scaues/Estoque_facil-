<?php

include "config/conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($senha, $usuario["senha"])) {
        session_start();
        $_SESSION["usuario"] = $usuario["nome"];
        header("Location: index.php");
        exit;
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}

echo "<br><a href='login.html'>Voltar</a>";
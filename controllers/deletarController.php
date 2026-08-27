<?php
include __DIR__ . "/../config/conexao.php";

// Verifica se o ID foi enviado via URL (GET)
if (isset($_GET['id'])) {
    
    // Assegura que o ID é estritamente um número inteiro (proteção contra SQL Injection)
    $id = intval($_GET['id']);

    // Comando SQL de remoção do registro correspondente
    $sql = "DELETE FROM usuarios WHERE id = $id";
    
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        // Sucesso: Redireciona de volta para a listagem
        header("Location: ../listar_usuarios.php");
        exit;
    } else {
        echo "Erro crítico ao tentar excluir o registro: " . mysqli_error($conexao);
    }
} else {
    // Se acessarem o arquivo sem passar ID, redireciona por segurança
    header("Location: ../listar_usuarios.php");
    exit;
}
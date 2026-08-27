<?php
include __DIR__ . "/../config/conexao.php";

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Coleta e limpa os dados vindos do formulário
    $id = intval($_POST['id']);
    $nome = ucfirst(mysqli_real_escape_string($conexao, $_POST['nome']));
    $sobrenome = ucfirst(mysqli_real_escape_string($conexao, $_POST['sobrenome']));
    $data_nascimento = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);

    // Comando SQL de atualização
    $sql = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', data_nascimento = '$data_nascimento' WHERE id = $id";
    
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        // Sucesso: Redireciona de volta para a listagem
        header("Location: ../listar_usuarios.php");
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conexao);
    }
} else {
    // Se alguém tentar acessar esse arquivo direto pela URL sem mandar POST, manda de volta
    header("Location: ../listar_usuarios.php");
    exit;
}
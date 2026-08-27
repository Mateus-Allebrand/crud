<?php 
$servidor = "db";
$usuario = "root";
$senha = "rootpassword";
$banco = "sistema_cadastro";

$tentativas = 5;
$conexao = null;

while ($tentativas > 0) {
    $conexao = @mysqli_connect($servidor, $usuario, $senha, $banco);
    if ($conexao) {
        break;
    }
    $tentativas--;
    sleep(2); // Aguarda 2 segundos antes de tentar novamente
}

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8mb4");
?>
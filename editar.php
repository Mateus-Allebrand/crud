<?php
// Inclui o controller onde está a conexão e a função de busca
include "controllers/userController.php";

// Pega o ID enviado via GET na URL (ex: editar.php?id=8)
$idUsuario = $_GET['id'] ?? null;

// Se nenhum ID foi passado, redireciona de volta para a listagem por segurança
if (!$idUsuario) {
    header("Location: listar.php");
    exit;
}

// Busca os dados atuais do usuário no banco (retorna um dicionário)
$usuario = buscarUsuarioPorId($idUsuario);

// Se o usuário não existir no banco, também redireciona
if (!$usuario) {
    header("Location: listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="app-container">
        <?php include 'layout/sidebar.php';?>
        <div class="layout-wrapper">
            <?php include 'layout/topbar.php';?>
            <main>               
                <div class="main_content">
                    <h2 id="editar_usuario">Editar Usuário</h2>
                    
                    <!-- O formulário envia os dados via POST para o script processador -->
                    <form action="controllers/atualizarController.php" method="POST">
                        
                       <!-- CAMPO OCULTO (Hidden): Essencial para o PHP saber QUEM ele está atualizando -->
                       <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                        <div class="divs_dados_usuario" >
                            <label>Nome:</label><br>
                            <input class="in_dados_usuarios" type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required >
                        </div>

                        <div class="divs_dados_usuario" ">
                            <label>Sobrenome:</label><br>
                            <input class="in_dados_usuarios" type="text" name="sobrenome" value="<?php echo $usuario['sobrenome']; ?>" required >
                        </div>

                        <div class="divs_dados_usuario"  >
                            <label>Data de Nascimento:</label><br>
                            <input class="in_dados_usuarios" type="date" name="data_nascimento" value="<?php echo $usuario['data_nascimento']; ?>" required >
                        </div>

                        <button class="btn_submit" type="submit" >
                            Salvar Alterações
                        </button>
                        <a class="btn_cancelar" href="listar_usuarios.php" >Cancelar</a>
                    </form>
                </div>
            </main>
        </div>
    </div>  
</body>
</html>
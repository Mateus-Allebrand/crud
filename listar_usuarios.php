<?php
include "controllers/userController.php";

$usuarios = listar_usuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="app-container">
        <!-- Incluir barra lateral -->
        <?php include 'layout/sidebar.php';?>
        <div class="layout-wrapper">
            <!-- aqui ira o topbar -->
            <?php include 'layout/topbar.php';?>
            <main class="main_listar">                
                <h2 class="listar_titulo_page">Lista de Usuários</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>dt_Nascimento</th>
                            <th>Ações</th> <!-- Nova Coluna -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($usuarios)): ?>
                            <tr>
                                <td colspan="4">Nenhum usuário cadastrado.</td>
                            </tr>
                        <?php else: ?>
                            <!-- Varre a lista de usuários -->
                            <?php foreach ($usuarios as $user): ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['nome']; ?></td>
                                    <td><?php echo $user['sobrenome']; ?></td>
                                    <td><?php echo $user['data_nascimento']; ?></td>
                                    <td class="botoes_de_acoes_box">
                                        <!-- Botão de Editar: Redireciona passando o ID na URL -->
                                        <a href="editar.php?id=<?php echo $user['id']; ?>" class="btn-editar"><i class="fa fa-pen" id="lapis"></i>Editar
                                        
                                        </a>

                                        <!-- Botão de Excluir: Pode enviar para um script que processa o delete -->
                                        <a href="controllers/deletarController.php?id=<?php echo $user['id']; ?>" 
                                        class="btn-excluir" 
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?');"
                                        ><i class="fa fa-trash" id="lixeira"></i>Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                </table>
            </main>
        </div>

    </div>  
</body>
</html>
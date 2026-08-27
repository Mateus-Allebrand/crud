<?php
    include "controllers/userController.php";

    $numero_users = calcular_num_usuarios();
    $user_cadastrados = num_users_cadastardos();
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
            <main class="home-container">
                <!-- Título da Seção -->
                <!-- <div class="welcome-header">
                    <h2>Visão Geral do Sistema</h2>
                    <p>Bem-vindo ao painel de gerenciamento </p>
                </div> -->
                <!-- Atalhos de Ação Rápida -->
                <div class="quick-actions">
                    <h3>Ações Rápidas</h3>
                    <div class="action-buttons">
                        <a href="cadastrar.php" class="btn-action">
                            <i class="fa-solid fa-user-plus"></i> Novo Cadastro
                        </a>
                        <a href="listar_usuarios.php" class="btn-action secondary">
                            <i class="fa-solid fa-list"></i> Ver Lista Completa
                        </a>
                    </div>
                </div>
                <!-- Cards de Indicadores (KPIs) -->
                <div class="kpi-grid">
                    <div class="kpi-card">
                        <i class="fa-solid fa-users"></i>
                        <div class="kpi-info">
                            <span>Total de Usuarios</span>
                            <h3><?=$numero_users?></h3>
                        </div>
                    </div>

                    <div class="kpi-card">
                        <i class="fa-solid fa-user-plus"></i>
                        <div class="kpi-info">
                            <span>Cadastrados Hoje</span>
                            <h3><?=$user_cadastrados?></h3>
                        </div>
                    </div>

                    <div class="kpi-card">
                        <i class="fa-solid fa-database"></i>
                        <div class="kpi-info">
                            <span>Status do Banco</span>
                            <h3 class="status-online">Conectado</h3>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>  
</body>
</html>
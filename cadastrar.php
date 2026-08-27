<?php
include "controllers/userController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {cadastrarUsuario();
    }
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
            <main>                
                <form action="" method="post" class="main_content">
                    <div class="cadastro">
                        <label for="nome">Nome</label>
                        <input class="in_cadatrar" type="text" id="nome" name="nome" required>
                    </div>
                    <div class="cadastro">
                        <label for="sobrenome" >Sobrenome</label>
                        <input  class="in_cadatrar" type="text" id="sobrenome" name="sobrenome" required>
                    </div>
                    <div class="cadastro">
                        <label for="data_nascimento">Data de nascimento</label>
                        <input class="in_cadatrar" type="date" id="data_nascimento" name="data_nascimento" required>
                    </div>
                        <div class="cadastro" id="botao_cadastrar">
                            <input type="submit" value="Cadastrar">
                        </div>
                    </form>
            </main>
        </div>

    </div>  
</body>
</html>
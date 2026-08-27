<?php
$paginaAtual = basename($_SERVER["PHP_SELF"]);

$titulo_pagina = "";

if ($paginaAtual == "index.php") {$titulo_pagina= "Home - Visão geral";
} else if ($paginaAtual == "cadastrar.php") {$titulo_pagina= "Cadastrar Clientes";
} else if ($paginaAtual == "listar_usuarios.php"){$titulo_pagina= "Usuarios Cadastrados";}
?>

<header class="topbar">
        <div class="titulo_pagina">
                <h1><?= $titulo_pagina ?></h1>
        </div>
        <div class="usuario-info">
                <span>Operador: Admin</span>
        </div>
</header>
<?php 
ob_start(); // Inicia o buffer de saída
include __DIR__ . "/../config/conexao.php";


function cadastrarUsuario(){
        global $conexao;

        $nome = ucfirst(mysqli_real_escape_string($conexao,$_POST["nome"]));
        $sobrenome = ucfirst(mysqli_real_escape_string($conexao,$_POST["sobrenome"]));
        $data_nascimento = mysqli_real_escape_string($conexao,$_POST["data_nascimento"]);

        $sql = "INSERT INTO 
                    usuarios (nome, sobrenome, data_nascimento) 
                VALUES 
                    ('$nome','$sobrenome','$data_nascimento')";

        if (mysqli_query($conexao,$sql)) 
            {
                $ultimo_id = mysqli_insert_id($conexao);

                $sql_log = "INSERT INTO historico_cadastros (usuario_id) VALUES($ultimo_id)";

                mysqli_query($conexao,$sql_log);

                header("Location: cadastrar.php?sucesso=1");
            exit;
            }
        else 
            { echo "Erro ao cadastrar: ".mysqli_error($conexao);
            }  
        }


function calcular_num_usuarios(){
    global $conexao;

    $sql = "SELECT COUNT(*) AS total FROM usuarios";

    $resultado = mysqli_query($conexao,$sql);

    if ($resultado)
        {
        $dados = mysqli_fetch_assoc($resultado);
        
        return $dados["total"];
        } 
    else 
        { return 0;
        }

}


function num_users_cadastardos(){
    global $conexao;

    $sql = "SELECT COUNT(*) AS total FROM historico_cadastros WHERE DATE(data_registro) = CURRENT_DATE";

    $resposta = mysqli_query($conexao,$sql);

    if($resposta){
        $dados = mysqli_fetch_assoc($resposta);

        return $dados["total"];
    } 
    else { 
        return 0;
        }
    
}




function listar_usuarios(){
    global $conexao;

    $sql = "SELECT * FROM usuarios";

    $resultado = mysqli_query($conexao,$sql);

    $usuarios = [];

    if ($resultado){
        while($lista = mysqli_fetch_assoc($resultado)){
            $usuarios[] = $lista;
        }
    }

    return $usuarios;

}

function buscarUsuarioPorId($id) {
    global $conexao;
    
    // Assegura que o ID é um número inteiro (segurança defensiva contra SQL Injection básico)
    $id = intval($id);
    
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);
    
    // Se encontrou o registro, transforma o resultado em um dicionário (array associativo)
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    }
    
    return null; // Retorna nulo caso não encontre
}

?>




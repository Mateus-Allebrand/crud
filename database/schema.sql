-- Cria o banco de dados caso ele não exista
CREATE DATABASE IF NOT EXISTS sistema_cadastro;
USE sistema_cadastro;

-- Tabela principal de usuários do CRUD
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de histórico analítico para o dashboard (logs de cadastros diários)
CREATE TABLE IF NOT EXISTS historico_cadastros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    acao VARCHAR(50) DEFAULT 'cadastro',
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_historico FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
<?php
function conectar() {
    // Configuração da conexão com o banco de dados
    $host = "localhost";
    $usuario = "root";
    $senha = "root";
    $banco = "eleicaoconselho";

    // Conectar ao banco de dados
    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    // Verificar se a conexão foi estabelecida com sucesso
    if (!$conexao) {
        echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
        exit();
    }

    return $conexao;
}
?>
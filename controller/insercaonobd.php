<?php
include_once(__DIR__."/../dao/conexao.php");
$conexao = conectar();

// Defina os valores constantes para cod_local e zona
$cod_local =null;
$zona = null;

// Lista de seções a serem inseridas
$secoes=[];
// Consulta SQL preparada para inserir uma linha
$sql = "INSERT INTO zonasecao (cod_local, zona, secao) VALUES (?, ?, ?)";

// Preparar a consulta SQL
$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . mysqli_error($conexao));
}

// Loop para inserir as seções
foreach ($secoes as $secao) {
    // Atribuir valores aos parâmetros da consulta preparada
    mysqli_stmt_bind_param($stmt, "iii", $cod_local, $zona, $secao);

    // Executar a consulta
    if (mysqli_stmt_execute($stmt)) {
        echo "Inserido com sucesso: cod_local=$cod_local, zona=$zona, secao=$secao<br>";
    } else {
        echo "Erro ao inserir: " . mysqli_error($conexao) . "<br>";
    }
}

// Fechar a consulta preparada e a conexão
mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>

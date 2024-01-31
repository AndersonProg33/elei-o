<?php
include_once(__DIR__."/../dao/conexao.php");
$conexao = conectar();

function cadastrarV($dados, $conexao)
{
    // Verificar se já existe um registro com os mesmos dados
    $sqlVerificar = "SELECT cod_pessoa FROM pessoa WHERE nome = ? AND telefone = ?";
    $stmtVerificar = mysqli_prepare($conexao, $sqlVerificar);

    if (!$stmtVerificar) {
        echo "Erro na preparação no comando SQL: " . mysqli_error($conexao);
        return false;
    }

    mysqli_stmt_bind_param($stmtVerificar, 'ss', $dados['nome'], $dados['telefone']);
    mysqli_stmt_execute($stmtVerificar);
    mysqli_stmt_store_result($stmtVerificar);

    if (mysqli_stmt_num_rows($stmtVerificar) > 0) {
        // Registro já existe, redireciona para "inicio2.php" com parâmetros GET
        $nome = urlencode($dados['nome']);
        $telefone = urlencode($dados['telefone']);
        header("Location: ../view/inicio2.php?nome=$nome&telefone=$telefone");
        exit();
    } else {
        // Preparar a consulta SQL para a inserção
        $sql = "INSERT INTO pessoa (nome, telefone) VALUES (?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);

        if (!$stmt) {
            echo "Erro na preparação no comando SQL: " . mysqli_error($conexao);
            return false;
        }

        // Vincular os parâmetros
        mysqli_stmt_bind_param($stmt, 'ss', $dados['nome'], $dados['telefone']);

        // Executar o comando
        $result = mysqli_stmt_execute($stmt);

        // Verificar se o registro foi inserido com sucesso
        if ($result) {
            // Registro inserido com sucesso, redireciona para "inicio2.php" com parâmetros GET
            $nome = urlencode($dados['nome']);
            $telefone = urlencode($dados['telefone']);
            header("Location: ../view/inicio2.php?nome=$nome&telefone=$telefone");
            exit();
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conexao);
            return false;
        }
    }
}

// Chamar a função conectar para obter a conexão com o banco de dados
$conexao = conectar();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os valores do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;

    // Verificar se todos os campos obrigatórios foram preenchidos
    if (!$nome || !$telefone) {
        echo "Preencha todos os campos obrigatórios do formulário!";
        exit();
    }

    // Montar um array com os dados da demanda
    $votante = array(
        'nome' => $nome,
        'telefone' => $telefone,
    );

    if (cadastrarV($votante, $conexao)) {
        // Redirecionar para "inicio2.php" com parâmetros GET
        $nome = urlencode($nome);
        $telefone = urlencode($telefone);
        header("Location: ../view/inicio2.php?nome=$nome&telefone=$telefone");
        exit();
    }
}
?>

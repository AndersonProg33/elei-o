<!doctype html>
<html lang="pt">
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eleição Conselho Tutelar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Seus estilos personalizados -->
    <link rel="stylesheet" href="../css/vdd.css">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/style6.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <!-- jQuery e Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <!-- jQuery Mask para máscara de telefone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body class="home blog">
    
    <!-- INCLUIR CONTEUDO DA HOME -->
    <div class="container p-0" style="max-width:992px;">
        <div class="d-block shadow-lg">
            <div class="d-flex align-items-center bg-info" style="min-height: 354px">


                <header class="col-12 text-center m-0 p-0">

                    <div class="imagem-header">
                        
                    </div>
                </header>
            </div>

          


            <?php
            include_once(__DIR__."/../dao/conexao.php");
            $conexao = conectar();

            if (isset($_POST['pesquisar'])) {
            // Verifique se a zona e a seção foram selecionadas
            if (isset($_POST['zona']) && isset($_POST['secao'])) {
            $zona = $_POST['zona'];
            $secao = $_POST['secao'];

            // Consulta SQL para obter o local de votação com base na zona e seção selecionadas
            $sql = "SELECT locais.und_votacao, locais.endereco
                FROM zonasecao
                INNER JOIN locais ON zonasecao.cod_local = locais.cod_local
                WHERE zonasecao.zona = $zona AND zonasecao.secao = $secao";

            $resultado = mysqli_query($conexao, $sql);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $undVotacao = $row['und_votacao'];
            $endereco = $row['endereco'];
            } else {
            $undVotacao = "Não encontrado";
            $endereco = "Não encontrado";
            }
            } else {
            $undVotacao = "Selecione Zona e Seção";
            $endereco = "";
             }
            } else {
        $undVotacao = "Preencha os campos e clique em Pesquisar";
        $endereco = "";
         }
        ?>

            <div class="d-flex flex-column justify-content-between" style="min-height: 60vh">
                <div class="row p-3 mx-0">
                    <div class="d-flex justify-content-center align-items-center text-center">
                        <div class="col-12">
                            <div class="row">
                                <p class="txt_inicial">Preencha os campos abaixo, consulte seu local de votação e
                                    compareça levando um
                                    documento com foto e o título de eleitor.</p>
                            </div>
                            <div class="row">
                                <form action="" method="post">
                                    <div>
                                    <h5 class="hh5">Zona:</h5><select class="select zona form-select zona1"  name="zona"
                                            onchange="this.form.submit()">
                                            <option>Selecione a Zona Eleitoral</option>
                                            <?php
                                // Preencha as opções do select com as zonas eleitorais do banco de dados
                                $sql = "SELECT DISTINCT zona FROM zonasecao ORDER BY zona ASC";
                                $result = mysqli_query($conexao, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $selected = ($row['zona'] == $_POST['zona']) ? 'selected' : '';
                                    echo '<option value="' . $row['zona'] . '" ' . $selected . '>' . $row['zona'] . '</option>';
                                }
                                ?>
                                        </select>
                                    </div>
                                    <div>
                                        <h5 class="hh5">Seção:</h5><select class="select secao form-select zona1" name="secao" >
                                            <option>Selecione uma Seção</option>
                                            <?php
                                // Preencha as opções do select com as seções eleitorais do banco de dados
                                if (isset($_POST['zona'])) {
                                    $zonaSelecionada = $_POST['zona'];
                                    $sql = "SELECT DISTINCT secao FROM zonasecao WHERE zona = $zonaSelecionada ORDER BY secao ASC";
                                    $result = mysqli_query($conexao, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['secao'] == $_POST['secao']) ? 'selected' : '';
                                        echo '<option value="' . $row['secao'] . '" ' . $selected . '>' . $row['secao'] . '</option>';
                                    }
                                }
                                ?>
                                        </select>
                                    </div><br>
                                    <div>
                                        <button type="submit" name="pesquisar" class="btn btn-cor">Pesquisar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <div class="resultado d-flex flex-column flex-md-row">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div
                                            class="d-flex flex-column p-3 justify-content-center col-12 col-md-8 text-start local-votacao">
                                            <b>Local de Votação</b>
                                            <p>
                                                <?php echo $undVotacao; ?><br>
                                                <?php echo $endereco; ?>
                                            </p>
                                        </div>
                                        <?php
                                // Construa a URL do Google Maps com base no endereço definido
                            $enderecoParaMaps = urlencode($endereco); // Codifica o endereço para ser usado em uma URL

                                $mapsUrl = "https://www.google.com/maps/place/" . $enderecoParaMaps;

                                    echo '<a href="' . $mapsUrl . '" target="_blank">';
                                        ?>
                                        <div class="col-4 bg_resultado">
                                            <img src="../img/local.png.png" alt="">
                                            <p>veja como chegar</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer id="footer" class="col-12">
            <div>


                <div class="barra-secondary"></div>
                <div class="barra-primary"></div>
        </footer>
    </div>
    </div>
    </footer>
    <script type='text/javascript' src='../script/js/wp-embed.min.js?ver=5.8.7' id='wp-embed-js'></script>

    <!-- ANCHOR Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>



       




</body>

</html>
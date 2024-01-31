<!doctype html>
<html lang="pt">
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eleições</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Seus estilos personalizados -->
    <link rel="stylesheet" href="../css/vdd.css">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/style5.css">
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
            
            <div class="row">
                                <p class="txt_inicial testlinha">Para consultar seu local de votação, Preencha os campos abaixo e prossiga.</p>
                                <p class="txt_inicial"> 
                            </div>
            <div class="row">
            <form class="form" action="../controller/cadVotante.php" method="post">
    
                <div class="form_grupo">
                <label for="nome" class="form_label"><h5 class="hh5l">Nome</h5></label><br>
             <input type="text" name="nome" class="input nome form-select zona1" id="nome" placeholder="Nome" required>
            </div><br>
    
    
            <div class="form_grupo">
                <label for="nome" class="form_label"><h5 class="hh5l ">Telefone</h5></label><br>
                <input type="text" name="telefone" class="input tel form-select zona1 "  id="telefone" placeholder="(00) 00000-0000" required="required" aria-describedby="emailHelp"  onkeypress="$(this).mask('(00) 00000-0000')">
            </div>
    
            <div class="submit">

                <input type="hidden" name="acao" value="enviar" >
                <button type="submit" name="Submit" class="btn btn-cor " id="botao-aj" >Proseguir</button>
        
            </div>
            </form>

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
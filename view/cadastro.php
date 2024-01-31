<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro2.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <title>Document</title>
</head>
<div class="container_form">

<h1>Formulário</h1>

<form class="form" action="../controller/cadVotante.php" method="post">
    
    <div class="form_grupo">
        <label for="nome" class="form_label">Nome</label><br>
        <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome" required>
    </div><br>
    
    
    <div class="form_grupo">
        <label for="nome" class="form_label ">Telefone</label><br>
        <input type="text" name="telefone" class="form_input" id="telefone" placeholder="(00) 00000-0000" required="required" aria-describedby="emailHelp"  onkeypress="$(this).mask('(00) 00000-0000')">
    </div>
    
        <div class="submit">

          <input type="hidden" name="acao" value="enviar">
          <button type="submit" name="Submit" class="submit_btn" >Proseguir</button>
        
        </div>
</form>

</div>
</body>
</html>
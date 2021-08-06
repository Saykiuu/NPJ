<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="shortcut icon" href="../img/fied.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <script type="text/javascript" src="../js/mensagem.js"></script>

</head>

<body>
    

    <div>

        <form id="form" method="POST" name="cad_user" action="processo.usuario.php">
        <h1>Cadastro</h1>
        <label for="ipn-nome" class="label">Nome</label>
        <input type="text" name="nome" class="cad-campo" id="ipn-nome" required autocomplete="off">

        <label for="GRA"  class="label">GRA</label>
        <input type="text" name="gra" class="cad-campo" id="ipn-gra" required autocomplete="off">

        <label for="email"  class="label">Email</label>
        <input type="email" class="cad-campo" name="email" id="inp-email" required autocomplete="off">

        <label for="login"  class="label">Login do usuário</label>
        <input type="text" name="login" class="cad-campo" id="inp-login" required autocomplete="off">

        <label for="senha"  class="label">Senha do Usuário</label>
        <input type="password" name="senha" class="cad-campo" id="-inp-senha" required autocomplete="off">

        <label for="master" class="label">Senha Master</label>
        <input type="password" name="master" class="cad-campo" id="inp-master" required autocomplete="off">

        
       
        <a href="index.php">ja sou cadastrado</a>
        <button id ="cadastrar" onclick="validar()">Salvar</button>
        </form>
       
    </div>

  
</body>

</html>
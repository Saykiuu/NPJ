
<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/fied.png">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>

</head>

<body>


    <div id="formulario">
        <h1>Login</h1>


        <form action="logar.php" method="post">

            <label for="ipn-nome" class="label">Usuário</label>
            <input type="text" name="user" class="cad-campo" id="ipn-nome" required autocomplete="off">

            <label for="inp-senha" class="label">Senha</label>
            <input type="password" name="senha" class="cad-campo" id="ipn-senha" required autocomplete="off">


            <button type="submit " id="entrar">Entrar</button>
        </form>



        <div id="opçoes">


            <p>Não é cadastrado?</p>
            <a href="cadastro.php">Registre-se</a>
        </div>
    </div>

</body>

</html>


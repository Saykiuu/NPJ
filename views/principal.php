<?php
session_start();
require_once("pdo.php");
if ($_SESSION['id'] == '1') {
    $stmt = $cbd->query("SELECT a.id_processo, a.cor, b.nome, b.cpf, c.dt_entrada, c.link, c.ass_primario FROM processo a,cliente b,dprocessuais c WHERE a.id_cliente = b.id_cliente AND a.id_dprocessuais = c.id_dprocessuais");
} else {

    $stmt = $cbd->query("SELECT a.id_processo, a.cor, b.nome, b.cpf, c.dt_entrada, c.link, c.ass_primario FROM processo a,cliente b,dprocessuais c WHERE a.id_cliente = b.id_cliente AND a.id_dprocessuais = c.id_dprocessuais AND a.id_usuario = " . $_SESSION['id']);
}
?>
<?php
$cont = 1000001;
$cont2 = 1000002;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link rel="shortcut icon" href="../img/fied.png">
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../js/barra-pesquisa.js"></script>
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/bloco.css">

    <style>
        .bloco {
            width: 250px;
            border: 2px solid #ccc;
            border-radius: 10px;
            height: 300px;
            float: left;
            margin: 30px 30px;
            padding: 50px 5px 5px 5px;


        }


        p {
            text-align: center;
            padding: 5px;
            color: white;
        }

        .editar {
            text-decoration: none;
            color: black;
        }

    a {
            cursor: pointer;
        }

        .editar {
           
            float: left;
        }

        .exclui {
            color: black;
            
            float: right;
        }
    </style>

    <script>
        function pergunta(local) {
            if (confirm('Tem certeza que quer excluir este formulário?')) {

                console.log('caquinha');
                window.location.href = "processo.excluir.php?id=" + local;
            }
        }

        function setvalor(valor) {
            document.getElementById("inv").value = valor;

        }

        function trocar(id, cont) {


            document.getElementById(id).style.background = "#ff9933"
            var n = document.getElementById("inv").value;
            console.log(n)
            n++;
            console.log(n);


            if (n > "3") {
                n = "0";
                setvalor(n);
            } else {

                if (n == "1") {
                    document.getElementById(id).style.background = "#5a6acd";
                    setvalor(n);

                }
                if (n == "2") {
                    document.getElementById(id).style.background = "#000080"
                    setvalor(n);


                }
                if (n == "3") {
                    document.getElementById(id).style.background = "#6495ed"
                    setvalor(n);

                }
            }
            girar(cont);


        }
    </script>
</head>

<body>
    <nav>
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <input type="checkbox" id="check">

        <a class="a" href="principal.php" onclick="pertunta()"><img src="../img/logo.png" width="140" height="60" style="margin-left: 30px; margin-bottom: -20px;"></a>

        <?php
        echo "<h2 id='h2'>Bem vindo " . $_SESSION['usuario'] . "!</h2>";
        ?>


        <ul>

            <li>
                <a class="a" href="incluir.php">
                    <t>Incluir</t>
                </a>
            </li>
            <li>
                <a class="a" href="logout.php">
                    <t>sair</t>
                </a>
            </li>

            <li>
                <form method="get">
                    <input type="search" id="pesquisar" class="pesquisar" name="search" autocomplete="off" onblur="esconder()" placeholder="Clientes, assunto, CPF ">
                </form>
            </li>
        </ul>

    </nav>


    <input type="nuber" id="inv" value="0" name="inv" style="display: none">


    <?php
    
        
        
    if (isset($_GET['search']) && !empty($_GET['search'])) {
    
        

        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            
            if($dados['nome'] == $_GET['search'] || $dados['cpf'] == $_GET['search'] || $dados['ass_primario'] == $_GET['search']){
                
            echo "<div class='bloco' style='background-color:" . $dados["cor"] . "' id='" . $dados['id_processo'] . "'>
            <a class ='editar' href='editar.php?id=" . $dados['id_processo'] . "'><i class='fa fa-edit'></i><a>
                <a class ='exclui' onclick='pergunta(" . $dados['id_processo'] . ")'><i class='fa fa-trash'></i><a>
                <p>" . $dados['nome'] . "</p>
                <p>" . $dados['cpf'] . "</p>
                <p>" . $dados['dt_entrada'] . "</p>
                <p>" . $dados['link'] . "</p>
                <p>" . $dados['ass_primario'] . "</p>
                <button id='$cont2' onclick='trocar(" . $dados['id_processo'] . ")'></button>
                ";
            echo "</div>";
            $cont2++;
            $cont++;
           
            }

            
        }
    }else{
        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {



            echo "<div class='bloco' style='background-color:" . $dados["cor"] . "' id='" . $dados['id_processo'] . "'>
            <a class ='editar' href='editar.php?id=" . $dados['id_processo'] . "'><i class='fa fa-edit'></i><a>
            <a class ='exclui' onclick='pergunta(" . $dados['id_processo'] . ")'><i class='fa fa-trash'></i><a>    
            <p>" . $dados['nome'] . "</p>
                <p>" . $dados['cpf'] . "</p>
                <p>" . $dados['dt_entrada'] . "</p>
                <p>" . $dados['link'] . "</p>
                <p>" . $dados['ass_primario'] . "</p>
                <button id='$cont2' onclick='trocar(" . $dados['id_processo'] . ")'></button>
              ";
            echo "</div>";
            $cont2++;
            $cont++;
        }

    }




    ?>

</body>

</html>
<?php
require_once('pdo.php');
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $stmt = $cbd->query("SELECT * FROM processo WHERE id_processo = ".$_GET['id']);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar!</title>
    <link rel="shortcut icon" href="../img/fied.png">
    <link rel="stylesheet" href="../css/abrir.css">
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="../css/preenchimetos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../js/navAbas.js"></script>
    <link rel="stylesheet" href="../css/navabas.css">
    <link rel="stylesheet" href="../css/pessoa.css">


</head>

<body>
    <nav>
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <input type="checkbox" id="check">
        <a class="a" href="principal.php"><img src="../img/logo.png" width="140" height="60" style="margin-left: 30px; margin-bottom: -20px;"></a>

        <ul>
            <li>
                <a class="a" href="incluir.php">
                    <t>Incluir</t>
                </a>
            </li>
  
            <li>
                <a class="a" href="logout.php">
                    <t>Sair</t>
                </a>
            </li>

            <li>
                <input type="search" id="pesquisar" class="pesquisar" autocomplete="off" placeholder="Processos, Clientes, Aluno">
            </li>
        </ul>

    </nav>

    <div class="nav-abas">
        <button class="tablinks" onclick="abrirAba(event, 'nav-cliente')">Cliente</button>
        <button class="tablinks" onclick="abrirAba(event, 'nav-contratario')">Contratário</button>
        <button class="tablinks" onclick="abrirAba(event, 'nav-processo')">Processo</button>
        <button class="tablinks" onclick="abrirAba(event, 'nav-assunto')">Assunto</button>
        <button class="tablinks" onclick="abrirAba(event, 'nav-relato')">Relato</button>
        <button class="tablinks" onclick="abrirAba(event, 'representante')">Representante</button>

    </div>



    <form id="formulario-cadastro" method="POST" action="processo.editar.php">

        <!----------------------------------------------CLIENTES----------------------------------------------------------------------------->
        <div class="campos" id="nav-cliente">

        <?php
           $stmt = $cbd->query("SELECT * FROM cliente WHERE id_cliente =".$dados['id_cliente']);
           $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

           $_SESSION['id_cliente'] = $cliente['id_cliente'];

          
        ?>
            
            <h3>Cliente</h3>
            
            <label for="inp-cliente-1" class="label-full">Nome:</label>
            <input type="text" class="full" id="inp-cliente-nome" name="cli-nome" autocomplete="off" required value="<?php echo $cliente['nome'] ?>" >

            <label for="inp-cliente-end" class="label-full">Endereço:</label>
            <input type="text" id="inp-cliente-end" class="full" name="cli-endereco" autocomplete="off" required value="<?php echo $cliente['endereco'] ?>">

            <fieldset class="fds">

                <label for="inp-cliente-cpf" class="label-half">CPF:</label>
                <input type="text" class="half" id="inp-clientes-cpf" name="cli-cpf" autocomplete="off" required value=" <?php echo $cliente['cpf'] ?>">

                <label for="inp-cliente-rg" class="label-half">RG:</label>
                <input type="text" class="half" id="inp-cliente-rg" name="cli-rg" autocomplete="off" required  value="<?php echo $cliente['rg'] ?>">

                <label for="inp-cliente-ssp" class="label-half">SSP/:</label>
                <input type="text" class="half" id="inp-cliente-ssp" name="cli-ssp" autocomplete="off" required  value="<?php echo $cliente['ssp'] ?>">

            </fieldset>

            <fieldset class="fds">

                <label for="inp-cliente-nasc" class="label-half">DT Nasc.:</label>
                <input type="date" class="half" id="inp-cliente-nasc" name="cli-nasc" autocomplete="off" required  <?php echo "value=". $cliente['dtnasc']?>>

                <label for="inp-cliente-tel" class="label-half">telefone:</label>
                <input type="tel" class="half" id="inp-cliente-tel" name="cli-tel" autocomplete="off" required  value="<?php echo $cliente['telefone'] ?>">
            </fieldset>



            <label for="inp-cliente-email" class="label-full">Email:</label>
            <input type="email" class="full" id="inp-cliente-email" name="cli-email" autocomplete="off" required value=" <?php echo $cliente['email'] ?>">

            <fieldset class="fds">


                <label for="inp-cliente-civil" class="label-half">Estado Civil:</label>
                <input type="text" class="half" id="inp-cliete-civil" name="cli-civil" autocomplete="off" required  value="<?php echo $cliente['estado_civil'] ?>">


                <label for="inp-cliente-prof" class="label-half">Profissão:</label>
                <input type="text" class="half" id="inp-cliente-prof" name="cli-prof" autocomplete="off" required  value="<?php echo $cliente['profissao'] ?>" >

            </fieldset>
            <button type="submit" class="salvar">Salvar</button>

        </div>


    </form>
    <!----------------------------------------------REPRESENTANTES----------------------------------------------------------------------------->


    <form method="POST" action="processo.editar.php">

         <?php
           $stmt = $cbd->query("SELECT * FROM representante WHERE id_representante =".$dados['id_representante']);
           $repre = $stmt->fetch(PDO::FETCH_ASSOC);

           $_SESSION['id_repre'] = $repre['id_representante'];

            
        ?>

        <div id="representante" class="campos">
            <h3>Representante legal </h3>

            <label for="inp-repre-1" class="label-full">Nome:</label>
            <input type="text" class="full" id="inp-repre-nome" name="rep-nome" autocomplete="off" required value="<?php echo $repre['nome'] ?>">

            <label for="inp-repre-end" class="label-full">Endereço:</label>
            <input type="text" id="inp-repre-end" class="full" name="rep-endereco" autocomplete="off" required value="<?php echo $repre['endereco'] ?>">

            <fieldset class="fds">

                <label for="inp-repre-cpf" class="label-half">CPF:</label>
                <input type="text" class="half" id="inp-repre-cpf" name="rep-cpf" autocomplete="off" required value="<?php echo $repre['cpf'] ?>">

                <label for="inp-repre-rg" class="label-half">RG:</label>
                <input type="text" class="half" id="inp-repre-rg" name="rep-rg" autocomplete="off" required value="<?php echo $repre['rg'] ?>">

                <label for="inp-repre-ssp" class="label-half">SSP/:</label>
                <input type="text" class="half" id="inp-repre-ssp" name="rep-ssp" autocomplete="off" required value="<?php echo $repre['ssp'] ?>">

            </fieldset>

            <fieldset class="fds">

                <label for="inp-repre-nasc" class="label-half">DT Nasc.:</label>
                <input type="date" class="half" id="inp-repre-nasc" name="rep-nasc" autocomplete="off" required value="<?php echo $repre['dtnasc'] ?>">

                <label for="inp-repre-tel" class="label-half">telefone:</label>
                <input type="tel" class="half" id="inp-repre-tel" name="rep-tel" autocomplete="off" required value="<?php echo $repre['telefone'] ?>">


            </fieldset>

            <label for="inp-repre-email" class="label-full">Email:</label>
            <input type="email" class="full" id="inp-repre-email" name="rep-email" autocomplete="off" required value="<?php echo $repre['email'] ?>">

            <fieldset class="fds">



                <label for="inp-repre-civil" class="label-half">Estado Civil:</label>
                <input type="text" class="half" id="inp-repre-civil" name="rep-civil" autocomplete="off" required value="<?php echo $repre['estado_civil'] ?>">


                <label for="inp-repre-prof" class="label-half">Profissão:</label>
                <input type="text" class="half" id="inp-repre-prof" name="rep-prof" autocomplete="off" required value="<?php echo $repre['profissao'] ?>">

            </fieldset>
            <button type="submit" class="salvar">Salvar</button>


        </div>
    </form>
    <!----------------------------------------------CONTRATÁRIO----------------------------------------------------------------------------->

    <form method="POST" action="processo.editar.php">

    <?php
           $stmt = $cbd->query("SELECT * FROM contratario WHERE id_contratario =".$dados['id_contratario']);
           $contra = $stmt->fetch(PDO::FETCH_ASSOC);

           $_SESSION['id_contratario'] = $contra['id_contratario'];

            
        ?>
        <div class="campos" id="nav-contratario">
            <h3>Parte Contratária</h3>


            <label for="inp-contra-social" class="label-half" >Razão Social/ Nome:</label>
            <input type="text" class="full" id="inp-contra-social" name="social" autocomplete="off" required value="<?php echo $contra['ra_social'] ?>">

            <label for="inp-contra-endereco" class="label-half">Endereço:</label>
            <input type="text" class="full" id="inp-contra-endereco" name="contraEndreco" autocomplete="off" required value="<?php echo $contra['endereco'] ?>">
            <script>
                    function sumir(id) {
                        document.getElementById(id).style.display = "none";

                    }

                    function aparecer(id) {
                        document.getElementById(id).style.display = "block";

                    }

                    function verificacao( id, id2 ){
                        if(!document.getElementById(id).value == ""){
                            aparecer("pessoa_fisica");
                        }else if(!document.getElementById(id2).value == ""){
                            aparecer("pessoa_fisica");
                        }

                    }

                    window.onload = verificacao("inp-contra-cpf",'inp-contra-cnpj' );




                    function juridica() {
                        sumir("pessoa_fisica");
                        aparecer("pessoa_juridica");
                        zerar('inp-contra-cpf');
                        
                    }

                    function fisica() {
                        sumir("pessoa_juridica");
                        aparecer("pessoa_fisica");
                        zerar('inp-contra-cnpj');
                       
                    }


                    function zerar(id) {
                        document.getElementById(id).value = "";
                    }
                </script>

            <FIeldset class="fds">
            <label for="pf" class="pessoa">PESSOA FISICA</label>
                <input type="button" id="pf" onclick="fisica()">

                <label for="pj" class="pessoa">PESSOA JURÍDICA</label>
                <input type="button" id="pj" onclick="juridica()">

            </FIeldset>

            <fieldset class="fds" id="pessoa_fisica">

                <label for="inp-contra-cpf">CPF:</label>
                <input type="text" class="half" id="inp-contra-cpf" name="contra-cpf" autocomplete="off" value="<?php echo $contra['cpf_cnpj'] ?>">

                <label for="inp-contra-rg">RG:</label>
                <input type="text" class="half" id="inp-contra-rg" name="contra-rg" autocomplete="off" value="<?php echo $contra['rg'] ?>">

                <label for="inp-contra-ssp">SSP/:</label>
                <input type="text" class="half" id="inp-contra-ssp" name="name-ssp" autocomplete="off" value="<?php echo $contra['ssp'] ?>">


            </fieldset>

            <fieldset class="fds" id="pessoa_juridica">

                <label for="inp-contra-cnpj">CNPJ:</label>
                <input type="text" class="half" id="inp-contra-cnpj" name="contra-cnpj" autocomplete="off" value="<?php echo $contra['cpf_cnpj'] ?>">

            </fieldset>

            <button type="submit" class="salvar">Salvar</button>

        </div>
    </form>

    
  

    <!----------------------------------------------PROCESSUAIS----------------------------------------------------------------------------->

<form method="POST" action="processo.editar.php">

<?php
           $stmt = $cbd->query("SELECT * FROM dprocessuais WHERE id_dprocessuais =".$dados['id_dprocessuais']);
           $processuais = $stmt->fetch(PDO::FETCH_ASSOC);

           $_SESSION['id_dprocessuais'] = $processuais['id_dprocessuais'];

            
        ?>


        <div class="campos" id="nav-processo">
            <h3>Dados Processuais</h3>
            <fieldset class="fds">

                <label for="valor-causa" class="label-half"> Valor da causa:  </label>
                <input type="number" class="half" id="valor-causa" name="valor" placeholder="R$: " <?php echo "value=". $processuais['v_causa']?>>

                <label for="entrada" class="label-half">Data da entrada:</label >
                <input type="date" class="half" id="entrada" name="entrada"  <?php echo "value=". $processuais['dt_entrada']?> >
            </fieldset>

            <label for="inp-link" class="label-full">Link de armazenamento em núvem:</label>
            <input type="text" name="link" id="inp-link" class="full" autocomplete="off" value="<?php echo $processuais['link'] ?>">

            <br><br>

            <label for="inp-processuais-1">Informar possibilidade de conciliação, caso em que deverá agendar audiencia, emitindo carta convite:</label>
            <input type="text" class="full" name="concilia" id="inp-processuais-1" value=" <?php echo $processuais['obs'] ?>">


            <button type="submit" class="salvar">Salvar</button>

        </div>
</form>    

    <!----------------------------------------------ASSUNTO----------------------------------------------------------------------------->
    <form action="processo.editar.php" method="POST">

        <div class="campos" id="nav-assunto">
            <h3>Assuntos</h3>
            <label for="inp-assunto-1">Assunto primário:</label>
            <input type="text" id="inp-assunto-1" name="assunto1" class="full" required autocomplete="off" value="<?php echo $processuais['ass_primario'] ?>">

            <label for="inp-assunto-2" id="assunto-secundario">Assunto Secundário:</label>
            <textarea id="inp-assunto-2" class="txtarea" name="assunto2" required autocomplete="off"><?php echo $processuais['ass_secundario'] ?></textarea >
            <button type="submit" class="salvar">Salvar</button>
        </div>
        </form>
    <form action="processo.editar.php" method="POST">
        <div class="campos" id="nav-relato">
            <h3>Relato dos fatos:</h3>

            <textarea id="Relato" name="relato" class="txtarea" required autocomplete="off"><?php echo $processuais['relato'] ?></textarea>

            <button type="submit" class="salvar">Salvar</button>
        </div>

    </form>

<?php
} else 
?>


</body>

</html>
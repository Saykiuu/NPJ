<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir!</title>
    <link rel="shortcut icon" href="../img/fied.png">
    <link rel="stylesheet" href="../css/abrir.css">
    <link rel="stylesheet" href="../css/barra.css">
    <link rel="stylesheet" href="../css/teste.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/navAbas.js"></script>
    <link rel="stylesheet" href="../css/pessoa.css">
    <link rel="stylesheet" href="../css/navabas.css">

    <script>
        function escolher() {
            alert("escolha um dado!")
        }
    </script>
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
                <a class="a" id="ad" href="incluir.php">
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
        <button class="tablinks" onclick="abrirAba(event, 'representante')">representante</button>


    </div>



    <form id="formulario-cadastro" method="post" action="processo.cadastro.php">

        <!----------------------------------------------CLIENTES----------------------------------------------------------------------------->
        <div class="campos" id="nav-cliente">
            <h3>Cliente</h3>
            <div class="row">
                <div class="col-sm-12">
                    <label for="inp-cliente-1" class="label-full">Nome:</label>
                    <input type="text" class="form-control" id="inp-cliente-nome" name="cli-nome" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label for="inp-cliente-end" class="label-full">Endereço:</label>
                    <input type="text" id="inp-cliente-end" class="form-control" name="cli-endereco" autocomplete="off" required>
                </div>
            </div>





            <fieldset class="fds">
                <div class="row">
                    <div class="col-md-4">
                        <label for="inp-cliente-cpf" class="label-half">CPF:</label>
                        <input type="text" class="form-control" id="inp-clientes-cpf" name="cli-cpf" autocomplete="off" required>
                    </div>

                    <div class="col-md-4">
                        <label for="inp-cliente-rg" class="label-half">RG:</label>
                        <input type="text" class="form-control" id="inp-cliente-rg" name="cli-rg" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inp-cliente-ssp" class="label-half">SSP/:</label>
                        <input type="text" class="form-control" id="inp-cliente-ssp" name="cli-ssp" autocomplete="off" required>
                    </div>

                </div>
            </fieldset>

            <fieldset class="fds">
                <div class="row">
                    <div class="col-md-4">
                        <label for="inp-cliente-nasc" class="label-half">DT Nasc.:</label>
                        <input type="date" class="form-control" id="inp-cliente-nasc" name="cli-nasc" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inp-cliente-tel" class="label-half">telefone:</label>
                        <input type="tel" class="form-control" id="inp-cliente-tel" name="cli-tel" autocomplete="off" required>
                    </div>

                </div>
            </fieldset>


            <div class="row">
                <div class="col-md-10">
                    <label for="inp-cliente-email" class="label-full">Email:</label>
                    <input type="email" class="form-control" id="inp-cliente-email" name="cli-email" autocomplete="off" required>

                </div>
            </div>


            <fieldset class="fds">
                <div class="row">
                    <div class="col-md-4">
                        <label for="inp-cliente-civil" class="label-half">Estado Civil:</label>
                        <input type="text" class="form-control" id="inp-cliete-civil" name="cli-civil" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inp-cliente-prof" class="label-half">Profissão:</label>
                        <input type="text" class="form-control" id="inp-cliente-prof" name="cli-prof" autocomplete="off" required>
                    </div>
                </div>
            </fieldset>



        </div>





        <!----------------------------------------------REPRESENTANTES----------------------------------------------------------------------------->




        <div id="representante" class="campos">
            <h3>Representante legal </h3>

            <label for="inp-repre-1" class="label-full">Nome:</label>
            <input type="text" class="full" id="inp-repre-nome" name="rep-nome" autocomplete="off">

            <label for="inp-repre-end" class="label-full">Endereço:</label>
            <input type="text" id="inp-repre-end" class="full" name="rep-endereco" autocomplete="off">

            <fieldset class="fds">

                <label for="inp-repre-cpf" class="label-half">CPF:</label>
                <input type="text" class="half" id="inp-repre-cpf" name="rep-cpf" autocomplete="off">

                <label for="inp-repre-rg" class="label-half">RG:</label>
                <input type="text" class="half" id="inp-repre-rg" name="rep-rg" autocomplete="off">

                <label for="inp-repre-ssp" class="label-half">SSP/:</label>
                <input type="text" class="half" id="inp-repre-ssp" name="rep-ssp" autocomplete="off">

            </fieldset>

            <fieldset class="fds">

                <label for="inp-repre-nasc" class="label-half">DT Nasc.:</label>
                <input type="date" class="half" id="inp-repre-nasc" name="rep-nasc" autocomplete="off">

                <label for="inp-repre-tel" class="label-half">telefone:</label>
                <input type="tel" class="half" id="inp-repre-tel" name="rep-tel" autocomplete="off">


            </fieldset>

            <label for="inp-repre-email" class="label-full">Email:</label>
            <input type="email" class="full" id="inp-repre-email" name="rep-email" autocomplete="off">

            <fieldset class="fds">



                <label for="inp-repre-civil" class="label-half">Estado Civil:</label>
                <input type="text" class="half" id="inp-repre-civil" name="rep-civil" autocomplete="off">

                <label for="inp-repre-prof" class="label-half">Profissão:</label>
                <input type="text" class="half" id="inp-repre-prof" name="rep-prof" autocomplete="off">

            </fieldset>


        </div>





        <!----------------------------------------------CONTRATÁRIO----------------------------------------------------------------------------->


        <div class="campos" id="nav-contratario">
            <h3>Parte Contratária</h3>


            <label for="inp-contra-social" class="label-half">Razão Social/ Nome:</label>
            <input type="text" class="full" id="inp-contra-social" name="social" autocomplete="off" required>

            <label for="inp-contra-endereco" class="label-half">Endereço:</label>
            <input type="text" class="full" id="inp-contra-endereco" name="contra-endereco" autocomplete="off" required>

            <FIeldset class="fds">

                <label for="pf" class="pessoa">PESSOA FISICA</label>
                <input type="button" id="pf" onclick="fisica()">

                <label for="pj" class="pessoa">PESSOA JURÍDICA</label>
                <input type="button" id="pj" onclick="juridica()">

                <script>
                    function sumir(id) {
                        document.getElementById(id).style.display = "none";

                    }

                    function aparecer(id) {
                        document.getElementById(id).style.display = "block";

                    }





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

            </FIeldset>

            <fieldset class="fds" id="pessoa_fisica">

                <label for="inp-contra-cpf">CPF:</label>
                <input type="text" class="half" id="inp-contra-cpf" name="contra-cpf" autocomplete="off">

                <label for="inp-contra-rg">RG:</label>
                <input type="text" class="half" id="inp-contra-rg" name="contra-rg" autocomplete="off">

                <label for="inp-contra-ssp">SSP/:</label>
                <input type="text" class="half" id="inp-contra-ssp" name="contra-ssp" autocomplete="off">


            </fieldset>

            <fieldset class="fds" id="pessoa_juridica">

                <label for="inp-contra-cnpj">CNPJ:</label>
                <input type="text" class="half" id="inp-contra-cnpj" name="contra-cnpj" autocomplete="off">

            </fieldset>




        </div>
        <!----------------------------------------------PROCESSUAIS----------------------------------------------------------------------------->
        <div class="campos" id="nav-processo">
            <h3>Dados Processuais</h3>
            <fieldset class="fds">

                <label for="valor-causa" class="label-half"> Valor da causa: </label>
                <input type="number" class="half" id="valor-causa" name="valor" placeholder="R$ ">

                <label for="entrada" class="label-half">Data da entrada:</label>
                <input type="date" class="half" id="entrada" name="entrada">
            </fieldset>

            <label for="inp-link" class="label-full">Link de armazenamento em núvem:</label>
            <input type="text" name="link" id="inp-link" class="full" autocomplete="off">

            <br><br>

            <label for="inp-processuais-1">Informar possibilidade de conciliação, caso em que deverá agendar audiencia, emitindo carta convite:</label>
            <input type="text" class="full" name="concilia" id="inp-processuais-1">




        </div>
        <!----------------------------------------------ASSUNTO----------------------------------------------------------------------------->

        <div class="campos" id="nav-assunto">
            <h3>Assuntos</h3>
            <label for="inp-assunto-1">Assunto primário:</label>
            <input type="text" id="inp-assunto-1" class="full" name="assunto1" required autocomplete="off">
            <label for="inp-assunto-2" id="assunto-secundario">Assunto Secundário:</label>
            <textarea id="inp-assunto-2" class="txtarea" name="assunto2" required autocomplete="off"></textarea>
        </div>

        <div class="campos" id="nav-relato">
            <h3>Relato dos fatos:</h3>

            <textarea id="Relato" name="relato" class="txtarea" required autocomplete="off"></textarea>

            <button type="submit" class="salvar">Salvar</button>
        </div>


    </form>







</body>

</html>
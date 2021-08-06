

       <?php

        session_start();

        echo "deixa eu tentar fdp";
        require_once('pdo.php');
        if (
            isset($_POST['cli-nome']) && isset($_POST['cli-endereco']) && isset($_POST['cli-cpf']) && isset($_POST['cli-rg']) && isset($_POST['cli-ssp']) &&
            isset($_POST['cli-nasc']) && isset($_POST['cli-tel']) && isset($_POST['cli-email']) && isset($_POST['cli-civil']) && isset($_POST['cli-prof'])
        ) {
            echo
            $sql = "INSERT INTO cliente(nome, endereco, cpf, rg, ssp, dtnasc, telefone, email, estado_civil, profissao) VALUE(:nome,:endereco,:cpf,:rg,:ssp,:nasc,:tel,:email,:civil,:prof) ";
            $stmt = $cbd->prepare($sql);
            $stmt->execute(array(
                ':nome' => $_POST['cli-nome'],
                ':endereco' => $_POST['cli-endereco'],
                ':cpf' => $_POST['cli-cpf'],
                ':rg' => $_POST['cli-rg'],
                ':ssp' => $_POST['cli-ssp'],
                ':nasc' => $_POST['cli-nasc'],
                ':tel' => $_POST['cli-tel'],
                ':email' => $_POST['cli-email'],
                ':civil' => $_POST['cli-civil'],
                ':prof' => $_POST['cli-prof']
            ));
            $_SESSION['id_cliente'] = $cbd->lastInsertId();
            //--------------------------------------------------------------------------representante-----------------------------------
            if (
                isset($_POST['rep-nome']) && isset($_POST['rep-endereco']) && isset($_POST['rep-cpf']) && isset($_POST['rep-rg']) && isset($_POST['rep-ssp']) &&
                isset($_POST['rep-nasc']) && isset($_POST['rep-tel']) && isset($_POST['rep-email']) && isset($_POST['rep-civil']) && isset($_POST['rep-prof'])
            ) {

                $sql = "INSERT INTO representante(nome, endereco, cpf, rg, ssp, dtnasc, telefone, email, estado_civil, profissao) VALUE(:nome,:endereco,:cpf,:rg,:ssp,:nasc,:tel,:email,:civil,:prof) ";
                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':nome' => $_POST['rep-nome'],
                    ':endereco' => $_POST['rep-endereco'],
                    ':cpf' => $_POST['rep-cpf'],
                    ':rg' => $_POST['rep-rg'],
                    ':ssp' => $_POST['rep-ssp'],
                    ':nasc' => $_POST['rep-nasc'],
                    ':tel' => $_POST['rep-tel'],
                    ':email' => $_POST['rep-email'],
                    ':civil' => $_POST['rep-civil'],
                    ':prof' => $_POST['rep-prof']
                ));
                $_SESSION['id_repre'] = $cbd->lastInsertId();
           
                if (isset($_POST['social']) && isset($_POST['contra-endereco'])) {


                    if (isset($_POST['contra-cpf']) && !empty($_POST['contra-cpf'])) {
    
                        $sql = "INSERT INTO contratario(ra_social, endereco, cpf_cnpj, rg, ssp)VALUE(:social, :endereco, :cpf, :rg, :ssp)";
                        $stmt = $cbd->prepare($sql);
                        $stmt->execute(array(
                            ':social' => $_POST['social'],
                            ':endereco' => $_POST['contra-endereco'],
                            ':cpf' => $_POST['contra-cpf'],
                            ':rg' => $_POST['contra-rg'],
                            ':ssp' => $_POST['contra-ssp']
                        ));
                        $_SESSION['id_contra'] = $cbd->lastInsertId();
                    } else if (isset($_POST['contra-cnpj']) && !empty($_POST['contra-cnpj'])) {
                        $sql = "INSERT INTO contratario(ra_social, endereco, cpf_cnpj, rg, ssp)VALUE(:social, :endereco, :cnpj, :nulo, :nulossp)";
                        $stmt = $cbd->prepare($sql);
                        $stmt->execute(array(
                            ':social' => $_POST['social'],
                            ':endereco' => $_POST['contra-endereco'],
                            ':cnpj' => $_POST['contra-cnpj'],
                            ':nulo' => 'nulo',
                            ':nulossp' => 'nulo'
    
                        ));
                        $_SESSION['id_contra'] = $cbd->lastInsertId();
                    } 

                    if (isset($_POST['valor']) && isset($_POST['entrada']) && isset($_POST['link']) && isset($_POST['concilia'])  && isset($_POST['assunto1'])  && isset($_POST['assunto2']) && isset($_POST['relato'])) {
                        $sql = "INSERT INTO dprocessuais(v_causa, dt_entrada, link, obs, ass_primario, ass_secundario, relato) VALUE(:valor, :entrada,:link,:obs,:assunto1,:assunto2,:relato)";
                        $stmt = $cbd->prepare($sql);
                        $stmt->execute(array(
                            ':valor' => $_POST['valor'],
                            ':entrada' => $_POST['entrada'],
                            ':link' => $_POST['link'],
                            ':obs' => $_POST['concilia'],
                            ':assunto1' => $_POST['assunto1'],
                            ':assunto2' => $_POST['assunto2'],
                            ':relato' => $_POST['relato']
                        ));
                        $_SESSION['id_processuais'] = $cbd->lastInsertId();

                        if(isset($_SESSION['id_cliente']) && isset($_SESSION['id_repre']) && isset($_SESSION['id_contra']) && isset($_SESSION['id_processuais'])){
                            $sql = "INSERT INTO processo (id_cliente, id_dprocessuais, id_contratario, cor, id_representante,id_usuario)VALUE(:cliente,:processos,:contratario,:cor,:representante,:user)";
                            $stmt = $cbd->prepare($sql); 
                            $stmt ->execute(array(
                                ':cliente'=>$_SESSION['id_cliente'],
                                ':processos'=>$_SESSION['id_processuais'],
                                ':contratario' =>$_SESSION['id_contra'],
                                ':cor'=> '#6495ed',
                                ':representante' =>$_SESSION['id_repre'],
                                ':user' =>$_SESSION['id']

                            ));
                        }
                        header("Location: principal.php");
                        return;


                    }//quarto if
           
                }//terceiro if
                
           
            } //segundo if
                  
          
        } //primeiro if



     
        ?>









 
       

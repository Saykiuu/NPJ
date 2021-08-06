
<?php

require_once('pdo.php');
session_start();
if (
            isset($_POST['cli-nome']) && !empty($_POST['cli-nome']) && isset($_POST['cli-endereco']) && !empty($_POST['cli-endereco']) && isset($_POST['cli-cpf']) && !empty($_POST['cli-cpf']) && isset($_POST['cli-rg']) && !empty($_POST['cli-rg']) && isset($_POST['cli-ssp']) && !empty($_POST['cli-ssp']) &&
            isset($_POST['cli-nasc']) && !empty($_POST['cli-nasc']) && isset($_POST['cli-tel']) && !empty($_POST['cli-tel']) && isset($_POST['cli-email']) && !empty($_POST['cli-email']) && isset($_POST['cli-civil']) && !empty($_POST['cli-civil']) && isset($_POST['cli-prof']) && !empty($_POST['cli-prof'])
        ){
            
            $sql = "UPDATE cliente SET nome = :nome, endereco = :endereco, cpf = :cpf, rg =:rg, ssp=:ssp, dtnasc = :nasc, telefone = :tel, email = :email, estado_civil = :civil, profissao = :prof WHERE id_cliente = ".$_SESSION['id_cliente'];
            $stmt = $cbd->prepare($sql);
            $stmt->execute(array(
                ':nome'=>$_POST['cli-nome'],
                ':endereco'=>$_POST['cli-endereco'],
                ':cpf'=>$_POST['cli-cpf'],
                ':rg'=>$_POST['cli-rg'],
                ':ssp'=>$_POST['cli-ssp'],
                ':nasc'=>$_POST['cli-nasc'],
                ':tel'=>$_POST['cli-tel'],
                ':email'=>$_POST['cli-email'],
                ':civil'=>$_POST['cli-civil'],
                ':prof'=>$_POST['cli-prof'] ));
                
                header('Location: principal.php');
                return;
        }




if (
            isset($_POST['rep-nome']) && !empty($_POST['rep-nome']) && isset($_POST['rep-endereco']) && !empty($_POST['rep-endereco']) && isset($_POST['rep-cpf']) && !empty($_POST['rep-cpf']) && isset($_POST['rep-rg']) && !empty($_POST['rep-rg']) && isset($_POST['rep-ssp']) && !empty($_POST['rep-ssp']) &&
            isset($_POST['rep-nasc']) && !empty($_POST['rep-nasc']) && isset($_POST['rep-tel']) && !empty($_POST['rep-tel']) && isset($_POST['rep-email']) && !empty($_POST['rep-email']) && isset($_POST['rep-civil']) && !empty($_POST['rep-civil']) && isset($_POST['rep-prof']) && !empty($_POST['rep-prof'])
        ){
            
            $sql = "UPDATE representante SET nome = :nome, endereco = :endereco, cpf = :cpf, rg =:rg, ssp=:ssp, dtnasc = :nasc, telefone = :tel, email = :email, estado_civil = :civil, profissao = :prof WHERE id_representante = ".$_SESSION['id_representante'];
            $stmt = $cbd->prepare($sql);
            $stmt->execute(array(
                ':nome'=>$_POST['rep-nome'],
                ':endereco'=>$_POST['rep-endereco'],
                ':cpf'=>$_POST['rep-cpf'],
                ':rg'=>$_POST['rep-rg'],
                ':ssp'=>$_POST['rep-ssp'],
                ':nasc'=>$_POST['rep-nasc'],
                ':tel'=>$_POST['rep-tel'],
                ':email'=>$_POST['rep-email'],
                ':civil'=>$_POST['rep-civil'],
                ':prof'=>$_POST['rep-prof'] ));
                
                header('Location: principal.php');
                return;
        }

        if (isset($_POST['social']) && !empty($_POST['social']) && isset($_POST['contraEndreco'])  && !empty($_POST['contraEndreco'])) {


            if (isset($_POST['contra-cpf']) && !empty($_POST['contra-cpf'])) {

                $sql = "UPDATE contratario SET ra_social = :social, endereco = :endereco, cpf_cnpj = :cpf, rg = :rg, ssp =:ssp WHERE id_contratario = ".$_SESSION['id_contratario'];
                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':social' => $_POST['social'],
                    ':endereco' => $_POST['contraEndreco'],
                    ':cpf' => $_POST['contra-cpf'],
                    ':rg' => $_POST['contra-rg'],
                    ':ssp' => $_POST['contra-ssp']
                ));
                
                    header("Location: principal.php");
                    return;
                
            } else if (isset($_POST['contra-cnpj']) && !empty($_POST['contra-cnpj'])) {
                $sql = "UPDATE contratario SET ra_social = :social, endereco = :endereco, cpf_cnpj = :cnpj, rg = :nulo, ssp =:nulo WHERE id_contratario = ".$_SESSION['id_contratario'];
                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':social' => $_POST['social'],
                    ':endereco' => $_POST['contraEndreco'],
                    ':cnpj' => $_POST['contra-cnpj'],
                    ':nulo' => 'nulo',
                    ':nulossp' => 'nulo'  ));

                
                header("Location: principal.php");
                return;
            } else{
                echo"erro, esqueceu de colocar o cpf ou cnpj";
            }
        }


        if(isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['entrada']) && !empty($_POST['entrada']) && isset($_POST['link']) && isset($_POST['concilia']) && !empty($_POST['concilia'])){


            $sql = "UPDATE dprocessuais SET v_causa = :valor, dt_entrada = :dtentrada, link = :lin, obs = :concilia WHERE id_dprocessuais =". $_SESSION['id_dprocessuais'];
                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':valor' => $_POST['valor'],
                    ':dtentrada' => $_POST['entrada'],
                    ':lin' => $_POST['link'],
                    ':concilia' => $_POST['concilia']
                ));
                 header("Location: principal.php");
                return;
        }


        
        if(isset($_POST['assunto1']) && !empty($_POST['assunto1']) && isset($_POST['assunto2']) && !empty($_POST['assunto2'])){


            $sql = "UPDATE dprocessuais SET ass_primario = :assunto1, ass_secundario = :assunto2 WHERE id_dprocessuais =". $_SESSION['id_dprocessuais'];
                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':assunto1' => $_POST['assunto1'],
                    ':assunto2' => $_POST['assunto2']
                ));
                 header("Location: principal.php");
                return;
        }

         
        if(isset($_POST['relato']) && !empty($_POST['relato'])){


            $sql = "UPDATE dprocessuais SET relato = :relat WHERE id_dprocessuais =". $_SESSION['id_dprocessuais'];
                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':relat' => $_POST['relato']
                ));
                 header("Location: principal.php");
                return;
        }




?>

<?php
            require_once "pdo.php ";
            session_start();

            if( isset($_POST['user']) && isset($_POST['senha'])){
                   
             
       
                $stmt = $cbd->prepare("SELECT * FROM usuario WHERE login = :user AND senha = :pass");
                $stmt->execute(array(":user" => $_POST['user'], ":pass" =>$_POST['senha']));
                $dados = $stmt -> fetch(PDO::FETCH_ASSOC);

                    if($dados['login'] == $_POST['user'] && $dados['senha'] == $_POST['senha']){
                        if($dados['master'] == "0"){
                            $_SESSION['id'] = '1';
                            $_SESSION['usuario'] = $dados['login'];
                            header('Location: principal.php'); 
                            return;
                        }else{
                            $_SESSION['id'] =  $dados['id_usuario'];
                            $_SESSION['usuario'] = $dados['login'];
                            header('Location: principal.php'); 
                            return;
                        }
                      
                    }
                    else{
                        
                        header('Location: index.php'); 
                    }

                
                }
            
            

?>
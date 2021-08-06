<?php
require_once "pdo.php ";
session_start();

if( isset($_POST['nome']) && isset($_POST['gra']) && isset($_POST['email']) &&  isset($_POST['login']) &&  isset($_POST['senha']))
    {

        $sql ="SELECT * FROM usuario";
        $stmt = $cbd ->prepare($sql);
        $stmt ->execute();

        while($dados=$stmt->fetch(PDO::FETCH_ASSOC)){
            if($dados['gra'] != $_POST['gra'] || $dados['email'] != $_POST['email'] || $dados['login'] != $_POST['login']){

                $sql = "INSERT INTO usuario(nome, gra, email, login, senha) VALUE(:nome, :gra, :email, :ulogin, :senha) ";


                $stmt = $cbd->prepare($sql);
                $stmt->execute(array(
                    ':nome' => $_POST['nome'],
                    ':gra' => $_POST['gra'],
                    ':email' => $_POST['email'],
                    ':ulogin' => $_POST['login'],
                    ':senha' => $_POST['senha']));
        
                    
        
                   
                    header('Location: index.php');
                    
                    return;
                    
            }   
        }
    }

       
  
    

?>

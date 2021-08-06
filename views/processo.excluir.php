<?php

    require_once('pdo.php');
    session_start();

    
    if(isset($_GET['id']) && !empty($_GET['id'])){

        $stmt= $cbd->query("SELECT * FROM processo WHERE id_processo =".$_GET['id']);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $sql = "DELETE FROM cliente WHERE id_cliente = ".$dados['id_cliente'];
        $stmt = $cbd->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM representante WHERE id_representante = ".$dados['id_representante'];
        $stmt = $cbd->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM contratario WHERE id_contratario = ".$dados['id_contratario'];
        $stmt = $cbd->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM dprocessuais WHERE id_dprocessuais = ".$dados['id_dprocessuais'];
        $stmt = $cbd->prepare($sql);
        $stmt->execute();

        $sql = "DELETE FROM processo WHERE id_processo = ".$dados['id_processo'];
        $stmt = $cbd->prepare($sql);
        $stmt->execute();
        
        header("Location:principal.php");
    } 

?>
<?php

global $cbd;
try 
{
    $cbd = new PDO("mysql:host=localhost; dbname=banco", "root","");

    $cbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        
} catch (PDOException $e) 
    {
        echo "Erro: " . $e->getMessage() . " <br>";
        die();
    }?> 
<?php

    session_start();

    try{
        $dsn = "mysql:dbname=curso_sql1;host=localhost";
        $dbuser = "root";
        $dbpass = "";

        $pdo = new PDO($dsn,$dbuser,$dbpass);
    }catch(PDOException $e){
        echo 'Erro: '.$e->getMessage();
    }


?>
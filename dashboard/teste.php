<?php

    try{
        $dsn = "mysql:dbname=projeto_loja_online;host=localhost";
        $dbuser = "root";
        $dbpass = "";
        $pdo = new PDO($dsn,$dbuser,$dbpass);

    }catch(PDOException $e){
        echo 'Erro: '.$e->getMessage();
    }

    $sql = "select * from cargo_funcionarios where id='3'";
    $sql = $pdo->query($sql);
    $sql = $sql->fetch();

    $permissoes = $sql['permissoes'];
    echo $permissoes;

    echo '<br/>';

    $lista_permissoes = explode(",",$permissoes);

    foreach($lista_permissoes as $lista1){
        echo $lista1.'<br/>';
    }

    echo '<br/>';

    if(in_array("ADD",$lista_permissoes)){
        echo 'almaskelfa';
    }

    echo '<br/>';

    //$stringPermissoes = implode("-",$lista_permissoes);
    //echo $stringPermissoes;

    
   

?>
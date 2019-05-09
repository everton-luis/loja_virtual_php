<?php 

    require('pages/header_dashboard.php'); 
    
    if(isset($_GET['id'])){
        $id_funcionario = $_GET['id'];

        $funcionarios->deletarFuncionarios($id_funcionario);

        header("Location: funcionarios_dashboard.php");

    }
    
    

?>


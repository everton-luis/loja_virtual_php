<?php 

    require('pages/header_dashboard.php');
    require('/../classes/produtos.class.php'); 
    

    if(isset($_GET['id'])){
        
        $id_produto = $_GET['id'];

        $produtos = new Produtos();
        $produtos->deletarProduto($id_produto);

        header("Location: dashboard.php");

        
    }
    
    

?>

            
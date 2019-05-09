<?php
    require('pages/header.php');
    require('classes/vendas.class.php');
    require('classes/itensvenda.class.php');

    if(!isset($_SESSION['logado'])){
        header("Location: index.php");
        exit;
    }

    //echo $id_usuarios;

    $vendas = new Vendas();
    $itensvenda = new ItensVenda();

    $lista_vendas_usuarios = $vendas->getIdVendas($id_usuarios);
    

?>

<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Area do usuario</h2>
                </div>

                <div class="col-12">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dados_usuarios.php">Meus Dados</a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="historico_compras.php">Historico de compras</a>
                        </li>
                        
                    </ul>

                </div>

                <div class="col-12">
                    <h3>Historico de compras</h3>
                    <?php
                        foreach($lista_vendas_usuarios as $lista1){
                            $id_vendas = $lista1['id'];
                            
                            echo 'Pedido: '.$id_vendas.'<br/>';

                            $lista_produtos_vendas = $itensvenda->getItensVendaIdVendas($id_vendas);
                            foreach($lista_produtos_vendas as $lista2){
                                    
                                echo 'Nome produto: '.$lista2['nome_produtos'].'<br/>';
                                echo 'Preco: R$ '.$lista2['preco'].'<br/>';
                                echo 'Quantidade:'.$lista2['quantidade'].'<br/>';
                                echo 'Data compra:'.$lista2['data_compra'].'<br/>';
                                echo '<hr/>';


                            }
                            echo '<br/>';

                        }
                        
                        
                        

                    ?>


                </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
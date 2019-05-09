<?php
    require('pages/header.php');
    require('classes/produtos.class.php');


    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    if(isset($_GET['acao'])){
        
        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id_produtos']);
            if(!isset($_SESSION['carrinho'][$id])){
                $_SESSION['carrinho'][$id] = 1;
            }else{
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
                unset($_SESSION['carrinho'][$id]);
            }
        }

        if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
                foreach($_POST['prod'] as $id => $qtd){
                    $id = intval($id);
                    $qtd = intval($qtd);
                    if(!empty($qtd) || $qtd != 0){
                        $_SESSION['carrinho'][$id] = $qtd;
                    }else{
                        unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }


    }

    print_r($_SESSION['carrinho']);

    $produtos = new Produtos();

    $total = 0;
    global $pdo;

    if(isset($_POST['enviar'])){
        $total1 = $_POST['total']; 

        if(!isset($_SESSION['logado'])){
            echo 'necessario estar logado para finalizar o pedido';
        }else{
            $sql_insert_venda = "insert into vendas set valor_vendas='$total1', id_usuarios='$id_usuarios'";
            $sql_insert_venda = $pdo->query($sql_insert_venda);
            $id_vendas = $pdo->lastInsertId();

            foreach($_SESSION['carrinho'] as $id => $qtd){
                $sql_insert_itensvenda = "insert into itensvenda (id_vendas,id_produto,quantidade,data_compra,id_usuarios) VALUES ('$id_vendas','$id','$qtd',NOW(),'$id_usuarios')";
                $sql_insert_itensvenda = $pdo->query($sql_insert_itensvenda);
            }

            header("Location: finalizar_pedido.php");

            unset($_SESSION['carrinho']);

        }
    }
    


?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Carrinho de compras</h1>
                
                    <br/><br/>

                    
                    <table border="1">
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preco</th>
                            <th>SubTotal</th>
                            <th>Remover</th>
                        </tr>

                        <form action="carrinho_compras.php?acao=up" method="POST">

                        <?php

                            if(count($_SESSION['carrinho']) == 0){
                                echo '<tr>';
                                    echo '<td colspan="5">Nao ha produtos no carrinho</td>';

                                echo '</tr>';
                            }else{
                                foreach($_SESSION['carrinho'] as $id => $qtd){
                                    $dados_produtos = $produtos->getIdProdutos($id);
                                    $nome = $dados_produtos['nome_produtos'];
                                    $preco = $dados_produtos['preco'];
                                    $sub = $dados_produtos['preco'] * $qtd;
                                    $total += $sub;
                                    
                                    echo '<tr>';
                                        echo '<td>'.$nome.'</td>';
                                        echo '<td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>';
                                        echo '<td>'.$preco.'</td>';
                                        echo '<td>'.$sub.'</td>';
                                        echo '<td><a href="carrinho_compras.php?acao=del&id='.$id.'">Remover</a></td>';

                                    echo '</tr>';
                                    
                                }
                            }

                        ?>

                        <tr>
                            <td colspan="5"><input type="submit" value="Atualizar" /></td>
                        </tr>


                        <tr>
                            <td colspan="5">Total: <?php echo $total; ?></td>
                        </tr>

                        </form>

                        <tr>
                            <td colspan="5"><a href="index.php">Continuar comprando</a></td>
                        </tr>

                    </table>
                    
                    <?php

                        

                    ?>

                    <br/><br/>

                    <form method="POST" action="carrinho_compras.php" >
                        
                        <input type="hidden" name="total" value="<?php echo $total; ?>" />
                        
                        <input type="submit" name="enviar" value="Finalizar pedido" />

                    </form>
                </div>

            </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
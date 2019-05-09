<?php
    require('pages/header.php');
    require('classes/produtos.class.php');

    $nome_pesquisa = '';
    if(isset($_GET['nome_pesquisa'])){
        $nome_pesquisa = $_GET['nome_pesquisa'];
    }

    

    $produtos = new Produtos();
    $lista_produtos = $produtos->pesquisarProdutos($nome_pesquisa);

    //print_r($lista_produtos);

?>

        <div class="container-fluid" style="height: 400px;">
            <div class="row">
                <div class="col-12">
                    <h1>Pesquisa de produtos</h1>

                    <br/>

                    <table border="1">

                        <tr>
                            <th>Nome</th>
                            <th>Preco</th>
                        </tr>

                    <?php

                        foreach($lista_produtos as $lista_produtos1){
                            echo '<tr>';
                                echo '<td><a href="detalhes_produtos.php?id='.$lista_produtos1['id'].'">'.$lista_produtos1['nome_produtos'].'</td>';
                                echo '<td>'.$lista_produtos1['preco'].'</td>';

                            echo '</tr>';
                        }

                    ?>

                    </table>

                </div>
            </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
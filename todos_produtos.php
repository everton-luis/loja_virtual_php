<?php
    require('pages/header.php');
    require('classes/produtos.class.php');

    $produtos = new Produtos();

    $lista_todos_produtos = $produtos->getTodosProdutos();




?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Todos os produtos</h1>
                </div>

                <div class="col-12">

                    <table border="1">

                        <th>Nome</th>
                        <th>Preco</th>

                        <?php
                            foreach($lista_todos_produtos as $lista1){
                                echo '<tr>';
                                    echo '<td>'.$lista1['nome_produtos'].'</td>';
                                    echo '<td>'.$lista1['preco'].'</td>';
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
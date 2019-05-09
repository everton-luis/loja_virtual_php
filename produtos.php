<?php
    require('pages/header.php');
    require('classes/produtos.class.php');

    $categorias = new Categorias();
    $produtos = new Produtos();

    $id_categoria = '';
    if(isset($_GET['id_categorias'])){
        $id_categoria = $_GET['id_categorias'];
    }

    $dados_categorias = $categorias->getIdCategorias($id_categoria);
    $nome_categoria = $dados_categorias['nome_categorias'];

    $lista_produtos_categorias = $produtos->getIdCategoria($id_categoria);

?>
    <div class="container-fluid" style="height: 400px;">
            <div class="row">
                <div class="col-12">
                    <h1>Produtos <?php echo $nome_categoria; ?></h1>
                </div>

                <br/><br/><br/>

                <div class="col-12">
                    <table border="1">
                        <tr>
                            <th>Nome</th>
                            <th>Preco</th>
                        </tr>

                        <?php
                            foreach($lista_produtos_categorias as $lista1){
                                echo '<tr>';
                                    echo '<td><a href="detalhes_produtos.php?id='.$lista1['id'].'">'.$lista1['nome_produtos'].'</td>';
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
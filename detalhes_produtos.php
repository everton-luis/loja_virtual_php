<?php
    require('pages/header.php');
    require('classes/produtos.class.php');

    $produtos = new Produtos();

    $id_produtos = 0;
    if(isset($_GET['id'])){
        $id_produtos = $_GET['id'];
    }

    $dados_produtos = $produtos->getIdProdutos($id_produtos);
    $nome_produto = $dados_produtos['nome_produtos'];
    $preco_produto = $dados_produtos['preco'];
    $id_categoria_produto = $dados_produtos['id_categoria'];

?>

        <div class="container-fluid" style="height: 400px;">
            <div class="row">
                <div class="col-12">
                    <h1>Detalhes do produto</h1>
                </div>

                <div class="col-12">

                    Nome do Produto: <?php echo $nome_produto; ?><br/><br/>
                    Preco: <?php echo $preco_produto; ?><br/><br/>

                    <a class="btn btn-primary" href="carrinho_compras.php?acao=add&id_produtos=<?php echo $id_produtos; ?>&id_categoria=<?php echo $id_categoria_produto; ?>">Comprar</a>

                </div>

            </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
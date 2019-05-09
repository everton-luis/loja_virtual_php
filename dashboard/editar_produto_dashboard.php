<?php 

    require('pages/header_dashboard.php'); 
    require('/../classes/categorias.class.php');
    require('/../classes/produtos.class.php');

    $categorias = new Categorias();
    $produtos = new Produtos();

    $todas_categorias = $categorias->getCategorias();
    
    $id_produto = 0;
    if($_GET['id']){
        $id_produto = $_GET['id'];
    }

    $dados_produtos = $produtos->getIdProdutos($id_produto);
    $nome_produto = $dados_produtos['nome_produtos'];
    $preco_produto = $dados_produtos['preco'];
    $id_categoria = $dados_produtos['id_categoria'];

    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];

        $produtos->editarProduto($categoria,$nome,$preco,$id_produto);

        header("Location: dashboard.php");

    }
    
    

?>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            Editar Produto
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                            <h1>Editar Produto</h1>
                            
                            <form method="POST">

                                Nome:<br/>
                                <input type="text" name="nome" value="<?php echo $nome_produto; ?>" /><br/>

                                Preco:<br/>
                                <input type="text" name="preco" value="<?php echo $preco_produto; ?>" /><br/>

                                Categoria:<br/>
                                <select name="categoria">
                                    <?php foreach($todas_categorias as $lista_categorias): ?>
                                        <option value="<?php echo $lista_categorias['id']; ?>"
                                        <?php if($lista_categorias['id'] == $id_categoria){
                                            echo 'selected';
                                        } ?>><?php echo $lista_categorias['nome_categorias']; ?>
                                        </option>

                                    <?php endforeach; ?> 
                                </select>
                                <br/><br/>
                                
                                <input type="submit" value="Editar">

                            </form>
                            
                        

                        </div>

                    </div>

                </div>

            </div>


        <script src="bibliotecas/jquery/jquery.min.js"></script>
        <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin.min.js" type="text/javascript"></script>
    </body>

</html>
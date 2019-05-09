<?php 

    require('pages/header_dashboard.php'); 
    require('/../classes/categorias.class.php');
    require('/../classes/produtos.class.php');

    $categorias = new Categorias();
    $produtos = new Produtos();

    $todas_categorias = $categorias->getCategorias();
    
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $id_categorias = $_POST['categorias'];
        $preco = $_POST['preco'];

        $produtos = new Produtos();

        $produtos->inserirProduto($id_categorias,$nome,$preco);

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
                            Inserir produtos
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                            <h1>Inserir Produtos</h1>

                            <form method="POST">

                                Nome:<br/>
                                <input type="text" name="nome"><br/>
                                Preco:<br/>
                                <input type="text" name="preco"><br/>

                                Categoria:<br/>
                                <select name="categorias">
                                    <option>Selecionar</option>
                                    <?php
                                        foreach($todas_categorias as $lista_categorias){
                                            echo '<option value="'.$lista_categorias['id'].'">'.$lista_categorias['nome_categorias'].'</option>';
                                        }
                                    ?>
                                </select>
                                <br/><br/>
                                
                                <input type="submit" value="Cadastrar" />


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
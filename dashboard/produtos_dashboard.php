<?php 

    require('pages/header_dashboard.php');
    require('/../classes/produtos.class.php');
    
    
    
    $funcionarios = new Funcionarios();
    $dados_funcionarios = $funcionarios->getIdFuncionarios($id_funcionarios);
    $permissao_id = $dados_funcionarios['cargo'];
    
    $cargo_funcionario = new Cargo_Funcionarios();
    $cargo_funcionario->setUsuario($permissao_id);

    $produtos = new Produtos();

    $lista_produtos = $produtos->getTodosProdutos();

    

?>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            Produtos
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                    
                            <h1>Produtos</h1>
                            <h4>Lista de produtos</h4>

                            <?php if($cargo_funcionario->temPermissao("ADD")){
                                echo '<a href="inserir_produtos_dashboard.php" class="btn btn-primary">Inserir produtos</a>';
                            }
                            ?>                            
                            
                            <br/><br/>

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Preco</th>
                                        <th>Categoria</th>
                                        <th>Acoes</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php

                                    foreach($lista_produtos as $lista1){
                                        echo '<tr>';    
                                            echo '<td>'.$lista1['nome_produtos'].'</td>';
                                            echo '<td>'.$lista1['preco'].'</td>';
                                            echo '<td>'.$lista1['nome_categorias'].'</td>';
                                            echo '<td>';
                                                    if($cargo_funcionario->temPermissao("EDIT")){
                                                        echo '<a href="editar_produto_dashboard.php?id='.$lista1['id'].'">Editar</a>';
                                                    }
                                                    if($cargo_funcionario->temPermissao("DEL")){
                                                        echo ' - <a href="deletar_produto_dashboard.php?id='.$lista1['id'].'">Deletar</a>';
                                                    }
                                            echo '</td>';
                                                    
                                        echo '</tr>';
                                    }

                                ?>

                                </tbody>


                            </table>


                        </div>

                    </div>

                </div>

            </div>


    <script src="bibliotecas/jquery/jquery.min.js"></script>
	<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="bibliotecas/datatables/jquery.dataTables.js"></script>
	<script src="bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<script src="js/sb-admin.min.js" type="text/javascript"></script>
	<script src="js/sb-admin-datatables.min.js" type="text/javascript"></script>
    </body>

</html>
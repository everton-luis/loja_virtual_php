<?php 

    require('pages/header_dashboard.php'); 
    
    
    $funcionarios = new Funcionarios();
    $lista_funcionarios = $funcionarios->getTodosFuncionarios();
    

?>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            Funcionarios
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                            <h1>Funcionarios</h1>


                            <a href="inserir_funcionarios.php" class="btn btn-primary">Inserir Funcionarios</a>

                            <br/><br/>

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Cargo</th>
                                        <th>Acoes</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        foreach($lista_funcionarios as $lista_funcionarios1){
                                            echo '<tr>';
                                                echo '<td>'.$lista_funcionarios1['id'].'</td>';
                                                echo '<td>'.$lista_funcionarios1['nome'].'</td>';
                                                echo '<td>'.$lista_funcionarios1['nome_cargo'].'</td>';
                                                echo '<td>';
                                                        echo '<a href="editar_funcionarios.php?id='.$lista_funcionarios1['id'].'">Editar</a>';
                                                        echo '<a href="deletar_funcionarios.php?id='.$lista_funcionarios1['id'].'"> - Excluir</a>';
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
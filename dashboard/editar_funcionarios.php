<?php 

    require('pages/header_dashboard.php'); 
    
    $id_funcionario = 0;
    if(isset($_GET['id'])){
        $id_funcionario = $_GET['id'];
    }

    $funcionarios = new Funcionarios();
    $cargo_funcionarios = new Cargo_Funcionarios();

    $dados_funcionarios = $funcionarios->getIdFuncionarios($id_funcionario);
    $nome_funcionario = $dados_funcionarios['nome'];
    $id_cargo_funcionarios = $dados_funcionarios['cargo'];

    $lista_cargo_funcionarios = $cargo_funcionarios->getTodosCargoFuncionarios();

    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $senha = md5($_POST['senha']);
        $cargo = $_POST['cargo'];

        $funcionarios->editarFuncionarios($nome,$senha,$cargo,$id_funcionario);

        header("Location: funcionarios_dashboard.php");

    }
    
    

?>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            Editar Funcionario
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                            <h1>Editar Funcionario</h1>

                            <form method="POST">

                                Nome:<br/>
                                <input type="text" name="nome" value="<?php echo $nome_funcionario; ?>" />
                                <br/>

                                Senha:<br/>
                                <input type="password" name="senha" required="required" /><br/>

                                Categoria:<br/>
                                <select name="cargo">
                                <?php foreach($lista_cargo_funcionarios as $lista_cargo_funcionarios1): ?>
                                    <option value="<?php echo $lista_cargo_funcionarios1['id']; ?>"
                                    <?php 
                                        if($lista_cargo_funcionarios1['id'] == $id_cargo_funcionarios){
                                            echo 'selected';
                                        }
                                    ?>><?php echo $lista_cargo_funcionarios1['nome_cargo']; ?></option>


                                <?php endforeach; ?>

                                </select>

                                <br/><br/>

                                <input type="submit" value="Editar" /> 

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
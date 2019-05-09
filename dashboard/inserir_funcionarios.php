<?php 

    require('pages/header_dashboard.php'); 
    
    $cargo_funcionarios = new Cargo_Funcionarios();
    
    $lista_cargo_funcionarios = $cargo_funcionarios->getTodosCargoFuncionarios();

    
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $senha = md5($_POST['senha']);
        $cargo = $_POST['cargo'];

        $funcionarios = new Funcionarios();
        $funcionarios->inserirFuncionarios($nome,$senha,$cargo);

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
                            Inserir funcionarios
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                            <h1>Inserir Funcionarios</h1>

                            <form method="POST">
                                Nome:<br/>
                                <input type="text" name="nome" />
                                <br/>
                                Senha:<br/>
                                <input type="password" name="senha" />
                                <br/>
                                Cargo:<br/>
                                <select name="cargo">
                                    <option>Selecionar</option>
                                <?php
                                    foreach($lista_cargo_funcionarios as $lista_cargo_funcionarios1){
                                        echo '<option value="'.$lista_cargo_funcionarios1['id'].'">'.$lista_cargo_funcionarios1['nome_cargo'].'</option>';
                                    }

                                ?>

                                </select>
                                <br/><br/>

                                <input type="submit" value="Inserir" />

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
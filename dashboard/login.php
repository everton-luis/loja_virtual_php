<html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">

        <?php

            require('/../config.php');
            require('/../classes/funcionarios.class.php');

            $funcionarios = new Funcionarios();

            if(isset($_POST['nome'])){
                $nome = $_POST['nome'];
                $senha = md5($_POST['senha']);
                
                if($funcionarios->verificarUsuario($nome,$senha)){
                    header("Location: dashboard.php");
                }else{
                    echo 'nome ou senha invalida';
                }


            }

        ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Login</h1>

                    <form method="POST">
                        Nome:<br/>
                        <input type="text" name="nome" /><br/>
                        Senha:<br/>
                        <input type="password" name="senha" /><br/>
                        <input type="submit" value="Enviar" />


                    </form>
                </div>
            </div>
        </div>

        


    <script src="bibliotecas/jquery/jquery.min.js"></script>
    <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
    </body>


</html>
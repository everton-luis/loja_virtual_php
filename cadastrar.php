<?php
    require('pages/header.php');
    

    if(isset($_POST['nome'])){
        $nome_usuarios = $_POST['nome'];
        $email_usuarios = $_POST['email'];
        $cpf_usuarios = $_POST['cpf'];
        $telefone_usuarios = $_POST['telefone'];
        $estado_usuarios = $_POST['estado'];
        $cidade_usuarios = $_POST['cidade'];
        $bairro_usuarios = $_POST['bairro'];
        $rua_usuarios = $_POST['rua'];
        $numero_usuarios = $_POST['numero'];
        $senha_usuarios = md5($_POST['senha']);

        

        $verificarCadastro = $usuarios->verificarUsuario($nome_usuarios,$email_usuarios,$cpf_usuarios);
        
        
        if($verificarCadastro == false){
            $cadastrar_usuarios = $usuarios->cadastrarUsuarios($nome_usuarios,$email_usuarios,$cpf_usuarios,$telefone_usuarios,$estado_usuarios,$cidade_usuarios,$bairro_usuarios,$rua_usuarios,$numero_usuarios,$senha_usuarios);
            header("Location: index.php");
        }else{
            echo 'Usuario ja cadastrado';
        }

        

    }
?>

    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Cadastrar Usuarios</h1>
                </div>

                <br/><br/>
                <div class="col-12">
                    <form method="POST">  
                        Nome:<br/>
                        <input type="text" name="nome" /><br/>
                        Email:<br/>
                        <input type="email" name="email" /><br/>
                        CPF:<br/>
                        <input type="text" name="cpf" /><br/>
                        Telefone:<br/>
                        <input type="text" name="telefone" /><br/>
                        Estado:<br/>
                        <input type="text" name="estado" /><br/>
                        Cidade:<br/>
                        <input type="text" name="cidade" /><br/>
                        Bairro:<br/>
                        <input type="text" name="bairro" /><br/>
                        Rua:<br/>
                        <input type="text" name="rua" /><br/>
                        Numero:<br/>
                        <input type="text" name="numero" /><br/>
                        Senha:<br/>
                        <input type="password" name="senha" /><br/>
                        <br/>

                        <input type="submit" value="Enviar" />



                    </form>

                </div>

            </div>

    </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
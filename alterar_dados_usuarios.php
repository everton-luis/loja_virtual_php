<?php
    require('pages/header.php');

    if(!isset($_SESSION['logado'])){
        header("Location: index.php");
        exit;
    }

    $nome_usuarios = $dados_usuarios['nome_usuarios'];
    $email_usuarios = $dados_usuarios['email_usuarios'];
    $cpf_usuarios = $dados_usuarios['cpf_usuarios'];
    $telefone_usuarios = $dados_usuarios['telefone_usuarios'];
    $estados_usuarios = $dados_usuarios['estado_usuarios'];
    $cidade_usuarios = $dados_usuarios['cidade_usuarios'];
    $bairro_usuarios = $dados_usuarios['bairro_usuarios'];
    $rua_usuarios = $dados_usuarios['rua_usuarios'];
    $numero_endereco_usuarios = $dados_usuarios['numero_endereco_usuarios'];

    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['cidade'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];


        $usuarios->alterarUsuarios($nome,$email,$cpf,$telefone,$estado,$cidade,$bairro,$rua,$numero,$id_usuarios);

        header("Location: conta_usuarios.php");

    }


?>

<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Area do usuario</h2>
                </div>

                <div class="col-12">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dados_usuarios.php">Meus Dados</a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="historico_compras.php">Historico de compras</a>
                        </li>
                        
                    </ul>

                </div>

                <div class="col-12">
                    <h3> Alterar Dados</h3>
                    <form method="POST">

                        Nome: <br/>
                        <input type="text" name="nome" value="<?php echo $nome_usuarios; ?>"> <br/>
                        Email: <br/>
                        <input type="email" name="email" value="<?php echo $email_usuarios; ?>"><br/>
                        Cpf: <br/> 
                        <input type="text" name="cpf" value="<?php echo $cpf_usuarios; ?>"><br/>
                        Telefone: <br/>
                        <input type="text" name="telefone" value="<?php echo $telefone_usuarios; ?>"><br/>
                        Estado: <br/>
                        <input type="text" name="estado" value="<?php echo $estados_usuarios; ?>"><br/>
                        Cidade: <br/>
                        <input type="text" name="cidade" value="<?php echo $cidade_usuarios; ?>"><br/>
                        Bairro: <br/>
                        <input type="text" name="bairro" value="<?php echo $bairro_usuarios; ?>"><br/>
                        Rua: <br/>
                        <input type="text" name="rua" value="<?php echo $rua_usuarios; ?>"><br/>
                        Numero: <br/>
                        <input type="text" name="numero" value="<?php echo $numero_endereco_usuarios; ?>">
                        <br/><br/>

                        <input type="submit" value="Enviar">
                    
                    </form>


                </div>

        </div>

<?php
    require('pages/footer.php');
?>
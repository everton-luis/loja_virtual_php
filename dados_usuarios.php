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
                    <h3>Dados</h3>
                    Nome: <?php echo $nome_usuarios; ?><br/>
                    Email: <?php echo $email_usuarios; ?><br/>
                    Cpf: <?php echo $cpf_usuarios; ?><br/>
                    Telefone: <?php echo $telefone_usuarios; ?><br/>
                    Estado: <?php echo $estados_usuarios; ?><br/>
                    Cidade: <?php echo $cidade_usuarios; ?><br/>
                    Bairro: <?php echo $bairro_usuarios; ?><br/>
                    Rua: <?php echo $rua_usuarios; ?><br/>
                    Numero: <?php echo $numero_endereco_usuarios; ?>
                    <br/><br/>

                    <a href="alterar_dados_usuarios.php" class="btn btn-primary">Alterar Dados</a>


                </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
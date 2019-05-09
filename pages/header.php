<html>

    <head>
        <title>Loja Virtual</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <?php

            require('/../config.php');
            require('/../classes/categorias.class.php');
            require('/../classes/usuarios.class.php');

            $id_usuarios = 0;

            if(isset($_SESSION['logado'])){
                $id_usuarios = $_SESSION['logado'];
            }

            $usuarios = new Usuarios();
            $dados_usuarios = $usuarios->getIdUsuarios($id_usuarios);
            $nome_usuarios = $dados_usuarios['nome_usuarios'];

            $categorias = new Categorias();

            $lista_categorias = $categorias->getCategorias();

            


        ?>

    </head>


    <body>

        <nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark bg-dark" style="height:100 px; line-height: 50px;" >
            <a class="navbar-brand" href="index.php">Loja Virtual</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                            foreach($lista_categorias as $lista_nome_categorias){
                                echo '<a class="dropdown-item" href="produtos.php?&id_categorias='.$lista_nome_categorias['id'].'">'.$lista_nome_categorias['nome_categorias'].'</a>';
                            }
                        ?>
                    
                    </div>
                </li>
                <li class="nav-item" style="margin-left:70px; margin-top: 10px;" >
                    <form class="form-inline my-2 my-lg-0" method="GET" action="pesquisa_produtos.php">
                        <input class="form-control mr-sm-2" name="nome_pesquisa" type="search" placeholder="Pesquisar" aria-label="Pesquisar" size="40" required="required" value="<?php if(isset($_GET['nome_pesquisa'])){
                            echo $_GET['nome_pesquisa'];
                        } ?>">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </li>
                </ul>
                <?php 
                    if(isset($_SESSION['logado'])){
                        echo '<div style="color:white; margin-right: 5px;font-size: 12px;">';
                            echo 'Usuario logado: '.$nome_usuarios;
                        echo '</div>';
                        echo '<a href="conta_usuarios.php" class="btn btn-primary" style="margin-right:5px;">Minha conta</a>';
                        echo '<a href="sair.php" class="btn btn-primary" style="margin-right:5px;">Sair</a>';
                    }else{
                        echo '<a href="login.php" class="btn btn-primary" style="margin-right:5px;">Fazer login</a>';
                        echo '<a href="cadastrar.php" class="btn btn-primary">Cadastrar-se</a>';
                    }
                ?>
                <a href="carrinho_compras.php" class="btn btn-primary" style="margin-left: 5px;">Carrinho compras</a>
                
                
            </div>
        </nav>

        <br/><br/><br/><br/>
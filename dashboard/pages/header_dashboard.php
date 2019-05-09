<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
        <link rel="stylesheet" type="text/css" href="bibliotecas/datatables/dataTables.bootstrap4.css">

        <?php
            require('/../../config.php');
            require('/../../classes/cargo_funcionarios.class.php');
            require('/../../classes/funcionarios.class.php');

            $id_funcionarios = 0;
            if($_SESSION['logado']){
                $id_funcionarios = $_SESSION['logado'];
            }else{
                header("Location: login.php");
                exit;
            }

            $funcionarios = new Funcionarios();
            $dados_funcionarios = $funcionarios->getIdFuncionarios($id_funcionarios);
            $permissao_id = $dados_funcionarios['cargo'];
            
            $cargo_funcionario = new Cargo_Funcionarios();
            $cargo_funcionario->setUsuario($permissao_id);

            
        ?>

    </head>

    <body class="bg-dark fixed-nav sticky-footer" id="page-top" >

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="dashboard.php">Admin do curso</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCurso"
                aria-control="navbarCurso" aria-expanded="false" aria-label="Navegacao toggle">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarCurso" class="collapse navbar-collapse">
                    <ul class="navbar-nav navbar-sidenav" id="linksaccordion">
                        <li class="nav-item" data-toggle="tooltip" data-placement="right">
                            <a class="nav-link" href="dashboard.php">
                                <i class="fa fa-fw fa-dashboard"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item" data-toggle="tooltip" data-placement="right">
                            <a class="nav-link" href="produtos_dashboard.php">
                                <i class=""></i>
                                <span class="nav-link-text">Produtos</span>
                            </a>
                        </li>

                        <?php

                            if($cargo_funcionario->temPermissao("USUARIOS")){
                                echo '
                                    <li class="nav-item" data-toggle="tooltip" data-placement="right">
                                        <a class="nav-link" href="funcionarios_dashboard.php">
                                        <i class=""></i>
                                        <span class="nav-link-text">Funcionarios</span>
                                        </a>
                                    </li>
                                ';
                            }

                            if($cargo_funcionario->temPermissao("GRAFICOS")){
                                echo '
                                    <li class="nav-item" data-toggle="tooltip" data-placement="right">
                                        <a class="nav-link" href="graficos_dashboard.php">
                                        <i class=""></i>
                                        <span class="nav-link-text">Graficos</span>
                                        </a>
                                    </li>
                                ';
                            }


                        ?>


                        <li class="nav-item" data-toggle="tooltip" data-placement="right">
                            <a class="nav-link" href="sair_dashboard.php">
                                <i class=""></i>
                                <span class="nav-link-text">Sair</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </nav>
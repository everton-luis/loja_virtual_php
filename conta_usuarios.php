<?php
    require('pages/header.php');

    if(!isset($_SESSION['logado'])){
        header("Location: index.php");
        exit;
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

                <br/><br/>

                <div class="col-12">

                    

                </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
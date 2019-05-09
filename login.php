<?php
    require('pages/header.php');
    

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        
        
        if($usuarios->fazerLogin($email,$senha) == true){
            header("Location: conta_usuarios.php");
        }else{
            echo 'email ou senha invalida';
        }
        
        

    }

?>

        <div class="container-fluid" style="height: 400px;">
            <div class="row">
                <div class="col-12">
                    <h1>Login</h1>
                </div>

                <br/><br/><br/>
                <div class="col-12">
                    <form method="POST">
                        Email:<br/>
                        <input type="email" name="email" /><br/>
                        Senha:<br/>
                        <input type="password" name="senha" />
                        <br/><br/>
                        <input type="submit" value="Enviar" />

                    </form>
                </div>


            </div>

        </div>


        <br/><br/>

<?php
    require('pages/footer.php');
?>
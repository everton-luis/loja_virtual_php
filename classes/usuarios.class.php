<?php

    class Usuarios {

        public function cadastrarUsuarios($nome,$email,$cpf,$telefone,$estado,$cidade,$bairro,$rua,$numero,$senha){
            global $pdo;

            $sql = "insert into usuarios set nome_usuarios=:nome_usuarios, email_usuarios=:email_usuarios, cpf_usuarios=:cpf_usuarios, telefone_usuarios=:telefone_usuarios, estado_usuarios=:estado_usuarios, cidade_usuarios=:cidade_usuarios, bairro_usuarios=:bairro_usuarios, rua_usuarios=:rua_usuarios, numero_endereco_usuarios=:numero_endereco_usuarios, senha=:senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_usuarios",$nome);
            $sql->bindValue(":email_usuarios",$email);
            $sql->bindValue(":cpf_usuarios",$cpf);
            $sql->bindValue(":telefone_usuarios",$telefone);
            $sql->bindValue(":estado_usuarios",$estado);
            $sql->bindValue(":cidade_usuarios",$cidade);
            $sql->bindValue(":bairro_usuarios",$bairro);
            $sql->bindValue(":rua_usuarios",$rua);
            $sql->bindValue(":numero_endereco_usuarios",$numero);
            $sql->bindValue(":senha",$senha);
            $sql->execute();

        }


        public function verificarUsuario($nome,$email,$cpf){

            global $pdo;

            $sql = "select * from usuarios where nome_usuarios=:nome_usuarios or email_usuarios=:email_usuarios or cpf_usuarios=:cpf_usuarios";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_usuarios",$nome);
            $sql->bindValue(":email_usuarios",$email);
            $sql->bindValue(":cpf_usuarios",$cpf);
            $sql->execute();

            if($sql->rowCount() > 0){
                return true;
            }

            return false;

        }

        public function fazerLogin($email,$senha){

            global $pdo;

            $sql = "select * from usuarios where email_usuarios=:email_usuarios and senha=:senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":email_usuarios",$email);
            $sql->bindValue(":senha",$senha);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql['id'];
                $_SESSION['logado'] = $info;
                return true;
            }

            return false;
        }

        public function getIdUsuarios($id){

            global $pdo;

            $sql = "select * from usuarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }

        public function alterarUsuarios($nome_usuarios,$email_usuarios,$cpf_usuarios,$telefone_usuarios,$estados_usuarios,$cidade_usuarios,$bairro_usuarios,$rua_usuarios,$numero_endereco_usuarios,$id){

            global $pdo;

            $sql = "update usuarios set nome_usuarios=:nome_usuarios, email_usuarios=:email_usuarios, cpf_usuarios=:cpf_usuarios, telefone_usuarios=:telefone_usuarios, estado_usuarios=:estado_usuarios, cidade_usuarios=:cidade_usuarios, bairro_usuarios=:bairro_usuarios, rua_usuarios=:rua_usuarios, numero_endereco_usuarios=:numero_endereco_usuarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome_usuarios",$nome_usuarios);
            $sql->bindValue(":email_usuarios",$email_usuarios);
            $sql->bindValue(":cpf_usuarios",$cpf_usuarios);
            $sql->bindValue(":telefone_usuarios",$telefone_usuarios);
            $sql->bindValue(":estado_usuarios",$estados_usuarios);
            $sql->bindValue(":cidade_usuarios",$cidade_usuarios);
            $sql->bindValue(":bairro_usuarios",$bairro_usuarios);
            $sql->bindValue(":rua_usuarios",$rua_usuarios);
            $sql->bindValue(":numero_endereco_usuarios",$numero_endereco_usuarios);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }



    }

?>
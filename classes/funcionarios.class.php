<?php

    class Funcionarios {

        public function verificarUsuario($nome,$senha){
            
            global $pdo;

            $sql = "select * from funcionarios where nome=:nome and senha=:senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":senha",$senha);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                $_SESSION['logado'] = $info['id'];
                return true;
            }

            return false;
        }

        public function getIdFuncionarios($id){
            global $pdo;

            $sql = "select * from funcionarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }


        }

        public function getTodosFuncionarios(){

            global $pdo;

            $sql = "select funcionarios.id, funcionarios.nome, funcionarios.senha, funcionarios.cargo, cargo_funcionarios.nome_cargo from funcionarios inner join cargo_funcionarios on cargo_funcionarios.id=funcionarios.cargo";
            $sql = $pdo->query($sql);
            
            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            
            return $array;

        }

        public function inserirFuncionarios($nome,$senha,$cargo){

            global $pdo;

            $sql = "insert into funcionarios set nome=:nome, senha=:senha, cargo=:cargo";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":senha",$senha);
            $sql->bindValue(":cargo",$cargo);
            $sql->execute();

        }

        public function editarFuncionarios($nome,$senha,$cargo,$id){

            global $pdo;

            $sql = "update funcionarios set nome=:nome, senha=:senha, cargo=:cargo where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":senha",$senha);
            $sql->bindValue(":cargo",$cargo);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }

        public function deletarFuncionarios($id){

            global $pdo;

            $sql = "delete from funcionarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }


    }


?>
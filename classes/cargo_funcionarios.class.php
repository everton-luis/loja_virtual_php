<?php

    class Cargo_Funcionarios{

        private $permissoes;

        public function getTodosCargoFuncionarios(){
            global $pdo;

            $sql = "select * from cargo_funcionarios";
            $sql = $pdo->query($sql);

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $info = $sql;
                $array = $info;
            }

            return $array;

        }

        public function setUsuario($id){

            global $pdo;

            $sql = "select permissoes from cargo_funcionarios where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $this->permissoes = explode(",",$sql['permissoes']);
            }

        }

        public function getPermissoes(){
            return $this->permissoes;
        }

        public function temPermissao($p){
            if(in_array($p,$this->permissoes)){
                return true;
            }else{
                return false;
            }
        }


    }


?>
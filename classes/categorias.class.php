<?php

    class Categorias{

        public function getCategorias(){
            global $pdo;

            $sql = "select * from categorias";
            $sql = $pdo->query($sql);

            $array = array();
            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            return $array;

        }

        public function getIdCategorias($id){
            global $pdo;

            $sql = "select * from categorias where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }



    }


?>
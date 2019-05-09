<?php

    class Vendas {


        public function getIdVendas($id){

            global $pdo;

            $sql = "select * from vendas where id_usuarios=:id_usuarios";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_usuarios",$id);
            $sql->execute();

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;

        }







    }


?>
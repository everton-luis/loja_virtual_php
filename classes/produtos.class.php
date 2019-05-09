<?php

    class Produtos {


        public function getTodosProdutos(){
            global $pdo;

            $sql = "select produtos.id, produtos.id_categoria, produtos.nome_produtos, produtos.preco, produtos.imagem_produtos , categorias.nome_categorias from produtos inner join categorias on categorias.id=produtos.id_categoria";
            $sql = $pdo->query($sql);

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            
            return $array;
            
        }

        public function getIdProdutos($id){

            global $pdo;

            $sql = "select * from produtos where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }


        public function getIdCategoria($id){
            global $pdo;

            $sql = "select * from produtos where id_categoria=:id_categoria";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_categoria",$id);
            $sql->execute();

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }
            
            return $array;

        }


        public function inserirProduto($id_categoria,$nome_produtos,$preco){

            global $pdo;

            $sql = "insert into produtos set id_categoria=:id_categoria, nome_produtos=:nome_produtos, preco=:preco";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_categoria",$id_categoria);
            $sql->bindValue(":nome_produtos",$nome_produtos);
            $sql->bindValue(":preco",$preco);
            $sql->execute();


        }

        public function editarProduto($id_categoria,$nome_produtos,$preco,$id){

            global $pdo;

            $sql = "update produtos set id_categoria=:id_categoria, nome_produtos=:nome_produtos, preco=:preco where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_categoria",$id_categoria);
            $sql->bindValue(":nome_produtos",$nome_produtos);
            $sql->bindValue(":preco",$preco);
            $sql->bindValue(":id",$id);
            $sql->execute();


        }

        public function deletarProduto($id){

            global $pdo;

            $sql = "delete from produtos where id=:id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute();

        }

        public function pesquisarProdutos($nome_pesquisa){

            global $pdo;

            $sql = "select * from produtos where nome_produtos like '%$nome_pesquisa%'";
            $sql = $pdo->query($sql);
            
        
            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;

        }



    }


?>
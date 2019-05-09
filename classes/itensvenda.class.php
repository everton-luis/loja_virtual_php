<?php

    class ItensVenda {

        public function getItensVendaIdVendas($id){

            global $pdo;

            $sql = "select itensvenda.id,itensvenda.id_vendas,itensvenda.id_produto,itensvenda.quantidade,itensvenda.data_compra,itensvenda.id_usuarios, produtos.nome_produtos, produtos.preco from itensvenda inner join produtos on produtos.id=itensvenda.id_produto where itensvenda.id_vendas=:id_vendas";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_vendas",$id);
            $sql->execute();

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;

        }

        public function getDadosGraficosVendasPorCategoria(){

            global $pdo;

            $sql = "select itensvenda.id, itensvenda.id_produto, itensvenda.quantidade, itensvenda.id_usuarios, produtos.nome_produtos, produtos.id_categoria, sum(quantidade) as total_quantidade_por_categoria, categorias.nome_categorias from itensvenda inner join produtos on produtos.id=itensvenda.id_produto inner join categorias on categorias.id=produtos.id_categoria group by produtos.id_categoria";
            $sql = $pdo->query($sql);

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;

        }

        public function getDadosGraficosProdutosMaisVendidos(){

            global $pdo;

            $sql = "select itensvenda.id_produto, sum(quantidade) as quantidade, produtos.nome_produtos from itensvenda inner join produtos on produtos.id=itensvenda.id_produto GROUP BY itensvenda.id_produto";
            $sql = $pdo->query($sql);

            $array = array();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                $array = $sql;
            }

            return $array;

        }

        public function getDadosGraficosQuantidadeTotalVendas(){

            global $pdo;

            $sql = "select sum(quantidade) as quantidade_total from itensvenda";
            $sql = $pdo->query($sql);

            

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }

        public function getDadosGraficoMediaQuantidadeCompras(){

            global $pdo;
            
            $sql = "SELECT AVG(quantidade) as media FROM itensvenda";
            $sql = $pdo->query($sql);

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $info = $sql;
                return $info;
            }

        }


    }


?>
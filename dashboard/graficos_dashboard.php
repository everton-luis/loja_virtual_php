<?php 

    require('pages/header_dashboard.php'); 
    require('/../classes/itensvenda.class.php');

    $itensvenda = new ItensVenda();

    $lista_dados_grafico_vendas_categorias = $itensvenda->getDadosGraficosVendasPorCategoria();
    $lista_dados_grafico_produtos_mais_vendidos = $itensvenda->getDadosGraficosProdutosMaisVendidos();
    $dados_grafico_quantidade_total_vendas = $itensvenda->getDadosGraficosQuantidadeTotalVendas();

    $quantidade_total_vendas = $dados_grafico_quantidade_total_vendas['quantidade_total'];

    $dados_grafico_media_compras = $itensvenda->getDadosGraficoMediaQuantidadeCompras();

    $media_quantidade_compras = $dados_grafico_media_compras['media'];


?>
    
    <script type="text/javascript" src="google_charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Categoria', 'Quantidade de vendas'],
          <?php
            foreach($lista_dados_grafico_vendas_categorias as $lista_dados_grafico_vendas_categorias1){
              echo '["'.$lista_dados_grafico_vendas_categorias1['nome_categorias'].'", '.$lista_dados_grafico_vendas_categorias1['total_quantidade_por_categoria'].'],';
            }

          ?>
          //['Categoria 1 - Tecnologia',     25],
          //['Categoria 2 - Eletrodomesticos',  11],
          //['Categoria 3 - Esporte',  0],
          //['Categoria 4 - Relogios', 0],
          //['Categoria 5 - Ferramentas',    0]
        ]);

        var options = {
          title: 'Vendas por categorias'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="google_charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Nome Produto', 'Quantidade'],
          
          <?php

            foreach($lista_dados_grafico_produtos_mais_vendidos as $lista_dados_grafico_produtos_mais_vendidos1){
              echo '["'.$lista_dados_grafico_produtos_mais_vendidos1['nome_produtos'].'", '.$lista_dados_grafico_produtos_mais_vendidos1['quantidade'].'],';
            }

          ?>
          
          //['Celular LG',     60],
          //['Smartphone SAMSUNG', 1],
          //['Impressora HP',  3],
          //['Notbook DELL', 7],
          //['Bola Futsal',    51]
        ]);

        var options = {
          title: 'Produtos mais vendidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>


<script type="text/javascript" src="google_charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Vendas", "Quantidade de vendas", { role: "style" } ],
        ["vendas", <?php echo $quantidade_total_vendas; ?>, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Quantidade total de vendas",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

<script type="text/javascript" src="google_charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Vendas", "Media Quantidade de compras", { role: "style" } ],
        ["Media", <?php echo $media_quantidade_compras; ?>, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Media Quantidade total de compras",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      chart.draw(view, options);
  }
  </script>
  

            <div class="content-wrapper">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            Graficos
                        </li>

                    </ol>

                    <div class="row">
                        <div class="col-12">
                            <h1>Graficos</h1>

                            <div id="piechart1" style="width: 900px; height: 500px;"></div>

                            <div id="piechart2" style="width: 900px; height: 500px;"></div>

                            <div id="columnchart_values" style="width: 900px; height: 300px;"></div>

                            <div id="columnchart_values1" style="width: 900px; height: 300px;"></div>


                        </div>

                    </div>

                </div>

            </div>


        <script src="bibliotecas/jquery/jquery.min.js"></script>
        <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin.min.js" type="text/javascript"></script>
    </body>

</html>
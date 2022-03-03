<?php
	include_once('conexao.php');
  $sqlBusca = "SELECT id,data,round(AVG(valorSensor),1) as valorSensor
				FROM vansa631_aquario.tbSensores 
				where sensor='LDR' AND data >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
				group by sensor,DATE_FORMAT(data, '%H') order by id ";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartLDR24h);


      function drawChartLDR24h() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Hora',  'Temp LDR'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".date('H', strtotime($dados['data']))."',  ".$dados['valorSensor']."],";
            }
          ?>
        ]);

        var optionsLDR24h = {
          title: 'Luminosidade Média nas últimas 24h',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Luminosidade' , 
				format: 'decimal',
				//ticks: [20,25,27,28,30,35],
		},				
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartLDR24h = new google.visualization.ComboChart(document.getElementById('drawChartLDR24h'));

        chartLDR24h.draw(data, optionsLDR24h);
      }
 
      </script>



<?php
	include_once('conexao.php');
  $sqlBusca = "SELECT id,data,round(AVG(valorSensor),1) as valorSensor
				FROM vansa631_aquario.tbSensores 
				where sensor='umidade' AND data >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
				group by sensor,DATE_FORMAT(data, '%H') order by id ";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartumidade24h);


      function drawChartumidade24h() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Hora',  'Temp umidade'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".date('H', strtotime($dados['data']))."',  ".$dados['valorSensor']."],";
            }
          ?>
        ]);

        var optionsumidade24h = {
          title: 'Umidade relativa do Ar médio nas últimas 24h',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Temperatura' , 
				format: 'decimal',
				//ticks: [20,25,27,28,30,35]
				},		  
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartumidade24h = new google.visualization.ComboChart(document.getElementById('drawChartumidade24h'));

        chartumidade24h.draw(data, optionsumidade24h);
      }
 
      </script>



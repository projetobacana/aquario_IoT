<?php
	include('conexao.php');
  $sqlBusca = "SELECT DATE_FORMAT(data, '%d/%m') data, round(MIN(valorSensor),1) as valorSensorMIN, round(MAX(valorSensor),1) as valorSensorMAX
				FROM vansa631_aquario.tbSensores 
				where sensor='umidade' AND data >= subdate(curdate(),30) 
				group by DATE_FORMAT(data, '%d/%m/%Y') order by DATE_FORMAT(data, '%Y/%m/%d');";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartumidade30dMM);


      function drawChartumidade30dMM() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia',  'Mínima' ,'Máxima'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".$dados['data']."',  ".$dados['valorSensorMIN']. ", ".$dados['valorSensorMAX']."],";
            }
          ?>
        ]);

        var optionsumidade30dMM = {
          title: 'Umidade relativa do Ar máxima e mínima nos últimos 30 dias',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Temperatura' , 
				format: 'decimal',
				//ticks: [20,25,27,28,30,35]
				},
		seriesType: 'bars',				
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartumidade30dMM = new google.visualization.ComboChart(document.getElementById('drawChartumidade30dMM'));

        chartumidade30dMM.draw(data, optionsumidade30dMM);
      }
 
      </script>

          

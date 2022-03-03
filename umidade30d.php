<?php
	include('conexao.php');
  $sqlBusca = "SELECT DATE_FORMAT(data, '%d/%m') data,round(AVG(valorSensor),1) as valorSensor
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
      google.charts.setOnLoadCallback(drawChartumidade30d);


      function drawChartumidade30d() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia',  'Temp umidade'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".$dados['data']."',  ".$dados['valorSensor']."],";
            }
          ?>
        ]);

        var optionsumidade30d = {
          title: 'Umidade relativa do Ar média nos últimos 30 dias',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Temperatura' , 
				format: 'decimal',
			//	ticks: [20,25,27,28,30,35]
				},		  
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartumidade30d = new google.visualization.ComboChart(document.getElementById('drawChartumidade30d'));

        chartumidade30d.draw(data, optionsumidade30d);
      }
 
      </script>

          

<?php
	include('conexao.php');
  $sqlBusca = "SELECT DATE_FORMAT(data, '%d/%m') data,round(AVG(valorSensor),1) as valorSensor
				FROM vansa631_aquario.tbSensores 
				where sensor='ldr' AND data >= subdate(curdate(),30) 
				group by DATE_FORMAT(data, '%d/%m/%Y') order by DATE_FORMAT(data, '%Y/%m/%d');";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartLDR30d);


      function drawChartLDR30d() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia',  'Luminosidade'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".$dados['data']."',  ".$dados['valorSensor']."],";
            }
          ?>
        ]);

        var optionsLDR30d = {
          title: 'Luminosidade Média nos últimos 30 dias',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Luminosidade' , 
				format: 'decimal',
				//ticks: [20,25,27,28,30,35],	
		},
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartLDR30d = new google.visualization.ComboChart(document.getElementById('drawChartLDR30d'));

        chartLDR30d.draw(data, optionsLDR30d);
      }
 
      </script>

          

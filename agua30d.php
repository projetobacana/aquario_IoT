<?php
	include('conexao.php');
  $sqlBusca = "SELECT DATE_FORMAT(data, '%d/%m') data,round(AVG(valorSensor),1) as valorSensor
				FROM vansa631_aquario.tbSensores 
				where sensor='agua' AND data >= subdate(curdate(),30) 
				group by DATE_FORMAT(data, '%d/%m/%Y') order by DATE_FORMAT(data, '%Y/%m/%d');";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartAgua30d);


      function drawChartAgua30d() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia',  'Temp Agua'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".$dados['data']."',  ".$dados['valorSensor']."],";
				//echo "['".date('d/m', strtotime($dados['data']))."',  ".$dados['valorSensor']."],";
            }
          ?>
        ]);

        var optionsAgua30d = {
          title: 'Temperatura Média do aquário nos últimos 30 dias',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Temperatura' , 
				format: 'decimal',
				ticks: [20,25,27,28,30,35]},		  
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartAgua30d = new google.visualization.ComboChart(document.getElementById('drawChartAgua30d'));

        chartAgua30d.draw(data, optionsAgua30d);
      }
 
      </script>

          

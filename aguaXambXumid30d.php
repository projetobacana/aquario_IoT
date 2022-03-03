<?php
	include('conexao.php');
  $sqlBusca = "select MIN(id) as id, data, 
			round(AVG(if(sensor='agua', valorSensor,NULL)),1) as agua, 
			round(AVG(if(sensor='ambiente', valorSensor,NULL)),1) as ambiente ,
            round(AVG(if(sensor='umidade', valorSensor,NULL)),1) as umidade
from(SELECT id, date_format(data,'%d/%m/%Y') as data, sensor,valorSensor FROM vansa631_aquario.tbSensores 
where data >= subdate(curdate(),30) ) x 
group by data order by id;";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartaguaXambXumid30d);


      function drawChartaguaXambXumid30d() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia',  'Temp Agua', 'Temp Ambiente', 'Umidade'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".$dados['data']."', ".$dados['agua']. ", ".$dados['ambiente']. ", ".$dados['umidade']."],";
            }
			//.date('d/m', strtotime($dados['data'])).
          ?>
        ]);

        var optionsaguaXambXumid30d = {
          title: 'Média nos últimos 30 dias',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Valor' , 
				format: 'decimal',
				//ticks: [20,25,27,28,30,35,50,75]
				},		  
		  hAxis: {side: 'top'},	
        seriesType: 'bars', 
        series: {2: {type: 'line'}}   
        };

        var chartaguaXambXumid30d = new google.visualization.ComboChart(document.getElementById('drawChartaguaXambXumid30d'));

        chartaguaXambXumid30d.draw(data, optionsaguaXambXumid30d);
      }
 
      </script>

          

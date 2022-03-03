<?php
	include('conexao.php');
	/*
  $sqlBusca = "select MIN(id) as id, data, 
			round(AVG(if(sensor='agua', valorSensor,NULL)),1) as agua, 
			round(AVG(if(sensor='ambiente', valorSensor,NULL)),1) as ambiente ,
            round(AVG(if(sensor='umidade', valorSensor,NULL)),1) as umidade
from(SELECT id, date_format(data,'%d/%m/%Y') as data, sensor,valorSensor FROM vansa631_aquario.tbSensores 
where data >= subdate(curdate(),60) ) x 
group by data order by id;";
*/

$sqlBusca = "select MIN(id) as id, data, 
			round(AVG(if(sensor='agua', valorSensor,NULL)),1) as agua, 
			round(AVG(if(sensor='ambiente', valorSensor,NULL)),1) as ambiente ,
            round(AVG(if(sensor='umidade', valorSensor,NULL)),1) as umidade
from(SELECT id, date_format(data,'%d/%m/%Y') as data, sensor,valorSensor FROM vansa631_aquario.tbSensores 
where data >= subdate(curdate(),90) ) x 
group by data order by id;";
  
  
  
  
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartaguaXamb30d);


      function drawChartaguaXamb30d() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia',  'Temp Agua', 'Ambiente'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".$dados['data']."', ".$dados['agua']. ", ".$dados['ambiente']."],";
            }
			//.date('d/m', strtotime($dados['data'])).
          ?>
        ]);

        var optionsaguaXamb30d = {
          title: 'Média nos últimos 90 dias - Temp da água x Temp Ambiente',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Temperatura' , 
				format: 'decimal',
				ticks: [20,21,23,25,27,28,30,35]
				},		  
		  hAxis: {side: 'top'},	
        //seriesType: 'bars', 
        series: {2: {type: 'line'}}   
        };

        var chartaguaXamb30d = new google.visualization.ComboChart(document.getElementById('drawChartaguaXamb30d'));

        chartaguaXamb30d.draw(data, optionsaguaXamb30d);
      }
 
      </script>

          

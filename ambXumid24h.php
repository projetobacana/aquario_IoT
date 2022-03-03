<?php
	include('conexao.php');
  $sqlBusca = "select MIN(id) as id, data, 
			round(AVG(if(sensor='agua', valorSensor,NULL)),1) as agua, 
			round(AVG(if(sensor='ambiente', valorSensor,NULL)),1) as ambiente ,
            round(AVG(if(sensor='umidade', valorSensor,NULL)),1) as umidade
from(SELECT id, date_format(data,'%d/%m/%Y %H') as data, sensor,valorSensor FROM vansa631_aquario.tbsensores 
where data >= DATE_SUB(NOW(), INTERVAL 24 HOUR)) x 
group by data order by id;";
  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartambXumid24h);


      function drawChartambXumid24h() {
		var data = new google.visualization.DataTable();
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Temp Ambiente', 'Umidade'],
          <?php
            while($dados=mysqli_fetch_array($query)){
                echo "['".date('H', strtotime($dados['data']))."', ".$dados['ambiente']. ", ".$dados['umidade']."],";
            }
			//.date('d/m', strtotime($dados['data'])).
          ?>
        ]);

        var optionsambXumid24h = {
          title: 'Média nos últimos 30 dias',
          curveType: 'function',
          legend: { position: 'bottom' },
		vAxis: {title: 'Temp x Umidade' , 
				format: 'decimal',
			//	ticks: [20,25,30,40,50,60,70,80]
				},		  
		  hAxis: {side: 'top'}	
          
        
		   
        };

        var chartambXumid24h = new google.visualization.ComboChart(document.getElementById('drawChartambXumid24h'));

        chartambXumid24h.draw(data, optionsambXumid24h);
      }
 
      </script>

          

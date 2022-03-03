<?php
	include('conexao.php');
	
	/*
	$sqlBusca = "select MIN(id) as id, data, 
			round(AVG(if(sensor='agua', valorSensor,NULL)),1) as agua, 
			round(AVG(if(sensor='ambiente', valorSensor,NULL)),1) as ambiente ,
            round(AVG(if(sensor='umidade', valorSensor,NULL)),1) as umidade
			from(SELECT id, date_format(data,'%d/%m/%Y - %H:00') as data, sensor,valorSensor FROM vansa631_aquario.tbSensores 
			where data BETWEEN CURRENT_DATE()-1 AND CURRENT_DATE()+1 ) x 
			group by data order by id;";
	*/
	
  $sqlBusca = "select MIN(id) as id, data, 
			round(AVG(if(sensor='agua', valorSensor,NULL)),1) as agua, 
			round(AVG(if(sensor='ambiente', valorSensor,NULL)),1) as ambiente ,
            round(AVG(if(sensor='umidade', valorSensor,NULL)),1) as umidade
			from(SELECT id, date_format(data,'%d/%m/%Y - %H:00') as data, sensor,valorSensor FROM vansa631_aquario.tbSensores 
			where data >= subdate(curdate(),3) ) x 
			group by data order by id;";

  $query = mysqli_query($conexao,$sqlBusca);

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
  }     
?>
   
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartaguaXamb24h);


      function drawChartaguaXamb24h() {
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

        var optionsaguaXamb24h = {
          title: 'Agua x Ambiente nos últimos 3 dias',
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

        var chartaguaXamb24h = new google.visualization.ComboChart(document.getElementById('drawChartaguaXamb24h'));

        chartaguaXamb24h.draw(data, optionsaguaXamb24h);
      }
 
      </script>

          

<?php
	include_once('conexao.php');

	$conAgua = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT round(valorSensor,1) as valorSensor FROM vansa631_aquario.tbSensores where sensor='agua' order by id desc limit 1";
	$r = $conAgua->query($sqlBusca) or die($con->error);
	$agua = $r->fetch_object()->valorSensor; 
	
	?>
	
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChartAgua);
	 
      function drawChartAgua() {

        var dataAgua = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Água', <?php echo $agua ?>],
        ]);

        var optionsAgua = {
          width: 400, height: 120,
          redFrom: 29, redTo: 40,
          yellowFrom:15, yellowTo: 26,
          greenFrom:26, greenTo:29,
          max:40,
          min:10,
          minorTicks: 10,
		  yellowColor:'#0099ff'
		  
        };

        var chartAgua = new google.visualization.Gauge(document.getElementById('chart_divAgua'));

        chartAgua.draw(dataAgua, optionsAgua);
      }

        
    </script>




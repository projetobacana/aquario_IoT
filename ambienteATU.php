<?php
	include_once('conexao.php');

	$conAmbiente = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT valorSensor FROM vansa631_aquario.tbSensores where sensor='ambiente' order by id desc limit 1;";
	$r = $conAmbiente->query($sqlBusca) or die($con->error);
	$ambiente = $r->fetch_object()->valorSensor;
	
	?>
	
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChartAmbiente);
	 
     function drawChartAmbiente() {

        var dataAmbiente = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Ambiente', <?php echo $ambiente ?>],
        ]);

        var optionsAmbiente = {
          width: 400, height: 120,
          redFrom: 30, redTo: 40,
          yellowFrom:0, yellowTo: 18,
          greenFrom:18, greenTo:30,
          max:40,
          min:0,
          minorTicks: 10
        };

        var chartAmbiente = new google.visualization.Gauge(document.getElementById('chart_divAmbiente'));

        chartAmbiente.draw(dataAmbiente, optionsAmbiente);
      }

        
    </script>



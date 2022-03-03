<?php
	include_once('conexao.php');

	$conUmidade = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT valorSensor FROM vansa631_aquario.tbSensores where sensor='umidade' order by id desc limit 1;";
	$r = $conUmidade->query($sqlBusca) or die($con->error);
	$umidade = $r->fetch_object()->valorSensor;

	
	?>
	
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChartUmidade);
	 
      function drawChartUmidade() {

        var dataUmidade = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Umidade', <?php echo $umidade ?>],
        ]);

        var optionsUmidade = {
          width: 400, height: 120,
          redFrom: 0, redTo: 30,
          yellowFrom:30, yellowTo: 40,
          greenFrom:40, greenTo:100,
          max:100,
          min:0,
          minorTicks: 10
        };

        var chartUmidade = new google.visualization.Gauge(document.getElementById('chart_divUmidade'));

        chartUmidade.draw(dataUmidade, optionsUmidade);
      }

        
    </script>



<?php
	include_once('conexao.php');
	$conLDR = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT valorSensor FROM vansa631_aquario.tbSensores where sensor='LDR' order by id desc limit 1;";
	$r = $conLDR->query($sqlBusca) or die($con->error);
	$LDR = $r->fetch_object()->valorSensor; 
	
	?>
	
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChartLDR);
	 
    function drawChartLDR() {

        var dataLDR = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['LDR', <?php echo $LDR ?>],
        ]);

        var optionsLDR = {
          width: 400, height: 120,
          redFrom: 0, redTo: 200,
          yellowFrom:200, yellowTo: 400,
          greenFrom:400, greenTo:600,
          max:1024,
          min:0,
          minorTicks: 10,
		  redColor:'#000000',
		  yellowColor:'#B18904',
		  greenColor:'#F7FE2E'
        };

        var chartLDR = new google.visualization.Gauge(document.getElementById('chart_divLDR'));

        chartLDR.draw(dataLDR, optionsLDR);
      }
	  

        
    </script>



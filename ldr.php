<!DOCTYPE html>
<html>
  <head>
  <meta charset=utf-8">
	<title> Aquário IoT - Vansan </title>
	<meta http-equiv="refresh" content=300>
   
  </head>
  <body>
 
<?php include_once('completoMenuSup.php');	?>
  
  <?php include_once('ldr24h.php'); ?>
  <div id="drawChartLDR24h" style="width: 900px; height: 500px;"></div>
	
	<br>
  <?php include_once('ldr30d.php'); ?>
  <div id="drawChartLDR30d" style="width: 900px; height: 500px;"></div>
 
 <br>
  <?php include_once('ldr30dMM.php'); ?>
  <div id="drawChartLDR30dMM" style="width: 900px; height: 500px;"></div>
  
  <br>
<br>
<a href="index.php"><button style=\"width:200;height:100px\"><b>Início</b></button></a>
	<br><br>
	<?php include_once('ip.php');
		$ip =get_client_ip(); 
		echo "<small> Você está acessando pelo IP: " . $ip ."</small><br>"; ?>      

	<?php include_once('alteracaoDT.php'); ?>
  

  
  
    <?php
mysqli_close($conexao);
?>
  </body>
</html>



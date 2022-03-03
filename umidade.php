<!DOCTYPE html>
<html>
  <head>
  <meta charset=utf-8">
	<title> Aquário IoT - Vansan </title>
	<meta http-equiv="refresh" content=300>
   
  </head>
  <body>
 <?php include_once('completoMenuSup.php');	?>
  
  <?php include_once('umidade24h.php'); ?>
  <div id="drawChartumidade24h" style="width: 900px; height: 500px;"></div>
<br>
  <?php include_once('umidade30d.php'); ?>
  <div id="drawChartumidade30d" style="width: 900px; height: 500px;"></div>
  <br>
  <?php include_once('umidade30dMM.php'); ?>
  <div id="drawChartumidade30dMM" style="width: 900px; height: 500px;"></div>
  
  <br>
<br>
<a href="ambXumid.php"><button style=\"width:200;height:100px\"><b>Ambiente x Umidade</b></button></a> 
	<br><br>
<a href="index.php"><button style=\"width:200;height:100px\"><b>Início</b></button></a> 
	<br><br>
	
	<?php include_once('btAtualiza.php'); ?>

	<a href=http://<?php if($ip==$ipIoT) echo "192.168.0.6"; else echo $ipIoT.":5286" ?>><button style=\"width:200;height:100px\"><b>Acessar ESPDuino</b></button></a>  
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



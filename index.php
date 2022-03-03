<!DOCTYPE html>
<html>
  <head>
  <meta charset=utf-8">
	<title> Aquário IoT - Vansan </title>
	<meta http-equiv="refresh" content=300>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  </head>
  <body>
<?php include_once('completoMenuSup.php');	?>

<br>


<br><br>
	<?php include_once('ip.php');
		$ip =get_client_ip(); 
		echo "<small> Você está acessando pelo IP: " . $ip ."</small><br>"; ?>      
  <?php include_once('alteracaoDT.php'); ?>

  </body>
</html>



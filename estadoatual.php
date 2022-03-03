<?php	
		include_once('conexao.php');

	
  
	
	
	
	
	
	
	$conIP = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT ip FROM vansa631_aquario.ip where idip='1'";
	$r = $conIP->query($sqlBusca) or die($con->error);
	$ip = $r->fetch_object()->ip; 

	$conDataIP = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT data FROM vansa631_aquario.ip where idip='1'";
	$r = $conDataIP->query($sqlBusca) or die($con->error);
	$dataIP = $r->fetch_object()->data; 

	
	
	
	
	
	
	
	?>

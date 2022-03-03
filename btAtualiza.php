
	<?php 
		include_once('conexao.php');
		
		$conIP = new mysqli($host, $user, $pass, $banco);
		$sqlBusca = "SELECT ip FROM vansa631_aquario.ip where idip='1'";
		$r = $conIP->query($sqlBusca) or die($con->error);
		$ipIoT = $r->fetch_object()->ip; 		
		
		include_once('ip.php');
		$ip =get_client_ip();
		
		?>
		
				
  
  
 
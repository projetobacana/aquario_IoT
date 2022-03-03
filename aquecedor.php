<?php
	include_once('conexao.php');
	$conAquecedor = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT aquecedor FROM vansa631_aquario.tbSensores where sensor='agua' order by id desc limit 1;";
	$r = $conAquecedor->query($sqlBusca) or die($con->error);
	$aquecedor = $r->fetch_object()->aquecedor; 
	
	include_once('btAtualiza.php');
	
	?>
	
	<a href=http://<?php if($ip==$ipIoT) echo "192.168.0.6/atualiza"; 
							else 
								echo $ipIoT.":5286/atualiza" ?>><?php
	if ($aquecedor ==1) 
            echo "<img src=\"img/on.jpg\" alt=\"On\" height=100 width=100>";
    if ($aquecedor ==0)  
            echo "<img src=\"img/off.jpg\" alt=\"Off\" height=100 width=100>";
	?>
	</a> 
	
	

	
   
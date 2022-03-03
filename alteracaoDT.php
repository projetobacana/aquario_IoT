  <?php
  	include_once('conexao.php');
	$conData = new mysqli($host, $user, $pass, $banco);
	$sqlBusca = "SELECT data FROM vansa631_aquario.tbSensores where sensor='agua' order by id desc limit 1;";
	$r = $conData->query($sqlBusca) or die($con->error);
	$data = $r->fetch_object()->data;   
    
	echo "<small>Última atualização no Banco de Dados:  " . date('d/m/Y - H:i', strtotime($data)) . " </small><br>";
    ?>


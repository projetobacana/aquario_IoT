<!DOCTYPE html>
<html>
<meta charset=utf-8">
<body>

<?php

	$host = "localhost"; 	
	$user = "root"; 
	$pass = "usbw"; 
	$banco = "vansa631_aquario";	
	
	

	$conexao = @mysqli_connect($host, $user, $pass, $banco ) 
	or die ("Problemas com a conexao do Banco de Dados");	
	mysqli_query($conexao, "SET NAMES 'utf8'");
?>
</body>
</html>
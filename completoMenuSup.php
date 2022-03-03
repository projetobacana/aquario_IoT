<!DOCTYPE html>
<html>
  <head>
  <meta charset=utf-8">
   
  </head>
  <body>
	 <table class="columns">
      <tr>
        <td>
 <?php include_once('aquecedor.php'); ?>

 <br>
	<?php include_once('aguaATU.php'); ?>		
    <td><a href="agua.php"><div id="chart_divAgua" style="width: 120px; height: 120px;"></div></a> </td>

	<?php include_once('ambienteATU.php'); ?>
	<td><a href="ambiente.php"><div id="chart_divAmbiente" style="width: 120px; height: 120px;"></div></a> </td>

	<?php include_once('umidadeATU.php'); ?>
	<td><a href="umidade.php"><div id="chart_divUmidade" style="width: 120px; height: 120px;"></div></a> </td>
	
	<?php include_once('ldrATU.php'); ?>
	<td><a href="ldr.php"><div id="chart_divLDR" style="width: 120px; height: 120px;"></div></a></td>
		
		</tr>
    </table>
  
  </body>
</html>



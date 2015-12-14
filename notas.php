<?php 
	echo"<div style='position:fixed; opacity:0;'>";
	if(!isset ($_SESSION['code_prova']))
	{
		session_start();
	}
	include('conect.php');
	$qtd_questoes =  $_SESSION['qtd_questoes'];
	$hora_fim=$_SESSION['hora_fim'];
	$code_prova = $_SESSION['code_prova'];
	$code_usuario = $_SESSION['code_usuario'];
	echo'</div>';
	echo"<div id='notas'>
		<strong ><p align='left'>Notas:</p></strong>";
	for($i=1;$i<=$qtd_questoes;$i++)
	{
	$select=("SELECT * FROM envios WHERE chave_usuario = $code_usuario and chave_prova = $code_prova and posicao = $i ORDER BY code DESC LIMIT 1");
		$sql=mysqli_query($conexao,$select);
		$row= mysqli_num_rows($sql);
		$notas = $sql->fetch_object();
		if($row != 0)
		{
			if($notas->nota != -1)
			{
				echo"<p align='left'>Questão$i: $notas->nota </p>";	
			}else
			{
				echo"<p align='left'>Questão$i: Aguardando avaliação</p>";
			}
		}else{
			echo"<p align='left'>Questão$i: ???</p>";
		}
	}
	echo"</div>"
?>
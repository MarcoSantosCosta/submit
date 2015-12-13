<?php 
	session_start();
	include('conect.php');
	$qtd_questoes =  $_SESSION['qtd_questoes'];
	$hora_fim=$_SESSION['hora_fim'];
	$code_prova = $_SESSION['code_prova'];
	$code_usuario = $_SESSION['code_usuario'];
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
				echo"Questão$i: $notas->nota <br>";	
			}else
			{
				echo"Questão$i: Aguardando avaliação<br>";
			}
		}else{
			echo"Questão$i: ???<br>";
		}
	}
?>
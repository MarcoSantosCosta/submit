<?php 
	//session_start();
	$qtd_questoes =  $_SESSION['qtd_questoes'];
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
				echo"Questão$i: Aguardadno avaliação<br>";
			}
		}else{
			echo"Questão$i: ???<br>";
		}
	}
?>